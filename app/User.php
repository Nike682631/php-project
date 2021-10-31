<?php

namespace App;

use Illuminate\Database\Query\Builder;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Nahid\Talk\Facades\Talk;
use Spatie\Permission\Traits\HasRoles;
use Spark\Billable;
use Illuminate\Support\Facades\Log;

class User extends Authenticatable {
	use Notifiable;
	use Billable;
	use HasRoles;

//	use SoftDeletes;


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'email',
		'password',
		'user_info_id',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public static $types = [ 'logistics', 'legal', 'financing', 'sellers-buyers', 'equipment', 'furniture-materials' ];

	public static function activeCompaniesCount() {

		$count = User::count();
		if($count < 500) {
			$count = false;
		}

		return $count;
	}

	public static function getCompaniesByCategory($categoryID, $type = 'all') {


		if($type === 'all') {
			$companies = User::whereHas('sells', function($q)  use($categoryID)  {

				$q->where('category_id', '=', $categoryID);

				User::whereHas('buys', function($q)  use($categoryID)  {
					$q->where('category_id', '=', $categoryID);
				});
			});
		} else if($type === 'sell') {
			$companies = User::whereHas('sells', function($q)  use($categoryID)  {

				$q->where('category_id', '=', $categoryID);
			});
		} else if($type === 'buy') {
			$companies = User::whereHas('buys', function($q)  use($categoryID)  {
				$q->where('category_id', '=', $categoryID);
			});
		}

		$companies->orderBy('created_at');

		return $companies;
	}

	public function getCompanyName() {
		return $this->info->company_name;
	}

	public function info() {
		return $this->hasOne( 'App\UserInfo', 'id', 'user_info_id' );
	}

	public function products() {
		return $this->hasMany( 'App\Product', 'user_id', 'id' );
	}

	public function buys() {
		return $this->belongsToMany( 'App\Category', 'user_category_buy_product', 'user_id', 'category_id' );
	}

	public function buysLeveled() {
		$unique = [];
	}

	public function sells() {
		return $this->belongsToMany( 'App\Category', 'user_category_sell_product', 'user_id', 'category_id' );
	}

	public function buysHas() {
		return $this->hasMany( 'App\CompanyBuysItem', 'user_id', 'id' );
	}

	public function sellHas() {
		return $this->hasMany( 'App\CompanySellsItem', 'user_id', 'id' );
	}

    public function certificates()
    {
        return $this->hasMany('App\CompanyCertificate', 'user_id', 'id');
    }

	public function representatives() {
		return $this->hasMany('App\CompanyRepresentative', 'company_id', 'id');
	}

	public function isLiked() {
		$liked = CompanyLikes::where('company_id', '=', auth()->user()->id)
							->where('liked_id', '=', $this->id)
							->exists();

		return $liked ? 'true' : 'false';
	}

	public function serviceCategoriesUser( $id, $type = 'buy' ) {
		if ( $type == 'buy' ) {
			return $this->buys()->get()->contains( $id );
		} else if ( $type == 'sell' ) {
			return $this->sells()->get()->contains( $id );

		}
	}

	public function matchesCount() {
		$count = 0;

		$relatedSellers = User::whereIn( 'id', $this->matchesBuy() )->get()->toArray();
		$relatedBuyers = User::whereIn( 'id', $this->matchesSell() )->get()->toArray();

		$count += count( $relatedSellers );
		$count += count( $relatedBuyers );

		return $count;
	}

	public function matchesBuy() {

		// Buy >> Find Sellers

		if($this->info->last_match_seen === null) {
			$this->info->last_match_seen = 0;
		}

		$userBuys = $this->buysHas()->pluck( 'category_id' );
		$sellers  = CompanySellsItem::whereIn( 'category_id', $userBuys )
									->where('user_id', '!=', $this->id)
								//	->where('created_at', '>', $this->info->last_match_seen)
									->get();

		$buyingCompanies = $sellers->pluck( 'user_id' )->toArray();

		return $buyingCompanies;
	}

	public function matchRankSell($company) {
		$userSells = $this->sellHas()->pluck( 'category_id' )->toArray();
		$companySells = $company->sellHas()->pluck( 'category_id' )->toArray();

		$result = array_intersect($userSells, $companySells);

		return $result;
	}

	public function matchesSell() {
		// Sell >> Find buyers
		$userSells = $this->sellHas()->pluck( 'category_id' );

		if($this->info->last_match_seen === null) {
			$this->info->last_match_seen = 0;
		}

		$sellers   = CompanyBuysItem::whereIn( 'category_id', $userSells )
									->where('user_id', '!=', $this->id)
								//	->where('created_at', '>', $this->info->last_match_seen)
									->get();

		$sellingCompanies = $sellers->pluck( 'user_id' )->toArray();

		return $sellingCompanies;
	}

	public function unreadCount() {
		$count = 0;
		Talk::setAuthUserId(auth()->user()->id);
		$inboxes = Talk::threads();
		foreach($inboxes as $inbox) {
			$sender_id = $inbox->withUser->id;
			if ($sender_id != auth()->user()->id ) {
				$conversations = Talk::getMessagesAllByUserId($sender_id, 0, 100);
				foreach($conversations->messages as $message) {
					if ($message->is_seen <= 0 && $message->sender->id != auth()->user()->id) $count ++;
				}
			}
		}
		return $count;
	}

	public function routeNotificationForMail($notification)
  {
    return $this->email_address;
  }

	public function getPhoto() {

		return $this->photo == null ? "assets/user/images/thumb.jpg" : "uploads/" . $this->photo;

	}

	public function reviews() {
		return $this->hasMany('App\Review', 'company_id');
	}

	public function rate() {
		$avgRate =	Review::select(DB::raw('AVG(rating) AS rate'))
						->where('company_id', '=', $this->id)
						->get();

		return intval($avgRate[0]->rate);
	}

	public function posts() {
		return $this->hasMany('App\Post', 'user_id');
	}

	public function average_review() {
		$reviews = $this->reviews()->get();
		$total = 0;
		for ($i = 0 ; $i < count($reviews); $i ++)
		{
			$total += $reviews[$i]->rating;
		}
		if(count($reviews) === 0) {
		    $reviews = [0];
        }
		return $total / count($reviews);
	}

	public function favorites() {
		$favorite_ids = CompanyLikes::where('company_id', '=', $this->id)->get('liked_id') -> pluck('liked_id') -> toArray();
		$users = User::whereIn('id', $favorite_ids)->get();
		return $users;
	}
}

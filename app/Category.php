<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use App\Http\Modules\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Http\Traits\Searchable;

class Category extends Model {

	use HasTranslations;
	use Searchable;


	protected $table = 'category';
	public $translatable = [ 'name' ];

	public $timestamps = false;

	protected $fillable = [
		'parent_category_id',
		'type',
		'name',
		'importance'
	];


	public static function topLevelCategories() {
		$categories = Category::where( 'parent_category_id', '=', null );

		return $categories;
	}

	public static function serviceCategories() {
		$categories = Category::where( 'parent_category_id', '=', null )->where( 'type', '=', 1 )->with('childCategories');

		return $categories;
	}

	public static function productCategories() {
		$categories = Category::where( 'parent_category_id', '=', null )->where( 'type', '=', 0 );

		return $categories;
	}


	public function childCategories() {
		return $this->hasMany( 'App\Category', 'parent_category_id', 'id' );
	}

	public function parent() {
		return $this->belongsTo( 'App\Category', 'parent_category_id', 'id' );
	}

	public function buyers() {
		return $this->belongsToMany('App\User', 'user_category_buy_product', 'user_id', 'category_id');
	}

	public function user_types() {
		return $this->belongsToMany('App\UserType', 'user_types_categories', 'user_type_id', 'category_id');
	}

	public function categories_by_type($type = 1) {
//		Category::whereIn('')
	}

	public function products() {
		return $this->belongsToMany('App\Product', 'product_category');
	}

	public function categoryPathPrint()  {
		$item = $this;
		$output = $item->name;
		while($item->parent) {
			$output .=  "<span class='divider'> / </span>" . $item->parent->name;

			$item = $item->parent;
		}

		return $output;
	}

	public function companiesSelling() {
		return $this->hasMany();
	}

	public function companiesBuying() {
		return $this->hasMany();
	}

	/**
     * Get the indexable data array for the product.
     *
     * @return array
     */
    public function toSearchableArray()
    {	
		
        $array = $this->toArray();

        // Customize the data array...

        return $array;
    }

	public function searchTable()
    {
        return 'category';
    }

    public function searchKey()
    {
        return 'id';
    }

    public function searchColumns()
    {
        return ['name'];
    }
}

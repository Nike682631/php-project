<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use App\Http\Modules\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use App\Http\Traits\Searchable;
use Illuminate\Support\Facades\Log;
use Spatie\Activitylog\Traits\LogsActivity;

class Product extends Model implements HasMedia
{
    use HasMediaTrait;
	use Searchable;
	use LogsActivity;

	protected $table = 'product';

	protected $fillable = [
		'photo',
		'product_name',
		'price',
		'price_from',
		'price_to',
		'unit',
		'description',
	];

	protected static $logFillable = true;


	public function getPrice() {
		return $this->price_from . ' €';
	}

	public function user() {
		return $this->hasOne('App\User', 'id', 'user_id');
	}

	public function getFromPrice() {
		return $this->price_from . ' €';
	}

	public function getToPrice() {
		return $this->price_to . ' €';
	}

	public function getImage() {
		if($this->media->first()) {
			$url = $this->media->first()->getFullUrl();

		} else {
			$url = '/assets/images/product-default-image.jpg';

		}


		return $url;
	}

	public function categories() {
		return $this->belongsToMany('App\Category', 'product_category');
	}

	public function getRelatedProducts() {
		$products = collect();
		foreach($this->categories()->get() as $category) {
			$products = $products->merge($category->products()->get());
			if ($products->count() > 2) return $products->slice(0, 3);
		}
		return $products;
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
        return 'product';
    }

    public function searchKey()
    {
        return 'id';
    }

    public function searchColumns()
    {
        return ['product_name'];
    }
}

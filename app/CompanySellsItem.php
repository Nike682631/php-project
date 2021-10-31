<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Category;

class CompanySellsItem extends Model
{
    //

	protected $table = 'user_category_sell_product';

	public function user() {
		return $this->hasOne('App\User', 'id', 'user_id');
	}

	public function category() {
		return $this->hasOne('App\Category', 'id', 'category_id');
	}

	public static function checkIfRelationshipsExists() {
		$sell = CompanySellsItem::all();
		foreach($sell as $item) {
			$user = User::find($item->user_id);
			$category = Category::find($item->category_id);
			if($user && $category) {
			} else {
				$model = CompanySellsItem::where('user_id', $item->user_id)->where('category_id', $item->category_id);
				// No. It will delete all records with equals $model->custom_id for this model.
				$model->delete();
			}
		}
	}
}

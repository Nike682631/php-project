<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    //

	public function categories() {
		return $this->belongsToMany('App\Category', 'user_types_categories', 'user_type_id', 'category_id');
	}
}

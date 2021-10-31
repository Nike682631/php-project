<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyLikes extends Model
{

    protected $table = 'company_likes';

    /**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'company_id',
		'liked_id'
	];
}

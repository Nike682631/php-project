<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogisticsRequest extends Model
{
    //
	protected $table = 'logistic_request';

	public $timestamps = false;
	protected $fillable = [
		'origin_city',
		'origin_country',
		'origin_zip',
		'destination_city',
		'destination_country',
		'destination_zip',
		'pickup_at',
		'weight',
		'height',
		'length',
		'width',
		'pieces',
		'pack_type',
		'description',
		'user_id',
	];

	public function user() {
		return $this->hasOne('App\User', 'id', 'user_id');
	}

	public static function activeRequests() {
		return LogisticsRequest::count();
	}
}

<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use App\Http\Modules\Eloquent\Model;
use App\Http\Traits\Searchable;

class UserInfo extends Model {
	
	use Searchable;

	protected $table = 'user_info';
	public $timestamps = false;

	public $fillable = [
		'company_name',
		'registration_code',
		'vat_number',
		'country',
		'address',
		'employees_number',
		'website',
		'person_type',
		'person_full_name',
		'person_job_title',
		'person_skype',
		'person_phone',
		'description',
		'creation_year',
		'year_turnover',
		'production_volume',
		'purchase_volume',
		'person_phone2',
		'zip'
	];


	public function user() {
		return $this->hasOne('App\User', 'user_info_id', 'id');
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
        return 'user_info';
    }

    public function searchKey()
    {
        return 'id';
    }

    public function searchColumns()
    {
        return ['company_name'];
    }
}

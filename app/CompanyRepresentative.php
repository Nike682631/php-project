<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class CompanyRepresentative extends Model implements HasMedia
{
    use SoftDeletes;
    use HasMediaTrait;

    protected $table = "company_representative";

    protected $fillable = [
        'company_id',
        'representative_name',
        'email',
        'phone',
        'linkedin_url'
    ];

    protected $appends = [
        'photo'
    ];

    function company() {
        return $this->hasOne('App\User', 'id', 'company_id');
    }

    function getPhotoAttribute() {
        $medias = $this->getMedia('CompanyRepresentative');
        foreach($medias as $media) {
            return $media->getFullUrl();
        }

        return null;
    }
}

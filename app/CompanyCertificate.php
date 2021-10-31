<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class CompanyCertificate extends Model implements HasMedia
{
    use SoftDeletes;
    use HasMediaTrait;

    /**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'user_id',
		'title'
	];

    protected $appends = [
        'thumbnail',
        'file'
    ];

    function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    function getThumbnailAttribute() {
        $medias = $this->getMedia('CompanyCertificateThumbnail');
        foreach($medias as $media) {
            return $media->getFullUrl();
        }

        return null;      
    }

    function getFileAttribute() {
        $medias = $this->getMedia('CompanyCertificateFile');
        foreach($medias as $media) {
            return $media->getFullUrl();
        }

        return null;      
    }
}

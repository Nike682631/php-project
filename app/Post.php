<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Post extends Model
{
    //
    use LogsActivity;


    protected $table = 'posts';


	protected $fillable = [
		'user_id',
		'post_content',
		'photo'
	];

	public function getPhoto() {
		/* TODO: Implement normal logic for thumbnails and media files returining full url path */
		if($this->photo) {
			return $this->photo;
		} else {
			return asset('assets/images/demo-cover.png');
		}
	}
}

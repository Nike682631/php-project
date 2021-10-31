<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'company_id', 'author_id', 'rating', 'description', 'approved'
    ];

    public function company() {
        return $this->belongsTo('App\User', 'company_id');
    }

    public function author() {
        return $this->belongsTo('App\User', 'author_id');
    }
}

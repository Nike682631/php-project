<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Log;

class Message extends Model
{
    protected $table = 'messages';

    public $timestamps = true;

    protected $appends = ['humans_time'];

    public $fillable = [
        'message',
        'is_seen',
        'deleted_from_sender',
        'deleted_from_receiver',
        'user_id',
        'conversation_id',
    ];

    /*
     * make dynamic attribute for human readable time
     *
     * @return string
     * */
    public function getHumansTimeAttribute()
    {
        $date = $this->created_at;
        $now = $date->now();

        return $date->diffForHumans($now, true);
    }

    /*
     * make a relation between conversation model
     *
     * @return collection
     * */
    public function conversation()
    {
        return $this->belongsTo('Nahid\Talk\Conversations\Conversation');
    }

    /*
   * make a relation between user model
   *
   * @return collection
   * */
    public function user()
    {
        return $this->belongsTo(
            config('talk.user.model', 'App\User'),
            config('talk.user.foreignKey'),
            config('talk.user.ownerKey')
        );
    }

    /*
   * its an alias of user relation
   *
   * @return collection
   * */
    public function sender()
    {
        return $this->user();
    }
}

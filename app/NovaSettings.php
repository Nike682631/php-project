<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NovaSettings extends Model
{
    protected $table = 'nova_settings';

	public $timestamps = false;

    public static function getMatchSettings() {
        $allSettings = NovaSettings::get();
        $matchSettings = array();
        foreach($allSettings as $setting) 
        {
            $matchSettings[$setting->key] = $setting->value;
        }
        return $matchSettings;
    }
}

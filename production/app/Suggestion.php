<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    public function preferences(){
        return $this->belongsToMany('App\Preference')->withTimestamps();
    }

    public function location(){
        return $this->belongsTo('App\Location');
    }

    public function activities(){
        return $this->hasMany('App\Activity');
    }
	
	public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function image(){
        return $this->belongsTo('App\Image');
    }
}

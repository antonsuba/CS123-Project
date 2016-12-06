<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public function location(){
        return $this->belongsTo('App\Location');
    }
    public function activities(){
        return  $this->hasMany('App\Activity');
    }

    public function image(){
        return $this->belongsTo('App\Image');
    }
}

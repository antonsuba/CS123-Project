<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public function location(){
        return $this->belongsTo('App\Location');
    }
    public function activities(){
        return $this->belongsToMany('App\Activity')->WithTimestamps();
    }

    public function image(){
        return $this->belongsTo('App\Image');
    }
}

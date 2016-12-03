<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function places(){
        return $this->belongsToMany('App\Place');
    }

    public function suggestions(){
        return $this->belongsToMany('App\Suggestion');
    }
}

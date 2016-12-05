<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function suggestions(){
        return  $this->belongsToMany('App\Suggestion')->withTimestamps();
    }

    public function users(){
        return $this->belongsToMany('App\User');
    }
}

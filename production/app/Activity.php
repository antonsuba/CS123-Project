<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public function suggestion(){
        return $this->belongsToMany('App\Suggestion');
    }

    public function place(){
        return $this->belongsTo('App\Place');
    }
}

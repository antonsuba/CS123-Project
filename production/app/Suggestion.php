<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    public function preferences(){
        return $this->belongsToMany('App\Preference');
    }
}

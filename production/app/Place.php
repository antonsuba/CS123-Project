<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public function location(){
        return $this->belongsTo('App\Location');
    }
    public function suggestions(){
        return  $this->belongsToMany('App\Suggestion', 'suggestion_place')->withTimeStamps();
    }
}

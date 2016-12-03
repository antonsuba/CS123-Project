<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    protected $fillable = ['location_id'];

    public function preferences(){
        return $this->belongsToMany('App\Preference');
    }

    public function location(){
        return $this->belongsTo('App\Location');
    }

    public function places(){
        return $this->belongsToMany('App\Place', 'suggestion_place')->withTimeStamps();
    }
}

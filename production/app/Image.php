<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function place(){
        return $this->belongsTo('App\Place');
    }

    public function suggestion(){
        return $this->belongsTo('App\Suggestion');
    }
}

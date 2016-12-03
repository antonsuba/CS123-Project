<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
	public function suggestion(){
        return $this->belongsTo('App\Suggestion');
    }
}

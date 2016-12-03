<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
	public function suggestion(){
        return $this->belongsTo('App\Suggestion');
    }
	
	public function user(){
        return $this->belongsTo('App\User');
    }
}

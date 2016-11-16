<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
<<<<<<< HEAD
    //
=======
    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function suggestions(){
        return  $this->belongsToMany('App\Suggestion');
    }
>>>>>>> 8253f23d358b07ca7e14555f790dbbd913c1be63
}

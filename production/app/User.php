<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'facebook_id', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	public function comments(){
		return $this->hasMany('App\Comment');
	}

    public function preferences(){
        return $this->belongsToMany('App\Preference');
    }

    public function bookmarks(){
        return $this->hasMany('App\Bookmark');
    }
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password', 'contact', 'profile_image','status'
    ];
	
	protected $appends = ['full_name'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
	
	public function getFullNameAttribute()
    {
		return $this->first_name." ".$this->last_name;
	}
	
	// public function activetasks()
 //    {
 //        return $this->hasMany('App\Survey', 'surveyor_id', 'id')->where('status', 'open');
 //    }
	// public function closedtasks()
 //    {
 //        return $this->hasMany('App\Survey', 'surveyor_id', 'id')->where('status', 'closed');
 //    }
	// public function tasks()
 //    {
 //        return $this->hasMany('App\Survey', 'surveyor_id', 'id');
 //    }
	
}

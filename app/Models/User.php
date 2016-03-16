<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	protected $table = 'users';
	
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
	
	public function user_create()
	{
		return $this->belongsTo('App\Models\User', 'id_created');
	}

	public function user_modify()
	{
		return $this->belongsTo('App\Models\User', 'id_modified');
	}
	
	public function user_level()
	{
		return $this->belongsTo('App\Models\UserLevel', 'id_user_level');
	}
	
}

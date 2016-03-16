<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLevel extends Model
{
	protected $table = 'user_levels';
	
    protected $fillable = [
        'level_name', 'status', 'id_created', 'id_modified',
    ];

	public function user_create()
	{
		return $this->belongsTo('App\Models\User', 'id_created');
	}

	public function user_modify()
	{
		return $this->belongsTo('App\Models\User', 'id_modified');
	}
    
}

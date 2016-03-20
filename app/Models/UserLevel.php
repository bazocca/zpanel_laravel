<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLevel extends Model
{
	protected $table = 'user_levels';
	
    protected $fillable = [
        'id','level_name', 'status', 'id_created', 'id_modified',
    ];

	public static $rules = [
		'level_name' => 'required',
	];

	public static $messages = [
		'level_name.required' => 'The Name field is required.',
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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaLibrary extends Model
{
	protected $table = 'media_libraries';
	
    protected $fillable = [
        'id','name', 'type', 'url', 'id_created',
    ];

	public function user_create()
	{
		return $this->belongsTo('App\Models\User', 'id_created');
	}

}

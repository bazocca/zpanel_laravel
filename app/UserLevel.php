<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLevel extends Model
{
    protected $fillable = [
        'level_name', 'status', 'id_created', 'id_modified',
    ];
    
}

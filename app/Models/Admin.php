<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';

    public function users()
    {
        return $this->belongsTo(\App\Models\User::class, 'users_id', 'id');
    }
}

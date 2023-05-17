<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HRD extends Model
{
    protected $table = 'hrd';

    public function users()
    {
        return $this->belongsTo(\App\Models\User::class, 'users_id', 'id');
    }
}

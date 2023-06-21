<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PegawaiAsuransi extends Model
{
    protected $table = 'pegawai_asuransis';

    public function users()
    {
        return $this->belongsTo(\App\Models\User::class, 'users_id', 'id');
    }
}

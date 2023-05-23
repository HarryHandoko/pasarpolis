<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment';

    public function empProduct()
    {
        return $this->belongsTo(\App\Models\EmpoyeeProduct::class, 'employee_products_id', 'id');
    }

    public function hrd()
    {
        return $this->belongsTo(\App\Models\HRD::class, 'hrd_id', 'id');
    }
}

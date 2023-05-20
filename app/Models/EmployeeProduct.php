<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeProduct extends Model
{
    protected $table = 'employee_products';

    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class, 'products_id', 'id');
    }
}

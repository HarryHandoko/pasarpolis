<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductBenefit extends Model
{
    protected $table = 'products_profit';

    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class, 'products_id', 'id');
    }
}

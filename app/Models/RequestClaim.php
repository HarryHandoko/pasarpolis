<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestClaim extends Model
{
    protected $table = 'request_claims';

    public function productBenefit()
    {
        return $this->belongsTo(\App\Models\ProductBenefit::class, 'product_profit_id', 'id');
    }

    public function employee()
    {
        return $this->belongsTo(\App\Models\Employee::class, 'employee_id', 'id');
    }
}

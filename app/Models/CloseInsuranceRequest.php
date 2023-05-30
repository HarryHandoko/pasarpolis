<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CloseInsuranceRequest extends Model
{
    protected $table = 'close_insurance_requests';

    public function employee()
    {
        return $this->belongsTo(\App\Models\Employee::class, 'employee_id', 'id');
    }
}

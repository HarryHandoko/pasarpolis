<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

    public function users()
    {
        return $this->belongsTo(\App\Models\User::class, 'users_id', 'id');
    }

    public function hrd()
    {
        return $this->belongsTo(\App\Models\HRD::class, 'hrd_id', 'id');
    }

    public function empProduct()
    {
        return $this->belongsTo(\App\Models\EmployeeProduct::class, 'id', 'employee_id');
    }
}

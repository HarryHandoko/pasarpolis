<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\HRD;
use App\Models\Employee;
use App\Models\EmployeeProduct;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->role_id == '1'){
            return view('dashboard.index');
        }else if(Auth::user()->role_id == '2'){
            $data['totalPremis'] = DB::table('employee_products')->select(DB::raw('sum(products.premi) as premi'))
            ->join('products','products.id','employee_products.products_id')
            ->join('employees','employees.id','employee_products.employee_id')
            ->where('employee_products.status_asuransi','!=','Tidak Aktif')
            ->where('employees.hrd_id',HRD::where('users_id',auth()->user()->id)->first()->id)
            ->first()->premi;
            $data['totalEmp'] = Employee::where('hrd_id',HRD::where('users_id',auth()->user()->id)->first()->id)
            ->join('employee_products','employee_products.employee_id','employees.id')
            ->where('employee_products.status_asuransi','!=','Tidak Aktif')
            ->count();
            $data['totalSudahDibayar'] = EmployeeProduct::join('employees','employees.id','=','employee_products.employee_id')
            ->where('hrd_id',HRD::where('users_id',auth()->user()->id)->first()->id)
            ->where('status_pembayaran','Sudah Dibayar')
            ->where('status_asuransi','Aktif')
            ->count();
            $data['TotalAktif'] = EmployeeProduct::join('employees','employees.id','=','employee_products.employee_id')
            ->where('hrd_id',HRD::where('users_id',auth()->user()->id)->first()->id)
            ->where('status_asuransi','Aktif')
            ->count();
            $data['TotalBelumBayar'] = EmployeeProduct::join('employees','employees.id','=','employee_products.employee_id')
            ->where('hrd_id',HRD::where('users_id',auth()->user()->id)->first()->id)
            ->where('status_asuransi','!=','Tidak Aktif')
            ->where('status_pembayaran','!=','Sudah Dibayar')
            ->count();
            $data['NonAktif'] = EmployeeProduct::join('employees','employees.id','=','employee_products.employee_id')
            ->where('hrd_id',HRD::where('users_id',auth()->user()->id)->first()->id)
            ->where('status_asuransi','Tidak Aktif')
            ->count();
            return view('dashboard.hrd',$data);
        }else if(Auth::user()->role_id == '3'){
            return view('dashboard.employee');
        }
    }

}

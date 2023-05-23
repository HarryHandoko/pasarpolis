<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->role_id == '1'){
            return view('dashboard.index');
        }else if(Auth::user()->role_id == '2'){
            return view('dashboard.index');
        }else if(Auth::user()->role_id == '3'){
            return view('dashboard.employee');
        }
    }

}

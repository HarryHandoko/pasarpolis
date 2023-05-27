<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Employee;
use App\Models\EmployeeProduct;
use App\Models\HRD;
use Validator;

class AuthenticationController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }

    public function login(Request $request)
    {
        Validator::make($request->all(), [
            'login-email' => 'required|email|exists:users,email',
            'login-password' => 'required',
        ]);

        
        $user = User::where('email', $request['login-email']);
        if($user->count() == 0){
            return redirect()->route('admin.login')->with('error', 'Password anda salah!');
        }else{
            $user = $user->first();
        }

        if($user->role_id == 2){
            if(HRD::where('users_id', $user->id)->where('status','Aktif')->count() < 1){
                return redirect()->route('admin.login')->with('error', 'Akun Asuransi Anda Telah di Non-Aktifkan silahkan hubungi Admin PasarPolis');
            }else{
                if (Auth::attempt(['email' => $request['login-email'], 'password' => $request['login-password']])) {
                    $user->createToken($user->email)->plainTextToken;
                    return redirect()->route('admin.dashboard');
                }else{
                    return redirect()->route('admin.login')->with('error', 'Password anda salah!');
                }
            }
        }else if($user->role_id == 3){
            if(EmployeeProduct::join('employees','employees.id','employee_products.employee_id')->where('employees.users_id', $user->id)->where('employee_products.status_asuransi','Tidak Aktif')->count() >= 1){
                return redirect()->route('admin.login')->with('error', 'Akun Asuransi Anda Telah di Non-Aktifkan silahkan hubungi Admin PasarPolis');
            }else if(HRD::where('id', Employee::where('users_id',$user->id)->first()->hrd_id)->where('status','Aktif')->count() < 1){
                return redirect()->route('admin.login')->with('error', 'Akun Asuransi Anda Telah di Non-Aktifkan silahkan hubungi Admin PasarPolis');
            }else{
                if (Auth::attempt(['email' => $request['login-email'], 'password' => $request['login-password']])) {
                    $user->createToken($user->email)->plainTextToken;
                    return redirect()->route('admin.dashboard');
                }else{
                    return redirect()->route('admin.login')->with('error', 'Password anda salah!');
                }
            }
        }else{
            if (Auth::attempt(['email' => $request['login-email'], 'password' => $request['login-password']])) {
                $user->createToken($user->email)->plainTextToken;
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->route('admin.login')->with('error', 'Password anda salah!');
            }
        }
        
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

}

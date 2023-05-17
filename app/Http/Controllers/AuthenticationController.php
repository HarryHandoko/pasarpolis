<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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

 
        if (Auth::attempt(['email' => $request['login-email'], 'password' => $request['login-password']])) {
            $user = User::where('email', $request['login-email'])->first();
            $user->createToken($user->email)->plainTextToken;
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->route('admin.login')->with('error', 'Password anda salah!');
        }
        
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

}

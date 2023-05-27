<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\HRD;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SignUpController extends Controller
{
    public function index()
    {
        return view('website.signup.index');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'tanggal_lahir' => 'required',
            'no_telepon' => 'required|numeric|unique:hrd,no_telepon',
            'email' => 'required|email|unique:users,email',
            'katasandi' => 'required|min:8',
            'confirmation_password' => 'required|same:katasandi|min:8',

            'office_name' => 'required',
            'office_type' => 'required',
            'office_address' => 'required',
            'office_phone' => 'required|numeric|unique:hrd,office_phone',
            'office_email' => 'required|email|unique:hrd,office_email',
            
        ]);

        $getID = DB::table('users')->insertGetID([
            'email' => $request->email,
            'role_id' => 2,
            'password' => Hash::make($request->katasandi),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        HRD::insert([
            'users_id' => "$getID",
            'name' => $request->name,
            'gender' => $request->gender,
            'tanggal_lahir' => $request->tanggal_lahir,
            'status' => 'Tidak Aktif',
            'no_telepon' => $request->no_telepon,
            'office_name' => $request->office_name,
            'office_type' => $request->office_type,
            'office_phone' => $request->office_phone,
            'office_email' => $request->office_email,
            'office_address' => $request->office_address,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->route('success_register');
    }

    public function successRegister()
    {
        return view('website.signup.success');
    }
}

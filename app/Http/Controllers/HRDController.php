<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\HRD;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Validator;

class HRDController extends Controller
{
    public function index()
    {
        $data['data'] = HRD::get();
        return view('hrd.index',$data);
    }

    public function add()
    {
        $data['data'] = null;
        return view('hrd.form',$data);
    }

    public function store(Request $request)
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
            'status' => 'Aktif',
            'no_telepon' => $request->no_telepon,
            'office_name' => $request->office_name,
            'office_type' => $request->office_type,
            'office_phone' => $request->office_phone,
            'office_email' => $request->office_email,
            'office_address' => $request->office_address,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        

        return redirect()->route('admin.hrd')->with('status', 'Akun Berhasil diTambah!');
    }

    public function edit($id)
    {
        $data['data'] = HRD::findOrFail($id);
        return view('hrd.form',$data);
    }

    public function update(Request $request,$id)
    {
        $data = HRD::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'tanggal_lahir' => 'required',
            'no_telepon' => 'required|numeric|unique:hrd,no_telepon,'.$id,
            'email' => 'required|email|unique:users,email,'.$data->users_id,
            'katasandi' => 'nullable|min:8',

            'office_name' => 'required',
            'office_type' => 'required',
            'office_address' => 'required',
            'office_phone' => 'required|numeric|unique:hrd,office_phone,'.$id,
            'office_email' => 'required|email|unique:hrd,office_email,'.$id,
            
        ]);

        if(!$request->katasandi){

            User::where('id',$data->users_id)->update([
                'email' => $request->email,
                'role_id' => 2,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }else{

            User::where('id',$data->users_id)->update([
                'email' => $request->email,
                'role_id' => 2,
                'password' => Hash::make($request->katasandi),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        HRD::where('id',$id)->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_telepon' => $request->no_telepon,
            'office_name' => $request->office_name,
            'office_type' => $request->office_type,
            'office_phone' => $request->office_phone,
            'office_email' => $request->office_email,
            'office_address' => $request->office_address,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->route('admin.hrd')->with('status', 'Akun Berhasil diUbah!');
    }


    public function delete($id)
    {
        $data = HRD::findOrFail($id);
        User::where('id',$data->users_id)->delete();
        HRD::where('id',$id)->delete();
        return redirect()->route('admin.hrd')->with('status', 'Akun Berhasil diHapus!');
    }
}

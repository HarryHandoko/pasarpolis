<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Validator;

class AdminController extends Controller
{
    public function index()
    {
        $data['data'] = Admin::get();
        return view('admin.index',$data);
    }

    public function add()
    {
        $data['data'] = null;
        return view('admin.form',$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'no_handphone' => 'required|numeric',
            'email' => 'required|email|unique:users,email',
            'katasandi' => 'required|min:8',
            'confirmation_password' => 'required|same:katasandi|min:8',
        ]);

        $getID = DB::table('users')->insertGetID([
            'email' => $request->email,
            'role_id' => 1,
            'password' => Hash::make($request->katasandi),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        Admin::insertGetID([
            'users_id' => "$getID",
            'name' => $request->name,
            'no_handphone' => $request->no_handphone,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        

        return redirect()->route('admin.admin')->with('status', 'Akun Berhasil diTambah!');
    }

    public function edit($id)
    {
        $data['data'] = Admin::findOrFail($id);
        return view('admin.form',$data);
    }

    public function update(Request $request,$id)
    {
        $data = Admin::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'no_handphone' => 'required|numeric|unique:admin,no_handphone,'.$id,
            'email' => 'required|email|unique:users,email,'.$data->users_id,
            'katasandi' => 'nullable|min:8',
        ]);

        if(!$request->katasandi){

            User::where('id',$data->users_id)->update([
                'email' => $request->email,
                'role_id' => 1,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }else{

            User::where('id',$data->users_id)->update([
                'email' => $request->email,
                'role_id' => 1,
                'password' => Hash::make($request->katasandi),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        Admin::where('id',$id)->update([
            'name' => $request->name,
            'no_handphone' => $request->no_handphone,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->route('admin.admin')->with('status', 'Akun Berhasil diUbah!');
    }


    public function delete($id)
    {
        $data = Admin::findOrFail($id);
        User::where('id',$data->users_id)->delete();
        Admin::where('id',$id)->delete();
        return redirect()->route('admin.admin')->with('status', 'Akun Berhasil diHapus!');
    }
}

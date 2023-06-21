<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PegawaiAsuransi;
use Illuminate\Support\Facades\Hash;
use Validator;

class PegawaiAsuransiController extends Controller
{
    public function index()
    {
        $data['data'] = PegawaiAsuransi::get();
        return view('pegawai_asuransi.index',$data);
    }

    public function add()
    {
        $data['data'] = null;
        return view('pegawai_asuransi.form',$data);
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
            'role_id' => 4,
            'password' => Hash::make($request->katasandi),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        PegawaiAsuransi::insertGetID([
            'users_id' => "$getID",
            'name' => $request->name,
            'no_handphone' => $request->no_handphone,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        

        return redirect()->route('admin.pegawai-asuransi')->with('status', 'Akun Berhasil diTambah!');
    }

    public function edit($id)
    {
        $data['data'] = PegawaiAsuransi::findOrFail($id);
        return view('pegawai_asuransi.form',$data);
    }

    public function update(Request $request,$id)
    {
        $data = PegawaiAsuransi::findOrFail($id);

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

        PegawaiAsuransi::where('id',$id)->update([
            'name' => $request->name,
            'no_handphone' => $request->no_handphone,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->route('admin.pegawai-asuransi')->with('status', 'Akun Berhasil diUbah!');
    }


    public function delete($id)
    {
        $data = PegawaiAsuransi::findOrFail($id);
        User::where('id',$data->users_id)->delete();
        PegawaiAsuransi::where('id',$id)->delete();
        return redirect()->route('admin.pegawai-asuransi')->with('status', 'Akun Berhasil diHapus!');
    }
}

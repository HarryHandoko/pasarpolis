<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Validator;

class RoleController extends Controller
{
    public function index()
    {
        $data['data'] = Role::get();
        return view('role.index',$data);
    }

    public function add()
    {
        $data['data'] = null;
        return view('role.form',$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Role::insertGetID([
            'name' => $request->name,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        

        return redirect()->route('admin.role')->with('status', 'Data Berhasil diTambah!');
    }

    public function edit($id)
    {
        $data['data'] = Role::findOrFail($id);
        return view('role.form',$data);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Role::where('id',$id)->update([
            'name' => $request->name,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->route('admin.role')->with('status', 'Data Berhasil diUbah!');
    }


    public function delete($id)
    {
        Role::where('id',$id)->delete();
        return redirect()->route('admin.role')->with('status', 'Data Berhasil diHapus!');
    }
}

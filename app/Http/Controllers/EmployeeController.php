<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\HRD;
use App\Models\User;
use App\Models\Employee;
use App\Models\Product;
use App\Models\EmployeeProduct;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Validator;

class EmployeeController extends Controller
{
    public function index()
    {
        if(Auth::user()->role_id == '1'){
            $data['data'] = Employee::get();
        }else{
            $data['data'] = Employee::where('hrd_id',HRD::where('users_id',auth()->user()->id)->first()->id)->get();
        }
        return view('employee.index',$data);
    }

    public function add()
    {
        $data['hrd'] = HRD::get();
        $data['product'] = Product::get();
        $data['data'] = null;
        return view('employee.form',$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'alamat' => 'required',
            'jabatan' => 'required',
            'tanggal_lahir' => 'required',
            'no_handphone' => 'required|numeric|unique:employees,no_handphone',
            'email' => 'required|email|unique:users,email',
            'katasandi' => 'required|min:8',
            'confirmation_password' => 'required|same:katasandi|min:8',
            'products_id' => 'required',
        ]);

        $getID = DB::table('users')->insertGetID([
            'email' => $request->email,
            'role_id' => 3,
            'password' => Hash::make($request->katasandi),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        if (auth()->user()->role_id == '1'){
            $hrd_id = $request->hrd_id;
        }else{
            $hrd_id = HRD::where('users_id',auth()->user()->id)->first()->id;
        }

        //noPolis 
        $noPolis = date('Ymd').'-'.substr("00000",0,5-strlen($hrd_id)).$hrd_id.'-'.substr("00000",0,5-strlen(Employee::where('hrd_id',$hrd_id)->count()+1)).Employee::where('hrd_id',$hrd_id)->count()+1;


        $emp_id =  DB::table('employees')->insertGetID([
            'hrd_id' => $hrd_id,
            'no_polis' => $noPolis,
            'users_id' => "$getID",
            'name' => $request->name,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'no_handphone' => $request->no_handphone,
            'jabatan' => $request->jabatan,
            'created_at' => date('Y-m-d H:i:s')
        ]);


        EmployeeProduct::insert([
            'employee_id' => $emp_id,
            'products_id' => $request->products_id,
            'status_asuransi' => 'Menunggu Pembayaran',
            'status_pembayaran' => 'Menunggu Pembayaran',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->route('admin.employee')->with('status', 'Akun Berhasil diTambah!');
    }

    public function edit($id)
    {
        $data['hrd'] = HRD::get();
        $data['product'] = Product::get();
        $data['data'] = Employee::findOrFail($id);
        return view('employee.form',$data);
    }

    public function update(Request $request,$id)
    {
        $data = Employee::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'alamat' => 'required',
            'jabatan' => 'required',
            'tanggal_lahir' => 'required',
            'no_handphone' => 'required|numeric|unique:employees,no_handphone',
            'email' => 'required|email|unique:users,email',
            'no_handphone' => 'required|numeric|unique:employees,no_handphone,'.$id,
            'email' => 'required|email|unique:users,email,'.$data->users_id,
            'katasandi' => 'nullable|min:8',
            'products_id' => 'required',
        ]); 

        if(!$request->katasandi){

            User::where('id',$data->users_id)->update([
                'email' => $request->email,
                'role_id' => 3,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }else{

            User::where('id',$data->users_id)->update([
                'email' => $request->email,
                'role_id' => 3,
                'password' => Hash::make($request->katasandi),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        if (auth()->user()->role_id == '1'){
            $hrd_id = $request->hrd_id;
        }else{
            $hrd_id = HRD::where('users_id',auth()->user()->id)->first()->id;
        }


        Employee::where('id',$id)->update([
            'hrd_id' => $hrd_id,
            'name' => $request->name,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'no_handphone' => $request->no_handphone,
            'jabatan' => $request->jabatan,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        EmployeeProduct::where('employee_id',$id)->update([
            'products_id' => $request->products_id,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->route('admin.employee')->with('status', 'Akun Berhasil diUbah!');
    }


    public function delete($id)
    {
        $data = Employee::findOrFail($id);
        User::where('id',$data->users_id)->delete();
        Employee::where('id',$id)->delete();
        return redirect()->route('admin.employee')->with('status', 'Akun Berhasil diHapus!');
    }
}

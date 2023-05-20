<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use Validator;

class ProductController extends Controller
{
    public function index()
    {
        $data['data'] = Product::get();
        return view('product.index',$data);
    }

    public function add()
    {
        $data['data'] = null;
        return view('product.form',$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'premi' => 'required|numeric',
            'description' => 'nullable',
        ]);

        Product::insertGetID([
            'name' => $request->name,
            'premi' => $request->premi,
            'description' => $request->description,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        

        return redirect()->route('admin.product')->with('status', 'Data Berhasil diTambah!');
    }

    public function edit($id)
    {
        $data['data'] = Product::findOrFail($id);
        return view('product.form',$data);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'premi' => 'required|numeric',
            'description' => 'nullable',
        ]);

        Product::where('id',$id)->update([
            'name' => $request->name,
            'premi' => $request->premi,
            'description' => $request->description,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->route('admin.product')->with('status', 'Data Berhasil diUbah!');
    }


    public function delete($id)
    {
        Product::where('id',$id)->delete();
        return redirect()->route('admin.product')->with('status', 'Data Berhasil diHapus!');
    }
}

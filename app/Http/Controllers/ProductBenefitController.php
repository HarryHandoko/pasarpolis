<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductBenefit;
use Illuminate\Support\Facades\Hash;
use Validator;
use File;

class ProductBenefitController extends Controller
{
    public function index($id)
    {
        $data['product_id'] = $id;
        $data['data'] = ProductBenefit::where('products_id',$id)->get();
        return view('product_benefit.index',$data);
    }

    public function add($id)
    {
        $data['product_id'] = $id;
        $data['data'] = null;
        return view('product_benefit.form',$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'jumlah_biaya' => 'required|numeric',
            'logo' => 'required',
            'image' => 'required',
            'description' => 'nullable',
        ]);

            $image = $request->file('image');
            if ($image) {
                $path = public_path().'/image/product/';
                if (!file_exists($path)) {
                    $destination = File::makeDirectory($path, 0777,true);
                }
                $ava_name = 'image '.$request->name.'_'.'.'.$image->getClientOriginalExtension();
                $image->move($path,$ava_name);
                $image_file = url('/').'/image/product/'.$ava_name;
            }else{
                $image_file = url('/').'/image/logo.jpeg';
            }

        ProductBenefit::insertGetID([
            'products_id' => $request->products_id,
            'name' => $request->name,
            'jumlah_biaya' => $request->jumlah_biaya,
            'logo' => $request->logo,
            'image' => $image_file,
            'description' => $request->description,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        

        return redirect()->route('admin.product_benefit',$request->products_id)->with('status', 'Data Berhasil diTambah!');
    }

    public function edit($id)
    {
        $data['data'] = ProductBenefit::findOrFail($id);
        $data['product_id'] = ProductBenefit::findOrFail($id)->products_id;
        return view('product_benefit.form',$data);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'jumlah_biaya' => 'required|numeric',
            'logo' => 'required',
            'image' => 'nullable',
            'description' => 'nullable',
        ]);
        
        $getData = ProductBenefit::findOrFail($id);

        $image = $request->file('image');
        if ($image) {
            $path = public_path().'/image/product/';
            if (!file_exists($path)) {
                $destination = File::makeDirectory($path, 0777,true);
            }
            $ava_name = 'image '.$request->name.'_'.$getData->users_id.'.'.$image->getClientOriginalExtension();

            if(file_exists(public_path('/image/product/'.$ava_name))){
                unlink(public_path('/image/product/'.$ava_name));
            }
            $image->move($path,$ava_name);
            $image_file = url('/').'/image/product/'.$ava_name;
        }else{
            $image_file = $getData->image;
        }

        ProductBenefit::where('id',$id)->update([
            'products_id' => $request->products_id,
            'name' => $request->name,
            'jumlah_biaya' => $request->jumlah_biaya,
            'logo' => $request->logo,
            'image' => $image_file,
            'description' => $request->description,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->route('admin.product_benefit',$request->products_id)->with('status', 'Data Berhasil diUbah!');
    }


    public function delete($products_id,$id)
    {
        ProductBenefit::where('id',$id)->delete();
        return redirect()->route('admin.product_benefit',$products_id)->with('status', 'Data Berhasil diHapus!');
    }
}

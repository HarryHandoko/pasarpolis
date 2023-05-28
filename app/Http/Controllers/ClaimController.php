<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\HRD;
use App\Models\User;
use App\Models\Employee;
use App\Models\RequestClaim;
use Illuminate\Support\Facades\Hash;
use Validator;
use File;

class ClaimController extends Controller
{
    public function index()
    {
        $data['data'] = RequestClaim::where('employee_id',Employee::where('users_id',auth()->user()->id)->first()->id)->get();
        return view('claim.index',$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'bank' => 'required',
            'no_rekening' => 'required|numeric',
            'name_bank' => 'required',
            'kwitansi' => 'required|mimes:pdf',
            'product_profit_id' => 'required',
        ]);

        $getData = Employee::where('users_id',auth()->user()->id)->first();

        $kwitansi = $request->file('kwitansi');
        if ($kwitansi) {
            $path = public_path().'/claim/kwitansi/';
            if (!file_exists($path)) {
                $destination = File::makeDirectory($path, 0777,true);
            }
            $kwitansi_files = 'kwitansi_'.$request->name_bank.'_'.$getData->no_polis.'.'.$kwitansi->getClientOriginalExtension();
            $kwitansi->move($path,$kwitansi_files);
            $kwitansi_file = url('/').'/claim/kwitansi/'.$kwitansi_files;
        }

        RequestClaim::insert([
            'employee_id' => $getData->id,
            'product_profit_id' => $request->product_profit_id,
            'tanggal' => date('Y-m-d'),
            'kwitansi' => $kwitansi_file,
            'bank' => $request->bank,
            'no_rekening' => $request->no_rekening,
            'name_bank' => $request->name_bank,
            'status' => 'Menunggu Konfirmasi',
            'created_at' => date('Y-m-d H:i:s')
        ]);


        return redirect()->route('admin.form-claim')->with('status', 'Request Claim Berhasil Terinput, Silahkan tunggu konfirmasi selanjutnya!');
    }
}
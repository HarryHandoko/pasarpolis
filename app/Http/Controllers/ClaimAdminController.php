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

class ClaimAdminController extends Controller
{
    public function index()
    {
        $data['data'] = RequestClaim::get();
        return view('claim-admin.index',$data);
    }

    public function updateTolak(Request $request)
    {
        $request->validate([
            'alasan' => 'required',
        ]);

        RequestClaim::where('id',$request->id)->update([
            'status' => $request->status,
            'alasan' => $request->alasan,
            'date_response' => date('Y-m-d'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('admin.claim_request_list')->with('status', 'Request Claim berhasil di ubah!');
    }

    public function update($id,$status,Request $request)
    {

        RequestClaim::where('id',$id)->update([
            'status' => $status,
            'date_response' => date('Y-m-d'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('admin.claim_request_list')->with('status', 'Request Claim berhasil di ubah!');
    }

}
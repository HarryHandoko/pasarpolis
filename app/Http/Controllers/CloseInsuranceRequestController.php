<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\HRD;
use App\Models\Employee;
use App\Models\EmployeeProduct;
use App\Models\CloseInsuranceRequest;
use Illuminate\Support\Facades\Auth;
use File;

class CloseInsuranceRequestController extends Controller
{
    public function index()
    {
        $data['data'] = CloseInsuranceRequest::get();
        return view('close_insurance_request.index',$data);
    }

    public function update($id,$status,Request $request)
    {
        $data = CloseInsuranceRequest::findOrFail($id);
        CloseInsuranceRequest::where('id',$id)
        ->update([
            'status' => $status
        ]);

        if($status == 'Approve'){
            EmployeeProduct::where('employee_id',$data->employee_id)
            ->update([
                'status_asuransi' => 'Tidak Aktif'
            ]);
        }
        return redirect()->route('admin.close_insurance_req')->with('status', 'Permintaan Penutupan Polis Berhasil Di Update!');
    }


}

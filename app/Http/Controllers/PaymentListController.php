<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\HRD;
use App\Models\Employee;
use App\Models\EmployeeProduct;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use File;

class PaymentListController extends Controller
{
    public function index()
    {
        $data['data'] = Payment::select('*',DB::raw('sum(total) as totals'))
        ->groupBy('pembayaran_bulan')
        ->groupBy('tanggal')
        ->groupBy('hrd_id')
        ->get();

        return view('paymentList.index',$data);
    }

    public function update($id,$status,$bulan,Request $request)
    {
        $data = Payment::findOrFail($id);
        Payment::where('hrd_id',$data->hrd_id)
        ->where('pembayaran_bulan',$bulan)
        ->where('tanggal',$data->tanggal)
        ->update([
            'status_pembayaran' => $status
        ]);
        return redirect()->route('admin.paymentlist')->with('status', 'Pembayaran Berhasil Di Update!');
    }


}

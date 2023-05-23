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

class PaymentController extends Controller
{
    public function index()
    {
        $data['totalPremi'] = DB::table('employee_products')->select(DB::raw('sum(products.premi) as premi'))
        ->join('products','products.id','employee_products.products_id')
        ->join('employees','employees.id','employee_products.employee_id')
        ->where('employee_products.status_pembayaran','=','Menunggu Pembayaran')
        ->where('employee_products.status_asuransi','!=','Tidak Aktif')
        ->where('employees.hrd_id',HRD::where('users_id',auth()->user()->id)->first()->id)
        ->first()->premi;

        $data['totalPremis'] = DB::table('employee_products')->select(DB::raw('sum(products.premi) as premi'))
        ->join('products','products.id','employee_products.products_id')
        ->join('employees','employees.id','employee_products.employee_id')
        ->where('employee_products.status_asuransi','!=','Tidak Aktif')
        ->where('employees.hrd_id',HRD::where('users_id',auth()->user()->id)->first()->id)
        ->first()->premi;

        $data['totalEmp'] = Employee::where('hrd_id',HRD::where('users_id',auth()->user()->id)->first()->id)
        ->join('employee_products','employee_products.employee_id','employees.id')
        ->where('employee_products.status_asuransi','!=','Tidak Aktif')
        ->count();

        $data['list'] = DB::table('employee_products')->select('employees.name as name','products.name as product','products.premi as premi')
        ->join('products','products.id','employee_products.products_id')
        ->join('employees','employees.id','employee_products.employee_id')
        ->where('employee_products.status_asuransi','!=','Tidak Aktif')
        ->where('employee_products.status_pembayaran','=','Menunggu Pembayaran')
        ->where('employees.hrd_id',HRD::where('users_id',auth()->user()->id)->first()->id)
        ->get();

        $data['riwayat'] = DB::table('payment')
        ->select('*',DB::raw('sum(total) as totals'))
        ->where('hrd_id',HRD::where('users_id',auth()->user()->id)->first()->id)
        ->groupBy('pembayaran_bulan')
        ->get();

        return view('payment.index',$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'total' => 'required',
            'bukti_transfer' => 'required|mimes:jpg,png,jpeg',
        ]);

        $bukti_transfer = $request->file('bukti_transfer');
        if ($bukti_transfer) {
            $path = public_path().'/bukti_transfer/';
            if (!file_exists($path)) {
                $destination = File::makeDirectory($path, 0777,true);
            }
            $ava_name = 'bukti_transfer '.date('YmdHis').'_'.'.'.$bukti_transfer->getClientOriginalExtension();
            $bukti_transfer->move($path,$ava_name);
            $bukti_transfer_file = url('/').'/bukti_transfer/'.$ava_name;
        }

        $getEmpProd = DB::table('employee_products')->select('employee_products.id as id','products.premi as premi')
        ->join('products','products.id','employee_products.products_id')
        ->join('employees','employees.id','employee_products.employee_id')
        ->where('employee_products.status_asuransi','!=','Tidak Aktif')
        ->where('employees.hrd_id',HRD::where('users_id',auth()->user()->id)->first()->id)
        ->get();

        $getBulanBayar = DB::table('payment')
        ->where('hrd_id',HRD::where('users_id',auth()->user()->id)->first()->id)
        ->where('status_pembayaran','Approve')
        ->orderBy('id','Desc');

        if($getBulanBayar->count() > 0){
            if((int) $getBulanBayar->first()->pembayaran_bulan == 12){
                $bulan = 1;
            }else{
                $bulan =(int) $getBulanBayar->first()->pembayaran_bulan + 1;
            }
            $bulanBayar = date('m',strtotime('2023-'.$bulan.'-01'));
        }else{
            $bulan = DB::table('employees')->where('hrd_id',HRD::where('users_id',auth()->user()->id)->first()->id)->first();
            $bulanBayar = date('m',strtotime(DB::table('employees')->where('hrd_id',HRD::where('users_id',auth()->user()->id)->first()->id)->first()->created_at));
        }

        foreach ($getEmpProd as $value) {
            Payment::insert([
                'employee_products_id' => $value->id,
                'hrd_id' => HRD::where('users_id',auth()->user()->id)->first()->id,
                'tanggal' => date('Y-m-d'),
                'pembayaran_bulan'=> $bulanBayar,
                'total' => $value->premi,
                'bukti_transfer' => $bukti_transfer_file,
                'status_pembayaran'=> 'Menunggu Konfirmasi',
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }

        
        return redirect()->route('admin.payment')->with('status', 'Pembayaran Berhasil disubmit, Silahkan Tunggu Konfirmasi Dari Admin PasarPolis!');

    }

}

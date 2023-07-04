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
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanKlaimController extends Controller
{
    public function index()
    {
        $data['data'] = RequestClaim::get();
        return view('laporan-claim.index',$data);
    }
    public function print(Request $request)
    {
        $request->validate([
            'periode_awal' => 'required',
            'periode_akhir' => 'required',
        ]);
        $data['data'] = RequestClaim::whereBetween('tanggal', [$request->periode_awal, $request->periode_akhir])->get();
        $data['datacount'] = RequestClaim::whereBetween('tanggal', [$request->periode_awal, $request->periode_akhir])->count();
        $data['date_awal'] = $request->periode_awal;
        $data['date_akhir'] = $request->periode_akhir;

        $pdf = Pdf::loadView('laporan-claim.print',$data);
        return $pdf->stream('laporan.pdf');
    }
}
<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\HRD;

class HomesController extends Controller
{
    public function index()
    {
        return view('website.home.index');
    }

    public function productKami()
    {
        return view('website.product_kami.index');
    }

    public function tentang()
    {
        return view('website.tentang_kami.index');
    }

    public function caraKlaim()
    {
        return view('website.cara_klaim.index');
    }

    public function Faq()
    {
        return view('website.faq.index');
    }
}

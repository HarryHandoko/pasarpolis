@extends('layout.home')
@section('content')
    @php
        $dataUser = App\Models\HRD::where('users_id',auth()->user()->id)->first();
        $role = App\Models\Role::where('id',auth()->user()->role_id)->first();
    @endphp
    <h4 class="text-warning p-2"><b>Pembayaran Polis</b></h4>
    <div class="col-12">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 class="text-warning"><b>Info Asuransi</b></h4>
                    </div>
                    <div class="card-body pt-2">
                        <div class="row">
                            <div class="col text-center">
                                <img class="rounded-circle" src="{{asset('assets/image/logo.jpg')}}" alt="avatar" height="120" width="120">
                                <h3 style="color:black" class="mb-0 mt-1">
                                   <b>{{ $dataUser->office_name }}</b>
                                </h3>
                                <p class="mt-0">{{ $dataUser->office_type }}</p>
                            </div>
                            <div class="col">
                                <h5  class="mb-0">
                                   Total Premi
                                </h5>
                                <h3 style="color:black" class="mb-2">
                                   <b>
                                    Rp. {{ number_format($totalPremis) }}
                                   </b>
                                </h3>
                                <h5>
                                   Total Pegawai Asuransi
                                </h5>
                                <h3 style="color:black" class="mb-0">
                                    <b>{{ number_format($totalEmp) }}</b> Jiwa
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 class="text-warning"><b>Info Karyawan</b></h4>
                    </div>
                    <div class="card-body pt-2">
                        <div class="row">
                            <div class="col">
                                Karyawan Sudah Bayar <br>
                                <h4 style="color:black"><b>{{number_format($totalSudahDibayar)}} Jiwa</b></h4>
                            </div>
                            <div class="col">
                                Karyawan Aktif <br>
                                <h4 style="color:black"><b>{{number_format($TotalAktif)}} Jiwa</b></h4>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col">
                                Karyawan Belum Dibayar <br>
                                <h4 style="color:black"><b>{{number_format($TotalBelumBayar)}} Jiwa</b></h4>
                            </div>
                            <div class="col">
                                Karyawan Non-Aktif <br>
                                <h4 style="color:black"><b>{{number_format($NonAktif)}} Jiwa</b></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection

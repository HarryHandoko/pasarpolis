@extends('layout.home')
@section('content')
    @php
        $dataUser = App\Models\Employee::where('users_id',auth()->user()->id)->first();
        $role = App\Models\Role::where('id',auth()->user()->role_id)->first();
    @endphp
    <h4 class="text-warning p-2"><b>Info Dasar</b></h4>
    <div class="col-12">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header border-bottom">
                      <h4 class="text-warning"><b>Info Peserta Asuransi</b></h4>
                    </div>
                    <div class="card-body pt-2">
                        <div class="row">
                            <div class="col text-center">
                                <img class="rounded-circle" src="{{asset('assets/image/logo.jpg')}}" alt="avatar" height="120" width="120">
                                <h4 class="mt-1 font-weight-bold" style="color:black"><b>{{ $dataUser->name }}</b></h4>
                                <h5>{{ $dataUser->jabatan }}</h5>
                            </div>
                            <div class="col">
                                <h5>
                                    Peserta Asuransi
                                </h5>
                                <h3 style="color:black" class="mb-0">
                                   <b>{{ $dataUser->hrd->office_name }}</b>
                                </h3>
                                <p class="mt-0">{{ $dataUser->hrd->office_type }}</p>
                                <h5>
                                    No. Asuransi
                                </h5>
                                <h4 style="color:black" class="mb-0">
                                    <b>{{$dataUser->no_polis}}</b>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card">
                    <div class="card-header border-bottom">
                      <h4 class="text-warning"><b>Info Asuransi</b></h4>
                    </div>
                    <div class="card-body pt-2">
                        <div class="row">
                            <div class="col-4 text-center">
                                <h5>
                                    Jenis Asuransi
                                </h5>
                                <h4 class="mt-1 font-weight-bold" style="color:black"><b>{{ $dataUser->empProduct->product->name }}</b></h4>
                            </div>
                            <div class="col">
                                <div class="row">
                                    @foreach (\App\Models\ProductBenefit::where('products_id',$dataUser->empProduct->product->id)->get() as $item_benefit)
                                        <div class="col-6">
                                            <i class="{{ $item_benefit->logo }}" style="font-size:24px;"></i>
                                            <b>{{$item_benefit->name}}</b><br>
                                            <b><p style="color:green">Rp. {{number_format($item_benefit->jumlah_biaya)}}</p></b>
                                        </div>
                                     @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
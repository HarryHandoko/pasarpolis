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
                                   Total Karyawan Terasuransi
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
                  <div class="card p-2">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tagihan</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Riwayat Tagihan</a>
                        </li>
                      </ul>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            @if ($errors->any())
                                <div class="alert alert-danger pt-1" role="alert">
                                    <h6 class="pl-1 text-danger"> <b>Error</b>, Silahkan Cek inputan anda</h6>
                                    <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="card-datatable table-responsive pt-0 mt-0">
                                <table class="table  table-striped myTable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Karyawan</th>
                                            <th>Asuransi</th>
                                            <th>Premi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody-light">
                                        @foreach ($list as $key => $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->product }}</td>
                                                <td>Rp. {{ number_format($item->premi) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <form action="{{ route('admin.payment.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-1">
                                    <div class="col-12">
                                        <label for="total">Total Rp.</label>
                                        <input type="hidden"  id="total" name="total" value="{{ $totalPremi }}">
                                        <input type="text" readonly class="form-control" value="Rp. {{ number_format($totalPremi) }}" autocomplete="false" placeholder="Total Rp." required>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col">
                                        <div class="alert alert-warning p-1" role="alert">
                                            <b>Cara Pembayaran</b>
                                            <ul>
                                            <li>Lakukan Pembayaran Melalui Transfer Bank Pada Akun Bank Kami <b>51623817321 A/N Pasar Polis (BCA)</b></li>
                                            <li>Upload Bukti Transfer Pada Form dibawah</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-12">
                                        <label for="bukti_transfer">Bukti Pembayaran</label>
                                        <div class="input-group ">
                                            <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="bukti_transfer" name="bukti_transfer" accept="image/png, image/gif, image/jpeg">
                                            <label class="custom-file-label" for="bukti_transfer">Pilih file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row  mt-1">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-warning w-100">Warning</button>
                                    </div>
                                </div>
                            </form>
                        </div>


                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="card-datatable table-responsive pt-0 mt-0">
                                <table class="table  table-striped myTables">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th style="min-width:150px">Pembayaran Bulan</th>
                                            <th style="min-width:150px">Total</th>
                                            <th style="min-width:150px">Tanggal</th>
                                            <th style="min-width:150px">Bukti Transfer</th>
                                            <th style="min-width:150px">Status Pembayaran</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody-light">
                                        @foreach ($riwayat as $key => $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ date('F',strtotime('2023-'.$item->pembayaran_bulan.'-01')) }}</td>
                                                <td>Rp. {{ number_format($item->totals) }}</td>
                                                <td>{{ date('d F Y',strtotime($item->tanggal)) }}</td>
                                                <td><img style="width:50px;" class="zoom" height="auto" src="{{ $item->bukti_transfer }}" alt="{{ date('F',strtotime('2023-'.$item->pembayaran_bulan.'-01')) }}"></td>
                                                <td>{{ $item->status_pembayaran }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                      </div>
                  </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready( function () {
            var table = $('.myTable').DataTable({});
        } );
        $(document).ready( function () {
            var table = $('.myTables').DataTable({});
        } );
    </script>

    @if (session('status'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text:  '{{ session("status") }}',
        })
    </script>
    @endif
        
@endpush

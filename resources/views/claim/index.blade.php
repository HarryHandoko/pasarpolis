@extends('layout.home')
@section('content')
    <h2 class="text-warning p-2"><b>Request Claim</b></h2>
    <div class="col-12">
        <div class="card p-2" style="border-radius:20px">
            <div class="row">
                <div class="col-12 text-center">
                    <h3><b>Form Klaim Asuransi</b></h3>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    @if ($errors->any())
                        <div class="alert alert-danger p-1" role="alert">
                            <h6 class="pl-1 text-danger"> <b>Error</b>, Silahkan Cek inputan anda</h6>
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('admin.form-claim.store') }}" method="post"  enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="bank">Bank</label>
                                <select name="bank" id="bank" class="form-control" required>
                                    <option @if(old('bank') == 'BCA') selected @endif value="BCA">BCA</option>
                                    <option @if(old('bank') == 'Mandiri') selected @endif value="Mandiri">Mandiri</option>
                                    <option @if(old('bank') == 'BNI') selected @endif value="BNI">BNI</option>
                                    <option @if(old('bank') == 'BSI') selected @endif value="BSI">BSI</option>
                                    <option @if(old('bank') == 'BRI') selected @endif value="BRI">BRI</option>
                                    <option @if(old('bank') == 'BTN') selected @endif value="BCA">BCA</option>
                                    <option @if(old('bank') == 'BTPN') selected @endif value="BTPN">BTPN</option>
                                    <option @if(old('bank') == 'SeaBank') selected @endif value="SeaBank">SeaBank</option>
                                    <option @if(old('bank') == 'MayBank') selected @endif value="MayBank">MayBank</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="no_rekening">No. Rekening</label>
                                <input type="text" class="form-control" id="no_rekening" name="no_rekening" value="{{ old('no_rekening') }}" autocomplete="false" placeholder="No. Rekening" required>
                            </div>
                            <div class="col">
                                <label for="name_bank">Nama Akun Bank</label>
                                <input type="text" class="form-control" id="name_bank" name="name_bank" value="{{ old('name_bank') }}" autocomplete="false" placeholder="Nama Akun Bank" required>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col">
                                <label for="jumlah_claim">Jumlah Klaim Rp.</label>
                                <input type="text" class="form-control" id="jumlah_claim" name="jumlah_claim" value="{{ old('jumlah_claim') }}" autocomplete="false" placeholder="Jumlah Klaim Rp." required>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col">
                                <label>Upload Kwitansi</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="kwitansi" accept="application/pdf">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col">
                                <h4 class="text-warning"><b>Jenis Klaim</b></h4>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <input type="hidden" value="" id="benefit_id" name="product_profit_id">
                                    @foreach (\App\Models\ProductBenefit::where('products_id',\App\Models\Employee::where('users_id',auth()->user()->id)->first()->empProduct->products_id)->get() as $item_benefit)
                                    <div class="col-3">
                                       <div class="card border shadow-lg p-1 benefit" style="cursor:pointer" id="{{$item_benefit->id}}" onclick="chooseBenefit({{$item_benefit->id}})">
                                            <i class="{{ $item_benefit->logo }}" style="font-size:34px;"></i>
                                            <b>{{$item_benefit->name}}</b>
                                            <b>
                                                <p style="color:green" class="mb-0">Biaya Penangangan : <br>Rp. {{number_format($item_benefit->jumlah_biaya)}}</p>
                                                <font style="color:red" class="mt-0">Limit tersisa Rp. {{number_format( $item_benefit->jumlah_biaya - (App\Models\RequestClaim::where('employee_id',App\Models\Employee::where('users_id',auth()->user()->id)->first()->id)->where('product_profit_id',$item_benefit->id)->where('status','Approve')->count() > 0 ? App\Models\RequestClaim::where('employee_id',App\Models\Employee::where('users_id',auth()->user()->id)->first()->id)->where('product_profit_id',$item_benefit->id)->where('status','Approve')->first()->jumlah_claim : 0))}}</font>
                                            </b>
                                       </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
    
                        <div class="row justify-content-end">
                            <div class="col-3 text-right mt-2">
                                <button type="submit" class="btn btn-warning w-100 rounded-pill">Klaim</button>   
                            </div>    
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card p-2" style="border-radius:20px">
            <h4>Tracking Claim Anda</h4>
            
            <div class="card-datatable table-responsive pt-0 mt-0">
                <table class="table mt-2 table-striped" id="myTable">
                <thead>
                        <tr>
                            <th>#</th>
                            <th style="min-width:250px">Akun Bank</th>
                            <th style="min-width:250px">Nama Claim Benefit</th>
                            <th style="min-width:250px">Tanggal Request</th>
                            <th style="min-width:250px">Jumlah Claim</th>
                            <th style="min-width:150px">Kwitansi</th>
                            <th style="min-width:250px">Status Claim Anda</th>
                            <th>Action</th>
                        </tr>
                </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->no_rekening }} / {{ $item->name_bank }} ({{ $item->bank }})</td>
                                <td>{{ $item->productBenefit->name }}</td>
                                <td>{{ date('d F Y',strtotime($item->tanggal)) }}</td>
                                <td>Rp. {{ number_format($item->jumlah_claim) }}</td>
                                <td><button class="btn btn-warning" onclick="viewKwitansi('{{ $item->kwitansi }}')" data-toggle="modal" data-target="#staticBackdrop">View Kwitnasi</button></td>
                                <td>{{ $item->status }}</td>
                                <td><button class="btn btn-warning">Detail</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Kwitansi</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <iframe id="kwitansi_view" width="100%" height="600" style="visibility:visible" src=""></iframe>
            </div>
          </div>
        </div>
      </div>
@endsection
@push('js')

<script>
    function chooseBenefit(id) {
        $('.benefit').removeClass('bg-warning');
        $('#'+id).addClass('bg-warning');

        
        $('#benefit_id').val(id);
    }

    function viewKwitansi(url) {
        $('#kwitansi_view').attr('src',url);
    }
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


@if (session('gagal'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text:  '{{ session("gagal") }}',
        })
    </script>
@endif

<script>
    $(document).ready( function () {
        var table = $('#myTable').DataTable({ });
    } );
</script>
@endpush
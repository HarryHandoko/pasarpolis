@extends('layout.home')
@section('content')

<div class="card p-2">
    <h4>Form Karyawan</h4>
    <hr>

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

    @if ($data != null)
        <form action="{{ route('admin.employee.update',$data->id) }}" method="post">
        @method('put')
    @else
        <form action="{{ route('admin.employee.store') }}" method="post">
    @endif
        @csrf
        @if (auth()->user()->role_id == '1')
        <div class="row mb-1">
            <div class="col-6">
                <label for="hrd_id">Kantor</label>
                <select name="hrd_id" id="hrd_id" class="form-control" required>
                    @foreach ($hrd as $item)
                        <option @if($data == null) @if(old('hrd_id') == $item->hrd_id) selected @endif @else @if($data->hrd_id == $item->hrd_id) selected @endif @endif value="{{$item->id}}">{{$item->office_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col">
                <label for="name">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" name="name" value="@if($data == null){{ old('name') }}@else{{$data->name}}@endif" autocomplete="false" placeholder="Nama Lengkap" required>
            </div>
            <div class="col">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="@if($data == null){{ old('tanggal_lahir') }}@else{{$data->tanggal_lahir}}@endif" autocomplete="false" placeholder="Tanggal Lahir" required>
            </div>
        </div>
    
        <div class="row mt-1">
            <div class="col-6">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="@if($data == null){{ old('email') }}@else{{$data->users->email}}@endif" autocomplete="false" placeholder="Email" required>
            </div>
            <div class="col-6">
                <label for="no_handphone">No Handphone</label>
                <input type="text" class="form-control" id="no_handphone" name="no_handphone" value="@if($data == null){{ old('no_handphone') }}@else{{$data->no_handphone}}@endif" autocomplete="false" placeholder="No Handphone" required>
            </div>
        </div>
    
        <div class="row mt-1">
            <div class="@if($data == null) col-6 @else col-12 @endif">
                <label for="katasandi">Password</label>
                <input type="password" class="form-control" id="katasandi" name="katasandi" value="{{ old('katasandi') }}" autocomplete="false" placeholder="Password" >
                @if($data != null)
                    <small class="mt-1"> <i>Perhatian!, Jangan diisi jika tidak ingin mengubah</i> </small>
                @endif
            </div>
            @if($data == null)
            <div class="col-6">
                <label for="confirmation_password">Password Konfirmasi</label>
                <input type="password" class="form-control" id="confirmation_password" value="{{ old('confirmation_password') }}" name="confirmation_password" autocomplete="false" placeholder="Password Konfirmasi" required>
            </div>
            @endif
        </div>

        <div class="row mt-1">
            <div class="col">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat"  class="form-control" placeholder="Alamat"  rows="3">@if($data == null){{ old('alamat') }}@else{{$data->alamat}}@endif</textarea>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <h3>Asuransi</h3>
            </div>
        </div>

        <input type="hidden" value="@if($data == null){{ old('products_id') }}@else{{$data->empProduct->products_id}}@endif" name="products_id" id="products_id">

        <div class="row mt-1">
            @foreach ($product as $item)
            <div class="col-3">
                <div class="card product  @if($data == null) @if(old('products_id') == $item->id) bg-warning @endif @else @if($data->empProduct->products_id == $item->id) bg-warning @endif @endif border-warning " id="{{$item->id}}" style="width: 20rem;color:black;cursor:pointer" onclick="selectProduct({{$item->id}})">
                    <div class="card-body">
                      <h4 class="card-title" style="color:black"><b>{{$item->name}}</b></h4>
                      @foreach (\App\Models\ProductBenefit::where('products_id',$item->id)->get() as $item_benefit)
                        <ul>
                            <li><i class="{{ $item_benefit->logo }}" style="font-size:24px;"></i>
                                <b>{{$item_benefit->name}}</b><br>
                                <b><p style="color:green">Rp. {{number_format($item_benefit->jumlah_biaya)}}</p></b>
                            </li>
                        </ul>
                      @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <hr>
        <div class="row">
            <div class="col texxt-right">
                <button type="submit" class="btn btn-warning">Simpan</button>
                <a href="{{ route('admin.admin') }}" class="btn btn-secondary" data-dismiss="modal">Batal</a>    
            </div>    
        </div>  
    </form>
      
</div>

@endsection
@push('js')

<script>
    function selectProduct(id) {
        $('#products_id').val(id);
        $('.product').addClass('border-warning');
        $('.product').removeClass('bg-warning');

        $('#'+id).removeClass('border-warning');
        $('#'+id).addClass('bg-warning');
    }
</script>
    
@endpush
@extends('layout.home')
@section('content')

<div class="card p-2">
    <h4>Form Pegawai Asuransi</h4>
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
        <form action="{{ route('admin.pegawai-asuransi.update',$data->id) }}" method="post">
        @method('put')
    @else
        <form action="{{ route('admin.pegawai-asuransi.store') }}" method="post">
    @endif
        @csrf
        <div class="row">
            <div class="col-12">
                <label for="name">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" name="name" value="@if($data == null){{ old('name') }}@else{{$data->name}}@endif" autocomplete="false" placeholder="Nama Lengkap" required>
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
    
        <hr>
        <div class="row">
            <div class="col texxt-right">
                <button type="submit" class="btn btn-warning">Simpan</button>
                <a href="{{ route('admin.pegawai-asuransi') }}" class="btn btn-secondary" data-dismiss="modal">Batal</a>    
            </div>    
        </div>  
    </form>
      
</div>

@endsection
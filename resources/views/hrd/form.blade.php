@extends('layout.home')
@section('content')

<div class="card p-2">
    <h4>Form HRD</h4>
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
        <form action="{{ route('admin.hrd.update',$data->id) }}" method="post">
        @method('put')
    @else
        <form action="{{ route('admin.hrd.store') }}" method="post">
    @endif
        @csrf
        <div class="row">
            <div class="col">
                <h3>Data Pimpinan Perusahaan</h3>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col">
                <label for="name">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" name="name" value="@if($data == null){{ old('name') }}@else{{$data->name}}@endif" autocomplete="false" placeholder="Nama Lengkap" required>
            </div>
        </div>

        <div class="row mt-1">
            <div class="col">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="@if($data == null){{ old('tanggal_lahir') }}@else{{$data->tanggal_lahir}}@endif" autocomplete="false" placeholder="Tanggal Lahir" required>
            </div>
            <div class="col">
                <label for="gender">Jenis Kelamin</label>
                <select name="gender" id="gender" class="form-control" required>
                    <option @if($data == null) @if(old('gender') == 'male') selected @endif @else @if($data->gender == 'male') selected @endif @endif value="male">Male</option>
                    <option @if($data == null) @if(old('gender') == 'female') selected @endif @else @if($data->gender == 'female') selected @endif @endif value="female">Female</option>
                </select>
            </div>
        </div>

        <div class="row mt-1">
            <div class="col">
                <label for="no_telepon">No Handphone</label>
                <input type="no_telepon" class="form-control" id="no_telepon" name="no_telepon" value="@if($data == null){{ old('no_telepon') }}@else{{$data->no_telepon}}@endif" autocomplete="false" placeholder="No Handphone" required>
            </div>
            <div class="col">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="@if($data == null){{ old('email') }}@else{{$data->users->email}}@endif" autocomplete="false" placeholder="Email" required>
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
                <h3>Data Perusahaan</h3>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-6">
                <label for="office_name">Nama Kantor</label>
                <input type="text" class="form-control" id="office_name" name="office_name" value="@if($data == null){{ old('office_name') }}@else{{$data->office_name}}@endif" autocomplete="false" placeholder="Nama Kantor" required>
            </div>
            <div class="col-6">
                <label for="office_type">Jenis Usaha</label>
                <select name="office_type" id="office_type" class="form-control" required>
                    <option @if($data == null) @if(old('office_type') == 'Pertanian') selected @endif @else @if($data->office_type == 'Pertanian') selected @endif @endif value="Pertanian">Pertanian</option>
                    <option @if($data == null) @if(old('office_type') == 'Pertambangan') selected @endif @else @if($data->office_type == 'Pertambangan') selected @endif @endif value="Pertambangan">Pertambahan</option>
                    <option @if($data == null) @if(old('office_type') == 'Jasa Teknologi/IT') selected @endif @else @if($data->office_type == 'Jasa Teknologi/IT') selected @endif @endif value="Jasa Teknologi/IT">Jasa Teknologi/IT</option>
                    <option @if($data == null) @if(old('office_type') == 'Keuangan / Finance') selected @endif @else @if($data->office_type == 'Keuangan / Finance') selected @endif @endif value="Keuangan / Finance">Keuangan / Finance</option>
                    <option @if($data == null) @if(old('office_type') == 'Konsultan') selected @endif @else @if($data->office_type == 'Konsultan') selected @endif @endif value="Konsultan">Konsultan</option>
                    <option @if($data == null) @if(old('office_type') == 'Lain-Lainnya') selected @endif @else @if($data->office_type == 'Lain-Lainnya') selected @endif @endif value="Lain-Lainnya">Lain-Lainnya</option>
                </select>
            </div>
        </div>

        <div class="row mt-1">
            <div class="col-6">
                <label for="office_phone">No Telepon Kantor</label>
                <input type="text" class="form-control" id="office_phone" name="office_phone" value="@if($data == null){{ old('office_phone') }}@else{{$data->office_phone}}@endif" autocomplete="false" placeholder="No Telepon Kantor" required>
            </div>
            <div class="col-6">
                <label for="office_email">Email kantor</label>
                <input type="text" class="form-control" id="office_email" name="office_email" value="@if($data == null){{ old('office_email') }}@else{{$data->office_email}}@endif" autocomplete="false" placeholder="Email kantor" required>
            </div>
        </div>

        <div class="row mt-1">
            <div class="col">
                <textarea name="office_address" id="office_address"  class="form-control" placeholder="Alamat Kantor"  rows="3">@if($data == null){{ old('office_address') }}@else{{$data->office_address}}@endif</textarea>
            </div>
        </div>
        
        <hr>
        <div class="row">
            <div class="col texxt-right">
                <button type="submit" class="btn btn-warning">Simpan</button>
                <a href="{{ route('admin.hrd') }}" class="btn btn-secondary" data-dismiss="modal">Batal</a>    
            </div>    
        </div>  
    </form>
      
</div>

@endsection
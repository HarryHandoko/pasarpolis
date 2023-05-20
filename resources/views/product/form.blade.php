@extends('layout.home')
@section('content')

<div class="card p-2">
    <h4>Form Product Asuransi</h4>
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
        <form action="{{ route('admin.product.update',$data->id) }}" method="post">
        @method('put')
    @else
        <form action="{{ route('admin.product.store') }}" method="post">
    @endif
        @csrf
        <div class="row">
            <div class="col-12">
                <label for="name">Nama Product</label>
                <input type="text" class="form-control" id="name" name="name" value="@if($data == null){{ old('name') }}@else{{$data->name}}@endif" autocomplete="false" placeholder="Nama Product" required>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-12">
                <label for="premi">Premi Perbulan</label>
                <input type="text" class="form-control" id="premi" name="premi" value="@if($data == null){{ old('premi') }}@else{{$data->premi}}@endif" autocomplete="false" placeholder="Premi Perbulan" required>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col">
                <label for="description">description Product</label>
                <textarea name="description" id="description"  class="form-control" placeholder="Deskripsi"  rows="3">@if($data == null){{ old('description') }}@else{{$data->description}}@endif</textarea>
            </div>
        </div>
    
        <hr>
        <div class="row">
            <div class="col texxt-right">
                <button type="submit" class="btn btn-warning">Simpan</button>
                <a href="{{ route('admin.product') }}" class="btn btn-secondary" data-dismiss="modal">Batal</a>    
            </div>    
        </div>  
    </form>
      
</div>

@endsection
@extends('layout.home')
@section('content')

<div class="card p-2">
    <h4>Form Benefit Asuransi</h4>
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
        <form action="{{ route('admin.product_benefit.update',$data->id) }}" method="post"  enctype="multipart/form-data">
        @method('put')
    @else
        <form action="{{ route('admin.product_benefit.store') }}" method="post" enctype="multipart/form-data">
    @endif
        @csrf
        <input type="hidden" name="products_id" value="{{ $product_id }}">
        <div class="row">
            <div class="col-12">
                <label for="name">Nama Benefit</label>
                <input type="text" class="form-control" id="name" name="name" value="@if($data == null){{ old('name') }}@else{{$data->name}}@endif" autocomplete="false" placeholder="Nama Product" required>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-12">
                <label for="jumlah_biaya">Jumlah Biaya Penanganan</label>
                <input type="text" class="form-control" id="jumlah_biaya" name="jumlah_biaya" value="@if($data == null){{ old('jumlah_biaya') }}@else{{$data->jumlah_biaya}}@endif" autocomplete="false" placeholder="Jumlah Biaya Penanganan" required>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-12">
                <label for="logo">Logo</label>
                <input type="text" class="form-control" id="logo" name="logo" value="@if($data == null){{ old('logo') }}@else{{$data->logo}}@endif" autocomplete="false" placeholder="Logo" required>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col">
                <label for="description">description Product</label>
                <textarea name="description" id="description"  class="form-control" placeholder="Deskripsi"  rows="3">@if($data == null){{ old('description') }}@else{{$data->description}}@endif</textarea>
            </div>
        </div>

        <div class="col-12 mb-2 mt-2 p-0">
            <div class="border rounded p-2">
                <h4 class="mb-1">Logo</h4>
                <div class="media flex-column flex-md-row">
                    <img src="@if($data == null){{asset('assets/image/logo.jpg')}}@else{{$data->image}}@endif" id="blog-feature-image" class="rounded mr-2 mb-1 mb-md-0" width="170" height="170" alt="Blog Featured Image" />
                    <div class="media-body">
                        <div class="d-inline-block">
                            <div class="form-group mb-0">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image" id="blogCustomFile" accept="image/*" />
                                    <label class="custom-file-label" for="blogCustomFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
        <hr>
        <div class="row">
            <div class="col texxt-right">
                <button type="submit" class="btn btn-warning">Simpan</button>
                <a href="{{ route('admin.product_benefit',$product_id) }}" class="btn btn-secondary" data-dismiss="modal">Batal</a>    
            </div>    
        </div>  
    </form>
      
</div>

@endsection
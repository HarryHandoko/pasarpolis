@extends('layout.home')
@section('content')
    <div class="card bg-white pt-2 pb-2">
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
        <div class="row">
            <div class="col pl-3">
                <h3><b>Laporan Klaim</b></h3>
            </div>
        </div>
        <form action="{{ route('admin.laporan_klaim.print') }}" method="post">
            @csrf
            <div class="row p-2">
                <div class="col">
                    <input type="date" class="form-control" placeholder="Periode Awal" name="periode_awal" required>
                </div>
                <div class="col">
                    <input type="date" class="form-control" placeholder="Periode Akhir" name="periode_akhir" required>
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-warning w-100"> <i data-feather="printer"></i> Print</button>
                </div>
            </div>
        </form>
    </div>


@endsection


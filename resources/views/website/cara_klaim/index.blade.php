@extends('website.layout.index')
@section('content')

   <div class="container mb-5">
    <div class="row">
      <div class="col-12 text-center" >
        <p class="text-warning mt-5 mb-0" style="font-family:'Mulish', sans-serif;font-weight:1000;font-size:40px"><b>Cara Klaim <br>Benefit Asuransi</b></p>
  
        <p class="text-justify text-center mt-3" style="font-size:15pt">
          Anda bisa langsung mengajukan klaim melalui Website Kami
        </p>
      </div>
      <div class="col">
        <img src="{{asset('assets/image/claim-banner.png')}}" class="w-100" width="auto" alt="image-1">
      </div>
    </div>
  </div>

  <div class="container mt-4 mb-5">
    <div class="row">
      <div class="col text-center">
        <h3 style="font-family:'Mulish', sans-serif;" class="text-warning">Langkah Mudah Untuk Klaim</h3>
      </div>
      <div class="col-12">
        <div class="row">
          <div class="col-6 col-xl-3 col-lg-3 col-md-3 text-center text-muted">
            <img src="{{ asset('assets/image/step1.png') }}" alt="step1">
            <br>
            <p  style="font-family:Arial, Helvetica, sans-serif;font-size:15pt">Login dengan nomor telepon Anda</p>
          </div>
          <div class="col-6 col-xl-3 col-lg-3 col-md-3 text-center text-muted">
            <img src="{{ asset('assets/image/step2.png') }}" alt="step1">
            <br>
            <p  style="font-family:Arial, Helvetica, sans-serif;font-size:15pt">Pilih benefit yang ingin diklaim</p>
          </div>
          <div class="col-6 col-xl-3 col-lg-3 col-md-3 text-center text-muted">
            <img src="{{ asset('assets/image/step3.png') }}" alt="step1">
            <br>
            <p  style="font-family:Arial, Helvetica, sans-serif;font-size:15pt">Unggah dokumen</p>
          </div>
          <div class="col-6 col-xl-3 col-lg-3 col-md-3 text-center text-muted">
            <img src="{{ asset('assets/image/step4.png') }}" alt="step1">
            <br>
            <p  style="font-family:Arial, Helvetica, sans-serif;font-size:15pt">Claim akan segera diverifikasi</p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
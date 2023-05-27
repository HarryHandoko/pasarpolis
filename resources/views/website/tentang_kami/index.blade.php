@extends('website.layout.index')
@section('content')

   <div class="container mb-5">
    <div class="row">
      <div class="col" >
        <p class="text-warning mt-5 mb-0" style="font-family:'Mulish', sans-serif;font-weight:1000;font-size:40px"><b>Tentang Kami</b></p>
  
        <p class="text-justify mt-3" style="font-size:15pt">
          PasarPolis hadir di Indonesia sejak tahun 2015 untuk merevolusi asuransi yang selama ini ribet, dengan memanfaatkan teknologi terkini untuk memudahkan dan mempercepat semua proses layanan pelanggan PasarPolis dari awal hingga klaim. Teknologi PasarPolis memastikan semua pengalaman Anda melakukan transaksi di PasarPolis aman, cepat, dan tepat sasaran.
        </p>
      </div>
      <div class="col">
        <img src="{{asset('assets/image/tentang_kami1.png')}}" height="550" width="auto" alt="image-1">
      </div>
    </div>
  </div>

@endsection
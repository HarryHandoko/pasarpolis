@extends('website.layout.index')
@section('content')

<div class="container mb-5">
  <div class="row">
    <div class="col-12 text-center" >
      <p class="text-warning mt-5 mb-0" style="font-family:'Mulish', sans-serif;font-weight:1000;font-size:40px"><b>Produk Kami</b></p>

    </div>
    <div class="col">
      <img src="{{asset('assets/image/claim-banner.png')}}" class="w-100" width="auto" alt="image-1">
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col text-right">
      <button class="btn btn-warning rounded-pill w-50" id="tab-employeeBenefit" onclick="ChangeTab('employeeBenefit','hrportal')"><b>Employee Benefit</b></button>
    </div>
    <div class="col text-left">
      <button class="btn  rounded-pill w-50" id="tab-hrportal" onclick="ChangeTab('hrportal','employeeBenefit')"><b>HR Portal</b></button>
    </div>
  </div>

  <div class="row mt-5" id="employeeBenefit">
    <div class="col-12 text-center">
      <h3 style="font-family:'Mulish', sans-serif;"><b>Pilih plan yang sesuai kebutuhan</b></h3>
      <p>Pilih plan asuransi berdasarkan rekomendasi dari para ahli kami.<br>Proses pembelian cepat dan registrasi mudah!</p>
    </div>
    @foreach (\App\Models\Product::get() as $item)
      <div class="col-4 mt-5">
        <div class="card shadow border-0" style="border-radius:20px;min-height: 800px;">
          <div class="card-header text-center bg-warning" style="border-radius:20px">
            <h3 style="font-family:'Mulish', sans-serif;color:black"><b>{{ $item->name }}</b></h3>
          </div>
          <div class="card-body text-center">
            <p>Perlindungan harga ekonomis dengan banyak manfaat.</p>
            <p>Manfaat:</p>
              @foreach (\App\Models\ProductBenefit::where('products_id',$item->id)->get() as $item_benefit)
                <p>
                  <i class="{{ $item_benefit->logo }}" style="font-size:40px"></i><br>
                  <b>{{ $item_benefit->name }}</b>
                </p>
                <p>Maksimal limit</p>
                <p class="text-success">Rp. {{ number_format($item_benefit->jumlah_biaya) }} / pertahun</p>
              @endforeach
            <hr>
          </div>
          <div class="card-footer" style="border-radius:20px;">
            <p class="mb-0"><b>Mulai dari</b></p>
            <h4>Rp. {{ number_format($item->premi) }} / Bln</h4>
          </div>
       </div>
      </div>
    @endforeach
  </div>

  
  <div class="row mt-5 d-none" id="hrportal">
    <div class="col-12 text-center">
      <h3 style="font-family:'Mulish', sans-serif;"><b>HR Portal</b></h3>
      <p>HR Portal, Memberikan kemudahan Melalui Teknologi Digital, <br> Nikmati kemudahan mengelola manfaat dan tanggungan asuransi karyawan berbasis digital.</p>
    </div>
    <div class="row">
      <div class="col">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="https://storage.googleapis.com/pp_img/employee-benefit/laptop-add-remove-employee@2x.png" class="d-block w-100" alt="https://storage.googleapis.com/pp_img/employee-benefit/laptop-add-remove-employee@2x.png">
            </div>
            <div class="carousel-item">
              <img src="https://storage.googleapis.com/pp_img/employee-benefit/laptop-add-remove-employee@2x.png" class="d-block w-100" alt="https://storage.googleapis.com/pp_img/employee-benefit/laptop-add-remove-employee@2x.png">
            </div>
            <div class="carousel-item">
              <img src="https://storage.googleapis.com/pp_img/employee-benefit/laptop-add-remove-employee@2x.png" class="d-block w-100" alt="https://storage.googleapis.com/pp_img/employee-benefit/laptop-add-remove-employee@2x.png">
            </div>
          </div>
         <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection
@push('js')

<script>
  function ChangeTab(tab,current) {
    $('#tab-'+tab).addClass('btn-warning');

    $('#tab-'+current).removeClass('btn-warning');

    
    $('#'+current).addClass('d-none');
    $('#'+tab).addClass('show');
    $('#'+tab).removeClass('d-none');
  }
</script>
    
@endpush
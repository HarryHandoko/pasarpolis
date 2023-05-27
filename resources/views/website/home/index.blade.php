@extends('website.layout.index')
@section('content')
<div class="container mb-5">
  <div class="row">
    <div class="col" >
      <p class="mt-5 mb-0" style="font-family:'Mulish', sans-serif;font-weight:1000;font-size:40px"><b>Asuransi</b></p>
      <p class="text-warning mt-0 mb-0" style="font-family:'Mulish', sans-serif;font-weight:1000;font-size:40px"><b>Karyawan dengan</b></p>
      <p class=" mt-0" style="font-family:'Mulish', sans-serif;font-weight:1000;font-size:40px"><b>Harga Idaman</b></p>

      <p class="text-justify">
        PasarPolis Employee Benefit, hadir untuk memberikan rasa aman untuk karyawan anda secara praktis dan transparan dengan harga terjangkau.
      </p>

      <a href="{{ route('tentang') }}" class="btn btn-warning w-50" style="border-radius:20px"><b>Get Started</b></a>

    </div>
    <div class="col">
      <img src="{{asset('assets/image/home1.png')}}" height="550" width="auto" alt="image-1">
    </div>
  </div>
</div>

<div class="container mt-5">
  <div class="row">
    <div class="col-12 text-center">
        <h4 class="text-warning" style="font-family:'Mulish', sans-serif"><b>Keuntungan Yang Akan Anda Dapatkan</b></h4>
    </div>
    <div class="col mt-4">
      <div class="card p-5 shadow shadow-md" style="border-radius:20px">
        <div class="row">

          <div class="col" style="border-right:1px solid orange">
            <span class="p-1 pb-2 rounded-circle bg-warning">
              <i data-feather="smartphone"></i>
            </span>
            <h5 class="mt-3"><b>Akses Yang Mudah</b></h5>
            <p>Proses yang mudah dengan menggunakan satu aplikasi</p>
          </div>

          <div class="col"  style="border-right:1px solid orange">
            <span class="p-1 pb-2 rounded-circle bg-warning">
              <i data-feather="dollar-sign"></i>
            </span>
            <h5 class="mt-3"><b>Terjangkau</b></h5>
            <p>Temukan asuransi yang dibutuhkan sesuai bisnis anda dengan harga yang terjangkau</p>
          </div>

          <div class="col">
            <span class="p-1 pb-2 rounded-circle bg-warning">
              <i data-feather="table"></i>
            </span>
            <h5 class="mt-3"><b>Banyak Pilihan Asuransi</b></h5>
            <p>Berbagai pilihan asuransi yang sudah terpercaya untuk masyarakat umum</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container mt-5">
  <div class="row justify-center-content">
    <div class="col-12 text-center">
        <h4 class="text-warning" style="font-family:'Mulish', sans-serif"><b>Produk</b></h4>
    </div>

    <div class="col">
      <img src="{{ asset('assets/image/employee_portal.png') }}" alt="employee_portal" width="500" height="auto">
    </div>
    <div class="col">
      <img src="{{ asset('assets/image/hrportal.png') }}" alt="hrportal" width="500" height="auto">
    </div>
  </div>
</div>


<div class="container mt-5">
  <div class="row">
    <div class="col-12 text-center">
        <h4 class="text-warning" style="font-family:'Mulish', sans-serif"><b>Detail Asuransi</b></h4>
    </div>
    <div class="col">
      <section>
        <div class="swiper mySwiper container mt-5" style="font-family:'Mulish', sans-serif">
          <div class="swiper-wrapper content">

            <div class="swiper-slide card p-4">
              <div class="card-content text-center">
                <img src="{{ asset('assets/image/rawatinap.png') }}" alt="Rawat Inap">
                <p style="color:gray">Mendapatkan pelayanan perawatan Kelas I selama di Rumah Sakit.</p>
                <h6><b>Dapatkan pelayanan perawatan hingga Rp. 10.000.000</b></h6>
              </div>
            </div>

            <div class="swiper-slide card p-4">
              <div class="card-content text-center">
                <img src="{{ asset('assets/image/rawatinap.png') }}" alt="Rawat Inap">
                <p style="color:gray">Mendapatkan pelayanan perawatan Kelas I selama di Rumah Sakit.</p>
                <h6><b>Dapatkan pelayanan perawatan hingga Rp. 10.000.000</b></h6>
              </div>
            </div>

            <div class="swiper-slide card p-4">
              <div class="card-content text-center">
                <img src="{{ asset('assets/image/rawatinap.png') }}" alt="Rawat Inap">
                <p style="color:gray">Mendapatkan pelayanan perawatan Kelas I selama di Rumah Sakit.</p>
                <h6><b>Dapatkan pelayanan perawatan hingga Rp. 10.000.000</b></h6>
              </div>
            </div>

            <div class="swiper-slide card p-4">
              <div class="card-content text-center">
                <img src="{{ asset('assets/image/rawatinap.png') }}" alt="Rawat Inap">
                <p style="color:gray">Mendapatkan pelayanan perawatan Kelas I selama di Rumah Sakit.</p>
                <h6><b>Dapatkan pelayanan perawatan hingga Rp. 10.000.000</b></h6>
              </div>
            </div>

            <div class="swiper-slide card p-4">
              <div class="card-content text-center">
                <img src="{{ asset('assets/image/rawatinap.png') }}" alt="Rawat Inap">
                <p style="color:gray">Mendapatkan pelayanan perawatan Kelas I selama di Rumah Sakit.</p>
                <h6><b>Dapatkan pelayanan perawatan hingga Rp. 10.000.000</b></h6>
              </div>
            </div>

          </div>
        </div>
        <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-pagination"></div>
      </section>
    </div>
  </div>
</div>

<div class="container mt-5">
  <div class="row">
    <div class="col-12 text-center">
        <h4 class="text-warning" style="font-family:'Mulish', sans-serif"><b>Kata Mereka Tentang Kami</b></h4>
    </div>
    <div class="col mt-5">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-12">
                      <div id="testimonial-slider" class="owl-carousel">
                          <!--  ////////////////////////////////////////////////////////  -->
                          <div class="testimonial-item equal-height style-6" style="height: 254px;">
                              <div class="col-12 p-5">
                                <p>Kami sangat terbantu dengan kehadiran pasarpolis. kami berencana melanjutkan perpanjangan asuransi.</p>
                                <h5><b>Jimmy Nov.</b></h5>
                                <h6 class="text-muted"><b>PT. Indo jaya</b></h6>
                              </div>
                          </div>
                          <!--  ////////////////////////////////////////////////////////  -->

                           <!--  ////////////////////////////////////////////////////////  -->
                          <div class="testimonial-item equal-height style-6" style="height: 254px;">
                              <div class="col-12 p-5">
                                <p>Kami sangat terbantu dengan kehadiran pasarpolis. kami berencana melanjutkan perpanjangan asuransi.</p>
                                <h5><b>Jimmy Nov.</b></h5>
                                <h6 class="text-muted"><b>PT. Indo jaya</b></h6>
                              </div>
                          </div>
                          <!--  ////////////////////////////////////////////////////////  -->

                           <!--  ////////////////////////////////////////////////////////  -->
                          <div class="testimonial-item equal-height style-6" style="height: 254px;">
                              <div class="col-12 p-5">
                                <p>Kami sangat terbantu dengan kehadiran pasarpolis. kami berencana melanjutkan perpanjangan asuransi.</p>
                                <h5><b>Jimmy Nov.</b></h5>
                                <h6 class="text-muted"><b>PT. Indo jaya</b></h6>
                              </div>
                          </div>
                          <!--  ////////////////////////////////////////////////////////  -->

                           <!--  ////////////////////////////////////////////////////////  -->
                          <div class="testimonial-item equal-height style-6" style="height: 254px;">
                              <div class="col-12 p-5">
                                <p>Kami sangat terbantu dengan kehadiran pasarpolis. kami berencana melanjutkan perpanjangan asuransi.</p>
                                <h5><b>Jimmy Nov.</b></h5>
                                <h6 class="text-muted"><b>PT. Indo jaya</b></h6>
                              </div>
                          </div>
                          <!--  ////////////////////////////////////////////////////////  -->
                      </div>
                  </div>
              </div>
              </div>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection
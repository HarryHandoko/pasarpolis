<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <link rel="apple-touch-icon" href="{{asset('assets/image/logo.jpg')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/image/logo.jpg')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,1000;1,800&display=swap');
      .owl-carousel .owl-item img {
          display: block;
          width: 17%;
          float: left;
          border: 5px solid #fff;
          border-radius: 20px;
          margin-left: 54px;
          margin-right: 35px;
          margin-top: 15px;
      }
      .testimonial-item.equal-height.style-6 {
          background-color: #eee;
          border-radius: 10px;
          margin: 10px;
      }
      .cell-right {
          text-align: center;
          margin-right: 80px;
          padding-top: 35px;
          padding-bottom: 20px;
      }
      .testimonial-name {
          font-weight: 600;
      }
      .testimonial-content.quote {
          padding: 17px 55px;
      }
      .et_right_sidebar #main-content .container:before{
          display: none;
      }
      #main-content .container {
          padding-top: 10px;
      }
      i.fa.fa-quote-left {
          padding: 0px 10px;
          color: #999;
      }
    </style>
    <title>PasarPolis</title>
  </head>
  <body class="mb-5">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-white" style="background-color:white">
        <a class="navbar-brand" href="{{ route('home') }}">
          <img src="{{asset('assets/image/logo.png')}}" height="40" width="auto" alt="{{asset('assets/image/logo.png')}}">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse ml-5" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto" >
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home') }}" style="color:orange"><b>Beranda</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('tentang') }}" style="color:orange"><b>Tentang Kami</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('product_kami') }}" style="color:orange"><b>Produk Kami</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('cara_klaim') }}" style="color:orange"><b>Cara Klaim</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('faq') }}" style="color:orange"><b>FAQ</b></a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <button class="btn btn-outline-warning my-2 my-sm-0" ><b>Sign In/Sign Up</b></button>
          </form>
        </div>
      </nav>
    </div>

    @yield('content')

    <div class="container mt-5">
      <div class="row">
        <div class="col">
          <div class="card bg-warning p-5" style="border-radius:20px">
            <div class="row">
              <div class="col">
                <img src="{{ asset('assets/image/logo.png') }}" alt="logo" height="30" width="auto">
                <p class="mt-2">PT Pasarpolis Insurance Broker KEP - 493/NB.1/2015</p>
              </div>
              <div class="col-12 col-xl-3 col-lg-3 col-md-3">
                <b>Follow Us</b>
                <p class="mt-2">
                  <span class="p-1 m-1 pb-2 rounded-circle text-light" style="background-color:black">
                    <i data-feather="facebook"></i>
                  </span>
                  <span class="p-1 m-1 pb-2 rounded-circle text-light" style="background-color:black">
                    <i data-feather="twitter"></i>
                  </span>
                  <span class="p-1 m-1 pb-2 rounded-circle text-light" style="background-color:black">
                    <i data-feather="instagram"></i>
                  </span>
                  <span class="p-1 m-1 pb-2 rounded-circle text-light" style="background-color:black">
                    <i data-feather="youtube"></i>
                  </span>
                </p>
              </div>
              <div class="col-12 col-xl-4 col-lg-4 col-md-4">
                <b>Kantor Kami</b>
                <div class="card p-3 mt-2" style="background-color:white;border-radius:20px">
                  <p><b>Indonesia</b></p>
                  <p>Gedung Tifa, 5th Floor Jl. Kuningan Barat 1, No. 26 Mampang Prapatan, Jakarta 12710</p>
                  <p class="mt-0 mb-0">P : 021 5062 8888 (One Pacific)</p>
                  <p class="mt-0 mb-0">P : 021 5049 8888 (Tifa Building)</p>
                  <p class="mt-0 mb-0">E : cs@pasarpolis.com</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col text-center mt-4">
          <h6  style="font-family:'Mulish', sans-serif"><b>PT. PasarPolis © Indonesia {{date('Y')}}. All Rights Reserved.</b></h6>
        </div>
      </div>
    </div>

  </body>
  <script src="https://unpkg.com/feather-icons"></script>
  <script>
    feather.replace()
  </script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
  <script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 3,
      spaceBetween: 30,
      slidesPerGroup: 3,
      loop: true,
      loopFillGroupWithBlank: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });

    $(document).ready(function(){
        $("#testimonial-slider").owlCarousel({
            items:2,
            itemsDesktop:[1000,2],
            itemsDesktopSmall:[980,1],
            itemsTablet:[768,1],
            pagination:true,
            autoPlay:true
        });
    });

  </script>
  @stack('js')
</html>
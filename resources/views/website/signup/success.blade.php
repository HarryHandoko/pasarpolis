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
    <div class="container mb-5">
        <nav class="navbar navbar-light" style="background-color:white">
            <a class="navbar-brand" href="#">
                <img src="{{asset('assets/image/logo.png')}}" height="40" width="auto" alt="{{asset('assets/image/logo.png')}}">
            </a>
        </nav>
    </div>

    <div class="container">
        <div class="row">
            <div class="col text-center">
                <img src="{{asset('assets/image/success.png')}}" height="360" width="auto" alt="Success">
            </div>
            <div class="col-12 text-center">
                <h6>Pendaftaran Akun anda berhasil terinput di Sistem kami,<br>Kami akan mengecek data Anda dalam waktu 1x24 jam dengan <br><br>Butuh bantuan? Silahkan hubungi kami di <br> 021 3044 8080 atau cs@pasarpolis.com</h6>
                <a href="{{ route('home') }}" class="btn btn-warning rounded-pill w-50 mt-4"><b>Kembali Keberanda</b></a>
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
  @stack('js')

</html>
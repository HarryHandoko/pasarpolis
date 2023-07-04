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

    <div class="container mt-5">
        <div class="row">
            <div class="col-8">
                <div class="card shadow p-5" style="border-radius:20px">
                    <div class="row mb-5 text-center">
                        <div class="col"><h4 style="font-family:'Mulish', sans-serif;" class="text-warning">Register Perusahaan Peserta Asuransi </h4></div>
                    </div>
                    <div class="row" id="register">
                        <div class="col">
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
                            <form action="{{ route('register') }}" method="post">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col">
                                        <h6><b>Data Pimpinan Perusahaan</b></h6>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <label for="name">Nama Lengkap</label>
                                        <input type="text" class="form-control rounded-pill" id="name" name="name" value="{{ old('name') }}" autocomplete="false" placeholder="Nama Lengkap" required>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input type="date" class="form-control rounded-pill" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" autocomplete="false" placeholder="Tanggal Lahir" required>
                                    </div>
                                    <div class="col">
                                        <label for="gender">Jenis Kelamin</label>
                                        <select name="gender" id="gender" class="form-control rounded-pill" required>
                                            <option @if(old('gender') == 'male') selected @endif value="male">Male</option>
                                            <option @if(old('gender') == 'female') selected @endif value="female">Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col">
                                        <label for="no_telepon">No Handphone</label>
                                        <input type="no_telepon" class="form-control rounded-pill" id="no_telepon" name="no_telepon" value="{{ old('no_telepon') }}" autocomplete="false" placeholder="No Handphone" required>
                                    </div>
                                    <div class="col">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control rounded-pill" id="email" name="email" value="{{ old('email') }}" autocomplete="false" placeholder="Email" required>
                                    </div>
                                </div>

                                
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label for="katasandi">Password</label>
                                        <input type="password" class="form-control rounded-pill" id="katasandi" name="katasandi" value="{{ old('katasandi') }}" autocomplete="false" placeholder="Password" >
                                    </div>
                                    <div class="col-6">
                                        <label for="confirmation_password">Password Konfirmasi</label>
                                        <input type="password" class="form-control rounded-pill" id="confirmation_password" value="{{ old('confirmation_password') }}" name="confirmation_password" autocomplete="false" placeholder="Password Konfirmasi" required>
                                    </div>
                                </div>
                            
                                
                                <div class="row mt-3">
                                    <div class="col">
                                        <h6><b>Data Perusahaan</b></h6>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label for="office_name">Nama Kantor</label>
                                        <input type="text" class="form-control rounded-pill" id="office_name" name="office_name" value="{{ old('office_name') }}" autocomplete="false" placeholder="Nama Kantor" required>
                                    </div>
                                    <div class="col-6">
                                        <label for="office_type">Jenis Usaha</label>
                                        <select name="office_type" id="office_type" class="form-control rounded-pill" required>
                                            <option @if(old('office_type') == 'Pertanian') selected @endif value="Pertanian">Pertanian</option>
                                            <option @if(old('office_type') == 'Pertambangan') selected @endif value="Pertambangan">Pertambahan</option>
                                            <option @if(old('office_type') == 'Jasa Teknologi/IT') selected @endif  value="Jasa Teknologi/IT">Jasa Teknologi/IT</option>
                                            <option @if(old('office_type') == 'Keuangan / Finance') selected @endif value="Keuangan / Finance">Keuangan / Finance</option>
                                            <option @if(old('office_type') == 'Konsultan') selected @endif  value="Konsultan">Konsultan</option>
                                            <option @if(old('office_type') == 'Lain-Lainnya') selected @endif value="Lain-Lainnya">Lain-Lainnya</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-6">
                                        <label for="office_phone">No Telepon Kantor</label>
                                        <input type="text" class="form-control rounded-pill" id="office_phone" name="office_phone" value="{{ old('office_phone') }}" autocomplete="false" placeholder="No Telepon Kantor" required>
                                    </div>
                                    <div class="col-6">
                                        <label for="office_email">Email kantor</label>
                                        <input type="text" class="form-control rounded-pill" id="office_email" name="office_email" value="{{ old('office_email') }}" autocomplete="false" placeholder="Email kantor" required>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col">
                                        <label for="office_address">Alamat Kantor</label>
                                        <textarea name="office_address" id="office_address"  class="form-control" placeholder="Alamat Kantor"  rows="3">{{ old('office_address') }}</textarea>
                                    </div>
                                </div>
                                
                                <hr>
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="submit" class="btn btn-warning w-50 rounded-pill"><b>Daftar</b></button>  
                                    </div>    
                                </div>  
                                <div class="col mt-3">
                                    Sudah Punya Akun? Login <a href="{{route('admin.login')}}" class="text-warning">HR Portal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="col">
                <p style="font-family:'Mulish', sans-serif" class="text-muted">
                    Daftarkan perusahaan Anda untuk mengetahui lebih lanjut tentang asuransi yang diinginkan
                </p>
                <img src="{{asset('assets/image/signup.png')}}" alt="SignUP" class="w-100" height="auto">
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
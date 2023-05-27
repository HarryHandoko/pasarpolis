@extends('website.layout.index')
@section('content')

   <div class="container mb-5">
    <div class="row">
      <div class="col-12 text-center" >
        <p class="text-warning mt-5 mb-0" style="font-family:'Mulish', sans-serif;font-weight:1000;font-size:40px"><b>Kami Siap Membantu</b></p>
  
        {{-- <p class="text-justify text-center mt-3" style="font-size:15pt">
          Anda bisa langsung mengajukan klaim melalui Website Kami
        </p> --}}
      </div>
      <div class="col">
        <img src="{{asset('assets/image/faq-hero.svg')}}" class="w-100" width="auto" alt="image-1">
      </div>
    </div>
  </div>

  <div class="container mt-4 mb-5">
    <div class="row">
      <div class="col-12 col-xl-3 col-lg-3 col-md-3">
        <p class="text-warning" style="cursor:pointer;font-family:'Mulish', sans-serif;font-weight:1000;font-size:25px" onclick="ChangeTab('general','claim')" id="tab-general"><b>General</b></p>
        <p class="text-muted" style="cursor:pointer;font-family:'Mulish', sans-serif;font-weight:1000;font-size:25px" onclick="ChangeTab('claim','general')" id="tab-claim"><b>Mengajukan Klaim</b></p>
      </div>
      <div class="col">
        <div class="" id="general">
          <div id="accordion">
            <div class="card  border-0 mb-3">
              <div class="card-header bg-warning rounded-pill" id="headingOne">
                <h5 class="mb-0">
                  <button class="btn btn-link text-dark" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Kenapa saya harus membeli asuransi?
                  </button>
                </h5>
              </div>
          
              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body text-justify">
                  <p class="sc-1hffslg-2 jdSsGd">Karena tinggal di kota memiliki banyak resiko. Tahukah Anda, di Indonesia rata-rata 120 orang meninggal dunia setiap minggu karena kecelakaan jalan raya. 120 orang sama dengan jumlah penumpang pesawat jumbo jet! (<a class="source-here-link" href="https://www.republika.co.id/berita/nasional/umum/4/11/06/nem9nc-indonesia-urutan-pertama-peningkatan-kecelakaan-lalu-lintas" target="_blank" rel="noreferrer">Sumber: di sini</a>) Kita pasti takut dan cemas ketika sebuah pesawat mengalami kecelakaan, bayangkan jumlah yang sama tetapi disebabkan oleh kecelakaan jalan raya setiap minggunya! Selain itu, gaya hidup kita juga semakin beresiko terhadap berbagai macam penyakit. Makanan tinggi kolesterol dan dipenuhi berbagai bahan kimia berbahaya menyebabkan semakin tingginya resiko kita terkena berbagai penyakit berbahaya seperti jantung, kanker, gagal ginjal, diabetes, dan lainnya. Resiko ini tidak hanya menghantui orang-orang tua, tetapi semakin banyak anak muda terkena berbagai resiko penyakit akibat gaya hidup tidak sehat.</p>
                </div>
              </div>
            </div>
            <div class="card  border-0 mb-3">
              <div class="card-header bg-warning rounded-pill" id="headingTwo">
                <h5 class="mb-0">
                  <button class="btn btn-link text-dark collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Bagaimana asuransi dapat membantu?
                  </button>
                </h5>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body text-justify">
                  <div class="sc-1ugzrw0-6 cdbYSw"><p class="sc-1hffslg-2 jdSsGd">Meskipun Anda tak dapat terhindar dari resiko, Anda dapat melindungi dari kerugian finansial yang diakibatkan oleh beragam resiko dengan bantuan dari perusahaan asuransi yang ahli dalam pengelolaan resiko. Kami di Pasar Polis® sangat berharap bahwa Anda dan keluarga Anda selalu sehat dan dalam keadaan aman tentram, namun kita bersama dapat merancang rencana untuk melindungi Anda dari beragam resiko. Perusahaan asuransi mengumpulkan uang nasabah sedikit demi sedikit, disebut dengan Premi, dan membayar sejumlah uang bagi nasabah yang terkena resiko (disebut dengan Klaim).</p><br><h2 class="sc-1hffslg-3 gXPZaz">Mengapa Anda membeli asuransi?</h2><br><p class="sc-1hffslg-2 jdSsGd">Karena yang Anda beli adalah perlindungan bagi keluarga dari kehilangan finansial yang diakibatkan dari beragam resiko yang dapat menimpa. Misalnya, Anda memiliki suami/istri, dua anak yang masih di bawah umur, kredit pinjaman rumah dan kredit pinjaman kendaraan. Jika Anda meninggal beberapa tahun ke depan, berapa banyak uang yang dibutuhkan suami/istri Anda untuk membayar hutang, berbagai pengeluaran, termasuk biaya pendidikan anak-anak? Atau, bagaimana jika orang tua Anda tiba-tiba terserang stroke sehingga membutuhkan perawatan intensif di rumah? Bagaimana Anda membayarnya? Perlindungan Asuransi dapat melindungi Anda, usaha Anda dan orang-orang tercinta Anda dari kerugian finansial yang terkait dengan berbagai resiko yang mungkin datang. Banyak sekali beragam tipe asuransi yang dapat dipertimbangkan, termasuk asuransi jiwa, asuransi kesehatan, asuransi kecelakaan, asuransi kendaraan, asuransi kepemilikan rumah/properti, dan lain sebagainya.</p><br><h2 class="sc-1hffslg-3 gXPZaz">Dapatkah saya hanya mengandalkan keberuntungan agar terhindar dari resiko?</h2><br><p class="sc-1hffslg-2 jdSsGd">Kadang keberuntungan tidak selalu bersama kita, tetapi kita harus selalu dapat mengendalikan hidup kita kini dan masa depan. Kita selalu dihadapkan oleh beragam resiko setiap hari, begitu pula dengan orang-orang yang kita cintai. Mengandalkan keberuntungan untuk melindungi mereka tidaklah cukup. Setiap resiko hadir dengan beragam kerugian dan kehilangan. Resiko bukan hanya kematian. Kesulitan dan kerugian finansial kerap hadir dalam setiap resiko.</p></div>
                </div>
              </div>
            </div>
            <div class="card  border-0 mb-3">
              <div class="card-header bg-warning rounded-pill" id="headingThree">
                <h5 class="mb-0">
                  <button class="btn btn-link text-dark collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Perusahaan tempat saya bekerja sudah memberikan perlindungan. Cukupkah itu?
                  </button>
                </h5>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body text-justify">
                  <div class="sc-1ugzrw0-6 cdbYSw"><p class="sc-1hffslg-2 jdSsGd">Sebagian dari Anda mungkin cukup beruntung mendapatkan manfaat dari asuransi yang diberikan oleh kantor Anda.</p><p class="sc-1hffslg-2 jdSsGd">Tapi itu hanya terjamin selama Anda bekerja untuk perusahaan tersebut. Asuransi akan lebih murah jika dibeli di usia muda.</p><p class="sc-1hffslg-2 jdSsGd">Alangkah bijaksananya memiliki rencana asuransi untuk masa depan ketika Anda tak lagi bekerja untuk perusahaan tempat Anda bekerja sekarang.</p><p class="sc-1hffslg-2 jdSsGd">Selain itu, Anda perlu perlindungan tambahan karena sebagian besar perusahaan melindungi resiko-resiko dasar sehingga lebih baik Anda memiliki perlindungan tambahan yang lebih besar dari yang diberikan oleh perusahaan tempat Anda bekerja.</p></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="d-none" id="claim">
        <div id="accordion">
          <div class="card  border-0 mb-3">
            <div class="card-header bg-warning rounded-pill" id="headingOne">
              <h5 class="mb-0">
                <button class="btn btn-link text-dark" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Bagaimana Mengajukan Klaim Melalui PasarPolis?
                </button>
              </h5>
            </div>
        
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="card-body text-justify">
                <div class="sc-1ugzrw0-6 cdbYSw"><p class="sc-1hffslg-2 jdSsGd">Jika Anda membeli asuransi melalui PasarPolis maka pengajuan klaim sangatlah mudah dan praktis. Anda bisa melakukan klaim melalui, Poli. Selain pengajuan klaim, Poli akan membantu Anda terkait informasi polis dan status klaim Anda. Silakan klik Poli di pojok kanan bawah untuk mendapatkan bantuan dari Poli.</p></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')

<script>
  function ChangeTab(tab,current) {
    $('#tab-'+tab).addClass('text-warning');
    $('#tab-'+tab).removeClass('text-muted');

    $('#tab-'+current).removeClass('text-warning');
    $('#tab-'+current).addClass('text-muted');

    
    $('#'+current).addClass('d-none');
    $('#'+tab).addClass('show');
    $('#'+tab).removeClass('d-none');
  }
</script>
    
@endpush
@extends('users.layouts.index')
@section('title', 'Beranda - SIGISKAM')
@section('content')
<style>
    .text-justify{
        text-align: justify;
    }
</style>

    {{-- HEADER --}}
    <nav class="navbar navbar-expand-lg " style="background: linear-gradient(to right, #d9241c, #fe7000);">
        <div class="container-fluid">
            <img src="/images/logo_kampar.png" alt="Logo Kampar" class="ms-4" width="50">
            <h3 style="color: white">SIGISKAM</h3>
            <img src="/images/logo_polkam.png" alt="Logo Kampar" class="me-4" width="50">
        </div>
    </nav>
    {{-- BUTTON MODAL LOGIN DAN SEARCH --}}
    <div class="btn-group w-100" role="group">
        <a href="{{route('maps')}}" class="btn btn-success border-start-0 rounded-0">Maps</a>
        <button type="button" class="btn btn-primary border-end-0 rounded-0" data-bs-toggle="modal"
            data-bs-target="#modalLogin">Login</button>
    </div>

    <div class="container mt-2">
        <div>
            <h1>Sejarah Berdirinya BPBD Kabupaten Kampar</h1>
            <p class="text-justify">Dengan ditetapkan Peraturan Daerah (PERDA) maka penanggulangan bencana diharapkan akan semakin baik, pola penanggulangan bencana mendapatkan dimensi baru setelah dikeluarkannya Undang-Undang Nomor 24 Tahun 2007 Tentang Penanggulangan Bencana, Peraturan Kepala Badan Nasional Penanggulangan Bencana (PERKA BNPB) Nomor 3 Tahun 2008 Tentang Pedoman Pembentukan Badan Penanggulangan Bencana Daerah.</p>
            <p class="text-justify">Sejarah Lembaga Badan Penanggulangan Bencana Daerah (BPBD) terbentuk tidak terlepas dari perkembangan penanggulangan bencana pada masa kemerdekaan hingga bencana alam berupa gempa bumi dahsyat di Samudera Hindia pada abad 20. Sementara itu, perkembangan tersebut sangat dipengaruhi pada konteks situasi, cakupan dan paradigma penanggulangan bencana.</p>
            <p class="text-justify">Melihat kenyataan saat ini, berbagai bencana yang dilatarbelakangi kondisi geografis, geologis, hidrologis, dan demografis mendorong Kabupaten Kampar untuk membangun visi untuk membangun ketangguhan dalam menghadapi bencana.</p>
            <h1>Wilayah Kabupaten Kampar</h1>
            <p class="text-justify">Letak geografis dan topografi yang potensial terhadap terjadinya bencana alam dan luasnya cakupan wilayah penanganan penanggulangan kebencanaan dengan jenis potensi bencana yang beragam terdapat 8 (delapan) jenis bencana di wilayah Kabupaten Kampar, yaitu banjir, kebakaran hutan dan lahan, tanah longsor/gerakan tanah, kekeringan, epidemi dan wabah penyakit, konflik sosial, kegagalan teknologi dan angin puting beliung;</p>
            <p class="text-justify">Terjadinya anomaly cuaca sebagai dampak dari pemanasan global (global warning);</p>
            <p class="text-justify">Penanggulangan bencana merupakan urusan bersama antara pemerintah, masyarakat dan dunia usaha, namun dalam kenyataannya perhatian masyarakat</p>
            <h1>Penanggulangan Bencana</h1>
            <p class="text-justify">Menghadapi ancaman bencana tersebut, Pemerintah Indonesia berperan penting dalam membangun sistem penanggulangan bencana di tanah air. Pembentukan lembaga merupakan salah satu bagian dari sistem yang telah berproses dari waktu ke waktu.</p>
        </div>
        <div>
            <h1>Struktur Organisasi BPBD Kampar</h1>
            <div class="card">
                <img src="/images/struktur.jpeg" alt="" class="w-100 pb-5">
            </div>
        </div>
    </div>

    <footer class="mt-2 mb-2">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="fs-4 fw-bold">BPBD - Badan Penanggulangan Bencana Daerah</p>
                    <span>
                    BPBD adalah Badan Penanggulangan Bencana Daerah yang merupakan lembaga 
                    pemerintah non-departemen yang melaksanakan tugas penanggulangan 
                    bencana di daerah baik Provinsi maupun Kabupaten/Kota 
                    dengan berpedoman pada kebijakan yang ditetapkan 
                    oleh Badan Nasional Penanggulangan Bencana.
                    </span>
                    <div class="d-flex justify-content-center">
                        <div class="footer-media">
                            <a href="https://youtube.com" target="_blank"><i class="fab fa-youtube"></i></a>
                            <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook"></i></a>
                            <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.instagram.com/bpbd_kampar?igsh=eWllcnpmcTByZ2E=" target="_blank"><i class="fab fa-instagram"></i></a>
                            <a href="https://whatsapp.com" target="_blank"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <p class="fs-4 fw-bold">Butuh Bantuan?</p>
                        <div>
                        <i class="fa fa-map-marker"></i>
                        <span style="margin-left: 10px"><a href="https://maps.app.goo.gl/ZFYh18mK185a3GNz7">Langgini Kec. Bangkinang, Kab. Kampar, Riau</a></span>
                        </div>
                        <div>
                        <i class="fa fa-phone"></i>
                        <span style="margin-left: 10px"><a href="wa.me/6281266441109">+62 812-6644-1109</a></span>
                        </div>
                        <div>
                        <i class="fa fa-envelope"></i>
                        <span style="margin-left: 10px"><a href="mailto:pusdalopspbkampar@gmail.com">pusdalopspbkampar@gmail.com</a></span>
                        </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <span class="text-md fw-bold">2025 &copy; Fadilah Utami.</span>
        </div>
    </footer>


      {{-- MODAL LOGIN --}}
      <div class="modal fade" id="modalLogin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Login</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form action="{{ route('auth') }}" method="post" class="needs-validation" novalidate>
                      @csrf
                      <div class="mb-2">
                          <label for="username" class="form-label">Username</label>
                          <input type="text" class="form-control" id="username"
                              placeholder="Silahkan masukkan username anda" name="username" required>
                          <div class="invalid-feedback">
                              Silahkan masukkan username anda!
                          </div>
                      </div>
                      <div class="mb-2">
                          <label for="password" class="form-label">Password</label>
                          <input type="password" class="form-control" id="password"
                              placeholder="Silahkan masukkan password anda" name="password" required>
                          <div class="invalid-feedback">
                              Silahkan masukkan password anda!
                          </div>
                      </div>


              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary">Login</button>
              </div>
              </form>
          </div>
      </div>
  </div>
@endsection

@extends('users.layouts.index')
@section('title', 'Beranda - SIGISKAM')
@section('content')

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

    <div class="container">
        <h1>ISI KONTEN NYA SINI YA !!!</h1>
    </div>

    <footer class="mt-2 mb-2">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="">BPBD - Badan Penanggulangan Bencana Daerah</h3>
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
                    <h3>Butuh Bantuan?</h3>
                        <div>
                        <i class="fa fa-map-marker"></i>
                        <span>Langgini Kec. Bangkinang, Kab. Kampar, Riau</span>
                        </div>
                        <div>
                        <i class="fa fa-phone"></i>
                        <span>+62 812-6644-1109</span>
                        </div>
                        <div>
                        <i class="fa fa-envelope"></i>
                        <span><a href="mailto:pusdalopspbkampar@gmail.com">pusdalopspbkampar@gmail.com</a></span>
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

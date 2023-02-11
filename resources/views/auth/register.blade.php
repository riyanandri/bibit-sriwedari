@extends('layouts.auth')

@section('title')
Daftar | Bibit Sriwedari
@endsection

@section('content')
<section class="mt-0 overflow-hidden  vh-100 d-flex justify-content-center align-items-center p-4">
    <!-- Page Content Goes Here -->

    <!-- Login Form-->
    <div class="col col-md-8 col-lg-6 col-xxl-5">
        <div class="shadow-xl p-4 p-lg-5 bg-white">
            <h1 class="text-center fw-bold mb-5 fs-2">Daftar</h1>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="login-email">Email</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Nama Lengkap">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                <div class="form-group">
                  <label class="form-label" for="login-email">Email</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="login-email" name="email" value="{{ old('email') }}" placeholder="sriwedari@gmail.com">
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="login-password" class="form-label d-flex justify-content-between align-items-center">
                    Password
                  </label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" id="login-password" name="password" placeholder="Masukkan password">
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                    <label for="password-confirm" class="form-label d-flex justify-content-between align-items-center">
                      Konfirmasi Password
                    </label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password-confirm" name="password_confirmation" placeholder="Masukkan konfirmasi password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                <button type="submit" class="btn btn-dark d-block w-100 my-4">Daftar</button>
            </form>
            <p class="d-block text-center text-muted">Sudah memiliki akun? <a class="text-muted" href="{{ route('login') }}">Masuk</a></p>
        </div>

    </div>
    <!-- / Login Form-->

    <!-- /Page Content -->
</section>
@endsection
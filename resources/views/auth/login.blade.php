@extends('layouts.auth')

@section('title')
Masuk | Bibit Sriwedari
@endsection

@section('content')
<section class="mt-0 overflow-hidden  vh-100 d-flex justify-content-center align-items-center p-4">
        <!-- Page Content Goes Here -->
        <!-- Login Form-->
        <div class="col col-md-8 col-lg-6 col-xxl-5">
            <div class="shadow-xl p-4 p-lg-5 bg-white">
                <h1 class="text-center fw-bold mb-5 fs-2">Masuk</h1>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
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
                        <a href="./forgotten-password.html" class="text-muted small">Lupa password?</a>
                      </label>
                      <input type="password" class="form-control @error('password') is-invalid @enderror" id="login-password" name="password" placeholder="Masukkan password">
                      @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-dark d-block w-100 my-4">Login</button>
                </form>
                <p class="d-block text-center text-muted">Pelanggan baru? <a class="text-muted" href="{{ route('register') }}">Buat akun baru</a></p>
            </div>

        </div>
        <!-- / Login Form-->

        <!-- /Page Content -->
    </section>
@endsection
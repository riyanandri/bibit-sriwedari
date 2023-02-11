<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Bibit Sriwedari') }}</title>

  <!-- Favicon -->
  <link rel="icon" href="{{ asset('admin/img/brand/favicon.png') }}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('admin/vendor/nucleo/css/nucleo.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('admin/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
  <!-- CSS Libraries -->
  @stack('css')
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ asset('admin/css/argon.css?v=1.1.0') }}" type="text/css">
  @livewireStyles
</head>

<body>
  <!-- Sidenav -->
  @include('layouts.admin.sidebar')
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Navbar -->
    @include('layouts.admin.navbar')
    <!-- Header -->
    <!-- Header -->
    @include('layouts.admin.header')
    <!-- Page content -->
    <div class="container-fluid mt--6">
      @yield('content')
      <!-- Footer -->
      @include('layouts.admin.footer')
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{ asset('admin/vendor/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('admin/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('admin/vendor/js-cookie/js.cookie.js') }}"></script>
  <script src="{{ asset('admin/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
  <script src="{{ asset('admin/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>

  <!-- JS Libraies -->
  @stack('js')
  <!-- Argon JS -->
  <script src="{{ asset('admin/js/argon.js?v=1.1.0') }}"></script>
  @livewireScripts
</body>

</html>
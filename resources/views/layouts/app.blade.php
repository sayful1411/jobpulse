<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title> @yield('title') </title>

  <!-- Stylesheets -->
  <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">

  <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
  <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">

  <!-- Responsive -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

</head>

<body data-anm=".anm">

  <div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- Main Header-->
    @guest
      @include('partials.header')
    @endguest

    @auth
      @include('partials.dashboard-header')
    @endauth
    <!--End Main Header -->

    <!-- Main Section -->
    @yield('content')
    <!-- End Main Section -->

    <!-- Main Footer -->
    @include('partials.footer')
    <!-- End Main Footer -->


  </div><!-- End Page Wrapper -->


  <script src="{{ asset('js/jquery.js') }}"></script>
  <script src="{{ asset('js/popper.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/jquery.modal.min.js') }}"></script>
  <script src="{{ asset('js/mmenu.polyfills.js') }}"></script>
  <script src="{{ asset('js/mmenu.js') }}"></script>
  <script src="{{ asset('js/appear.js') }}"></script>
  <script src="{{ asset('js/ScrollMagic.min.js') }}"></script>
  <script src="{{ asset('js/rellax.min.js') }}"></script>
  <script src="{{ asset('js/owl.js') }}"></script>
  <script src="{{ asset('js/wow.js') }}"></script>
  <script src="{{ asset('js/script.js') }}"></script>

</body>
</html>
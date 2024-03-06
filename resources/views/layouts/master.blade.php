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
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @stack('css')

</head>

<body>

    <div class="page-wrapper dashboard">

        <!-- Preloader -->
        <div class="preloader"></div>

        <!-- Header Span -->
        <span class="header-span"></span>

        <!-- Main Header-->
        @include('partials.dashboard-header')
        <!--End Main Header -->

        <!-- Sidebar Backdrop -->
        <div class="sidebar-backdrop"></div>

        <!-- Sidebar -->
        @auth('web')
            @include('partials.candidate.sidebar-menu')
        @endauth

        @auth('company')
            @include('partials.company.sidebar-menu')
        @endauth
        <!-- End Sidebar -->

        <!-- Dashboard -->
        @yield('content')
        <!-- End Dashboard -->

        <!-- Copyright -->
        <div class="copyright-text">
            <p>© {{ date('Y') }} <a href="{{ route('home') }}">{{ config('app.name') }}</a>. All Right Reserved.</p>
        </div>

    </div><!-- End Page Wrapper -->


    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/chosen.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/mmenu.js') }}"></script>
    <script src="{{ asset('js/appear.js') }}"></script>
    <script src="{{ asset('js/rellax.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

    @stack('script')

</body>

</html>

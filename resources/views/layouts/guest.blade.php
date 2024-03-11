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

<body>

    <div class="page-wrapper">

        <!-- Preloader -->
        <div class="preloader"></div>

        <!-- Main Header-->
        <header class="main-header">
            <div class="container-fluid">
                <!-- Main box -->
                <div class="main-box">
                    <!--Nav Outer -->
                    <div class="nav-outer">
                        <div class="logo-box">
                            <div class="logo"><a href="{{ route('home') }}"><img src="{{ asset('images/logo.svg') }}"
                                        alt="" title=""></a></div>
                        </div>
                    </div>

                    <div class="outer-box">
                        <!-- Login/Register -->
                        @guest
                            <div class="btn-box">
                                <a href="{{ route('login.popup') }}"
                                    class="theme-btn -outline-dark-blue -rounded call-modal">Login / Register</a>
                            </div>
                        @endguest

                        @auth('web')
                            <div class="btn-box d-flex align-items-center">
                                <a href="{{ route('candidate.dashboard') }}"
                                    class="theme-btn -outline-dark-blue -rounded">Dashboard</a>
                                <form method="POST" action="{{ route('candidate.logout') }}">
                                    @csrf
                                    <a href="{{ route('candidate.logout') }}"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();" class="theme-btn -outline-dark-blue -rounded">Logout
                                    </a>
                                </form>
                            </div>
                        @endauth

                        @auth('company')
                            <div class="btn-box d-flex align-items-center">
                                <a href="#"
                                    class="theme-btn -outline-dark-blue -rounded">Dashboard</a>
                                {{-- <form method="POST" action="{{ route('candidate.logout') }}">
                                    @csrf
                                    <a href="{{ route('candidate.logout') }}"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();" class="theme-btn -outline-dark-blue -rounded">Logout
                                    </a>
                                </form> --}}
                            </div>
                        @endauth
                    </div>
                </div>
            </div>

            <!-- Mobile Header -->
            <div class="mobile-header">
                <div class="logo"><a href="{{ route('home') }}"><img src="{{ asset('images/logo.svg') }}"
                            alt="" title=""></a>
                </div>
            </div>

            <!-- Mobile Nav -->
            <div id="nav-mobile"></div>
        </header>
        <!--End Main Header -->

        <!-- Info Section -->
        @yield('content')
        <!-- End Info Section -->


    </div><!-- End Page Wrapper -->

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.modal.min.js') }}"></script>
    <script src="{{ asset('js/appear.js') }}"></script>
    <script src="{{ asset('js/rellax.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

    @stack('scripts')

</body>

</html>

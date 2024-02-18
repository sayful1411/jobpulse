<header class="main-header -type-17">
    <!-- Main box -->
    <div class="main-box">
        <!--Nav Outer -->
        <div class="nav-outer">
            <div class="logo-box">
                <div class="logo"><a href="{{ route('home') }}"><img src="{{ asset('images') }}/logo.svg" alt=""
                            title=""></a></div>
            </div>
        </div>

        <div class="outer-box">

            @include('partials.navbar')

            <!-- Login/Register -->
            <div class="btn-box">
                <a href="{{ route('login.popup') }}" class="theme-btn -outline-dark-blue -rounded call-modal">Login /
                    Register</a>
            </div>
        </div>
    </div>

    <!-- Mobile Header -->
    <div class="mobile-header">
        <div class="logo"><a href="{{ route('home') }}"><img src="{{ asset('images') }}/logo.svg" alt=""
                    title=""></a></div>

        <!--Nav Box-->
        <div class="nav-outer clearfix">

            <div class="outer-box">
                <!-- Login/Register -->
                <div class="login-box">
                    <a href="{{ route('login.popup') }}"
                        class="theme-btn -outline-dark-blue -rounded call-modal">Login / Register</a>
                </div>

                <a href="#nav-mobile" class="mobile-nav-toggler navbar-trigger"><span
                        class="flaticon-menu-1"></span></a>
            </div>
        </div>
    </div>

    <!-- Mobile Nav -->
    <div id="nav-mobile"></div>
</header>

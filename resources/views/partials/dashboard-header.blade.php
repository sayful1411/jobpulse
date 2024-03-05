<header class="main-header header-shadow">
    <div class="container-fluid">
        <!-- Main box -->
        <div class="main-box">
            <!--Nav Outer -->
            <div class="nav-outer">
                <div class="logo-box">
                    <div class="logo"><a href="{{ route('home') }}"><img src="{{ asset('images/logo.svg') }}"
                                alt="" title=""></a></div>
                </div>

                @include('partials.navbar')
                <!-- Main Menu End-->
            </div>

            <div class="outer-box">

                <button class="menu-btn">
                    <span class="count">1</span>
                    <span class="icon la la-heart-o"></span>
                </button>

                <button class="menu-btn">
                    <span class="icon la la-bell"></span>
                </button>

                <!-- Dashboard Option -->
                @auth('web')
                    @include('partials.candidate.dropdown-menu')
                @endauth

                @auth('company')
                    @include('partials.company.dropdown-menu')
                @endauth
            </div>
        </div>
    </div>

    <!-- Mobile Header -->
    <div class="mobile-header">
        <div class="logo"><a href="{{ route('home') }}"><img src="{{ asset('images/logo.svg') }}" alt=""
                    title=""></a>
        </div>

        <!--Nav Box-->
        <div class="nav-outer clearfix">

            <div class="outer-box">
                <!-- Login/Register -->
                <div class="login-box">
                    <a href="{{ route('login.popup') }}" class="call-modal"><span class="icon-user"></span></a>
                </div>

                <button id="toggle-user-sidebar"><img src="{{ asset('images/resource/company-6.png') }}" alt="avatar"
                        class="thumb"></button>
                <a href="#nav-mobile" class="mobile-nav-toggler navbar-trigger"><span
                        class="flaticon-menu-1"></span></a>
            </div>
        </div>

    </div>

    <!-- Mobile Nav -->
    <div id="nav-mobile"></div>
</header>

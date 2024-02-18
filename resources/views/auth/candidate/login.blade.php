@extends('layouts.guest')

@section('title', 'Candidate Login | ' . config('app.name'))

@section('content')
    <div class="login-section">
        <div class="image-layer" style="background-image: url({{ asset('images') }}/background/12.jpg);"></div>
        <div class="outer-box">

            <!-- Login Form -->
            <div class="login-form default-form">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="form-inner">
                    <h3>Login to {{ config('app.name') }}</h3>
                    <!--Login Form-->
                    <form method="post" action="#">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input id="password-field" type="password" name="password" value=""
                                placeholder="Password">
                        </div>

                        <div class="form-group">
                            <div class="field-outer">
                                <div class="input-group checkboxes square">
                                    <input type="checkbox" name="remember-me" value="" id="remember">
                                    <label for="remember" class="remember"><span class="custom-checkbox"></span>
                                        Remember me</label>
                                </div>
                                <a href="#" class="pwd">Forgot password?</a>
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="theme-btn btn-style-one" type="submit" name="log-in">Log In</button>
                        </div>
                    </form>

                    <div class="bottom-box">
                        <div class="text">Don't have an account? <a href="{{ route('candidate.register') }}">Signup</a>
                        </div>
                        <div class="divider"><span>or</span></div>
                        <div class="btn-box row">
                            <div class="col-lg-12 col-md-12">
                                <a href="#" class="theme-btn social-btn-two google-btn"><i class="fab fa-google"></i>
                                    Log In via Google</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Login Form -->
        </div>
    </div>
@endsection

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
                    <form method="post" action="{{ route('candidate.login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input class="@error('email') border border-danger @enderror" id="email" type="email"
                                name="email" placeholder="Email" value="{{ old('email') }}">
                            @error('email')
                                <div class="mt-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password"
                                name="password" placeholder="Password">
                        </div>

                        <div class="form-group">
                            <div class="field-outer">
                                <div class="input-group checkboxes square">
                                    <input type="checkbox" name="remember" value="" id="remember">
                                    <label for="remember" class="remember"><span class="custom-checkbox"></span>
                                        Remember me</label>
                                </div>
                                <a href="{{ route('candidate.forgot.password') }}" class="pwd">Forgot password?</a>
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="theme-btn btn-style-one" type="submit">Log In</button>
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

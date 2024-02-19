@extends('layouts.guest')

@section('title', 'Candidate Register | ' . config('app.name'))

@section('content')
    <div class="login-section">
        <div class="image-layer" style="background-image: url({{ asset('images') }}/background/12.jpg);"></div>
        <div class="outer-box">
            <!-- Register Form -->
            <div class="login-form default-form">
                <div class="form-inner">
                    <h3>Create a Free {{ config('app.name') }} Account</h3>

                    <!--Register Form-->
                    <form method="post" action="{{ route('candidate.register') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input class="@error('name') border border-danger @enderror" id="name" type="text" name="name"
                                placeholder="Name" value="{{ old('name') }}">
                            @error('name')
                                <div class="mt-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input class="@error('email') border border-danger @enderror" id="email" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                            @error('email')
                                <div class="mt-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input class="@error('phone') border border-danger @enderror" id="phone" type="text" name="phone" placeholder="Phone" value="{{ old('phone') }}">
                            @error('phone')
                                <div class="mt-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="@error('password') border border-danger @enderror" id="password" type="password" name="password"
                                placeholder="Password">
                            @error('password')
                                <div class="mt-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Password Confirmation</label>
                            <input class="@error('password_confirmation') border border-danger @enderror" id="password_confirmation" type="password" name="password_confirmation"
                                placeholder="Password">
                            @error('password_confirmation')
                                <div class="mt-1 text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button class="theme-btn btn-style-one " type="submit">Register</button>
                        </div>
                    </form>

                    <div class="bottom-box">
                        <div class="text">Already have an account? <a href="{{ route('candidate.login') }}">Sign In</a>
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
            <!--End Register Form -->
        </div>
    </div>
@endsection

@extends('layouts.guest')

@section('title', 'Reset Password | ' . config('app.name'))

@section('content')
    <div class="login-section">
        <div class="image-layer" style="background-image: url({{ asset('images') }}/background/12.jpg);"></div>
        <div class="outer-box">

            <!-- Login Form -->
            <div class="login-form default-form">
                <div class="form-inner">
                    <h3>Reset Password</h3>
                    <!--Login Form-->
                    <form method="post" action="{{ route('password.store') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">
                        <input type="hidden" name="guard" value="{{ $guard }}">

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input class="@error('email') border border-danger @enderror" id="email" type="email"
                                name="email" placeholder="Email" value="{{ old('email', $email) }}">
                            @error('email')
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
                            <button class="theme-btn btn-style-one" type="submit">Reset Password</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--End Login Form -->
        </div>
    </div>
@endsection

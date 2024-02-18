@extends('layouts.guest')

@section('title', 'Forgot Password | ' . config('app.name'))

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
                    <h3>Forgot Password</h3>
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
                            <button class="theme-btn btn-style-one" type="submit">Send Reset Link</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--End Login Form -->
        </div>
    </div>
@endsection

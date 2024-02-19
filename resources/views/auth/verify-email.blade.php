@extends('layouts.guest')

@section('title', 'Verify Email | ' . config('app.name'))

@section('content')
    <div class="login-section">
        <div class="image-layer" style="background-image: url({{ asset('images') }}/background/12.jpg);"></div>
        <div class="outer-box">

            <!-- Login Form -->
            <div class="login-form default-form">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ ('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif
                <div class="form-inner">
                    <h3>Email Verification</h3>
                    <!--Login Form-->
                    <form method="post" action="{{ route('verification.send') }}">
                        @csrf

                        <div class="form-group">
                            Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.
                        </div>

                        <div class="form-group">
                            <button class="theme-btn btn-style-one" type="submit">Resend Verification Email</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--End Login Form -->
        </div>
    </div>
@endsection

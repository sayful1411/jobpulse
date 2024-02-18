@extends('layouts.guest')

@section('title', "Candidate Register | " . config('app.name'))

@section('content')
    <div class="login-section">
        <div class="image-layer" style="background-image: url({{ asset('images') }}/background/12.jpg);"></div>
        <div class="outer-box">
            <!-- Register Form -->
            <div class="login-form default-form">
                <div class="form-inner">
                    <h3>Create a Free {{ config('app.name') }} Account</h3>

                    <!--Register Form-->
                    <form method="post" action="#">

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" placeholder="Name">
                        </div>

                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" placeholder="Phone">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input id="password-field" type="password" name="password" value=""
                                placeholder="Password">
                        </div>

                        <div class="form-group">
                            <label>Password Confirmation</label>
                            <input id="password-field" type="password" name="password-confirmation" value=""
                                placeholder="Password">
                        </div>

                        <div class="form-group">
                            <button class="theme-btn btn-style-one " type="submit"
                                name="Register">Register</button>
                        </div>
                    </form>

                    <div class="bottom-box">
                        <div class="text">Already have an account? <a href="{{ route('candidate.login') }}">Sign In</a></div>
                        <div class="divider"><span>or</span></div>
                        <div class="btn-box row">
                            <div class="col-lg-12 col-md-12">
                                <a href="#" class="theme-btn social-btn-two google-btn"><i
                                        class="fab fa-google"></i> Log In via Google</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Register Form -->
        </div>
    </div>
@endsection
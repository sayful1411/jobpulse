@extends('layouts.guest')

@section('title', 'Company Register | ' . config('app.name'))

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-12" style="padding: 120px 0 50px">
                <!-- Register Form -->
                <div class="login-form default-form">
                    <div class="form-inner">
                        <h3>Create a Free {{ config('app.name') }} Account</h3>

                        <!--Register Form-->
                        <form method="post" action="{{ route('company.register') }}">
                            @csrf
                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input class="@error('name') border border-danger @enderror" id="name"
                                            type="text" name="name" placeholder="Name" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="mt-1 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="email">Email Address</label>
                                        <input class="@error('email') border border-danger @enderror" id="email"
                                            type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                                        @error('email')
                                            <div class="mt-1 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="industry_type">Industry Type</label>
                                        <input class="@error('industry_type') border border-danger @enderror"
                                            id="industry_type" type="text" name="industry_type"
                                            placeholder="industry_type" value="{{ old('industry_type') }}">
                                        @error('industry_type')
                                            <div class="mt-1 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input class="@error('phone') border border-danger @enderror" id="phone"
                                            type="text" name="phone" placeholder="Phone" value="{{ old('phone') }}">
                                        @error('phone')
                                            <div class="mt-1 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="website">Website</label>
                                        <input class="@error('website') border border-danger @enderror" id="website"
                                            type="text" name="website" placeholder="Website">
                                        @error('website')
                                            <div class="mt-1 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="form-group col-lg-4 col-md-6">
                                    <label for="country">Country</label>
                                    <select class="@error('country') border border-danger @enderror" class="chosen-select"
                                        name="country" id="country">
                                        <option value="">Select Country</option>
                                        <option value="bn">Bangladesh</option>
                                    </select>
                                    @error('country')
                                        <div class="mt-1 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-lg-4 col-md-6">
                                    <label for="state">State</label>
                                    <select class="@error('state') border border-danger @enderror" class="chosen-select"
                                        name="state" id="state">
                                        <option value="">Select State</option>
                                        <option value="dhaka">Dhaka</option>
                                    </select>
                                    @error('state')
                                        <div class="mt-1 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-lg-4 col-md-6">
                                    <label for="city">City</label>
                                    <select class="@error('city') border border-danger @enderror" class="chosen-select"
                                        name="city" id="city">
                                        <option value="">Select City</option>
                                        <option value="dhaka">Dhaka</option>
                                    </select>
                                    @error('city')
                                        <div class="mt-1 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="form-group col-md-12 col-lg-6">
                                    <label for="address">Address</label>
                                    <input class="@error('address') border border-danger @enderror" type="text"
                                        id="address" placeholder="Address" name="address" value="{{ old('address') }}">
                                    @error('address')
                                        <div class="mt-1 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-12 col-lg-6">
                                    <label for="license_no">License No.</label>
                                    <input class="@error('license_no') border border-danger @enderror" type="text"
                                        id="license_no" name="license_no" placeholder="License No." value="{{ old('license_no') }}">
                                    @error('license_no')
                                        <div class="mt-1 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input class="@error('password') border border-danger @enderror" id="password"
                                            type="password" name="password" placeholder="Password">
                                        @error('password')
                                            <div class="mt-1 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Password Confirmation</label>
                                        <input class="@error('password_confirmation') border border-danger @enderror"
                                            id="password_confirmation" type="password" name="password_confirmation"
                                            placeholder="Password">
                                        @error('password_confirmation')
                                            <div class="mt-1 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <button class="theme-btn btn-style-one " type="submit">Register</button>
                            </div>
                        </form>

                        <div class="bottom-box">
                            <div class="text">Already have an account? <a href="{{ route('company.login') }}">Sign
                                    In</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Register Form -->
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        //
    </script>
@endpush

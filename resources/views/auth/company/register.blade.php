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
                                    </select>
                                    @error('country')
                                        <div class="mt-1 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-lg-4 col-md-6">
                                    <label for="state">State</label>
                                    <select class="@error('state') border border-danger @enderror" class="chosen-select"
                                        name="state" id="state">
                                    </select>
                                    @error('state')
                                        <div class="mt-1 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-lg-4 col-md-6">
                                    <label for="city">City</label>
                                    <select class="@error('city') border border-danger @enderror" class="chosen-select"
                                        name="city" id="city">
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
                                        id="license_no" name="license_no" placeholder="License No."
                                        value="{{ old('license_no') }}">
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

@push('scripts')
    <!-- Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>

    <script>
        
        $(document).ready(function() {
            $('#country').select2({
                placeholder: "Select Country",
                allowClear: true
            });

            $('#state').select2({
                placeholder: "Select State",
                allowClear: true
            });

            $('#city').select2({
                placeholder: "Select City",
                allowClear: true
            });

            var apiKey = "{{ config('app.country_state_city_api_key') }}";

            var countrySettings = {
                "url": "https://api.countrystatecity.in/v1/countries",
                "method": "GET",
                "headers": {
                    "X-CSCAPI-KEY": apiKey
                },
            };

            // get all country
            $.ajax(countrySettings).done(function(response) {
                var countrySelect = $('#country');

                countrySelect.append($('<option>').text('Select Country').val(''));

                response.forEach(function(country) {
                    countrySelect.append($('<option>').text(country.name).val(country.iso2));
                });

                countrySelect.trigger('change');
            });

            $('#country').on('change', function() {
                var selectedCountry = $(this).val();

                $('#state').empty();
                $('#city').empty();

                $('#state').append($('<option>').text('Select State').val(''));
                $('#city').append($('<option>').text('Select City').val(''));

                var stateSettings = {
                    "url": "https://api.countrystatecity.in/v1/countries/" + selectedCountry +
                        "/states",
                    "method": "GET",
                    "headers": {
                        "X-CSCAPI-KEY": apiKey
                    },
                };

                // get all states by country
                $.ajax(stateSettings).done(function(response) {
                    var stateSelect = $('#state');

                    response.forEach(function(state) {
                        stateSelect.append($('<option>').text(state.name).val(state.iso2));
                    });

                    stateSelect.trigger('change');
                });
            });

            $('#state').on('change', function() {
                var selectedCountry = $('#country').val();
                var selectedState = $(this).val();

                $('#city').empty();

                $('#city').append($('<option>').text('Select City').val(''));

                var citySettings = {
                    "url": "https://api.countrystatecity.in/v1/countries/" + selectedCountry + "/states/" + selectedState + "/cities",
                    "method": "GET",
                    "headers": {
                        "X-CSCAPI-KEY": apiKey
                    },
                };

                // get all city by states and country
                $.ajax(citySettings).done(function(response) {
                    var citySelect = $('#city');

                    response.forEach(function(city) {
                        citySelect.append($('<option>').text(city.name).val(city.id));
                    });

                    citySelect.trigger('change');
                });
            });
        });
    </script>
@endpush

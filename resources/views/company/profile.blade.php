@extends('layouts.master')

@section('title', 'Company Profile | ' . config('app.name'))

@section('content')
    <section class="user-dashboard">
        <div class="dashboard-outer">
            <div class="upper-title-box">
                <h3>My Profile</h3>
                <div class="text">Ready to jump back in?</div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Profile -->
                    <div class="ls-widget">
                        <div class="tabs-box">
                            <div class="widget-title">
                                <h4>My Profile</h4>
                            </div>

                            <div class="widget-content">

                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <div class="uploading-outer">
                                    <div class="uploadButton">
                                        {{-- <form method="POST" action="{{ route('candidate.avatar.update') }}"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="d-flex flex-column form-group mb-3 image-preview">
                                                <div for="image" class="mb-2">
                                                    @if ($candidate->image_url)
                                                        <img style="width: 12rem; height: 12rem;"
                                                            class="object-fit-cover rounded"
                                                            src="{{ asset($candidate->image_url) }}" alt="">
                                                    @else
                                                        <img style="width: 12rem; height: 12rem;"
                                                            class="object-fit-cover rounded"
                                                            src="{{ asset(\App\Models\User::PLACEHOLDER_IMAGE_PATH) }}"
                                                            alt="">
                                                    @endif
                                                </div>
                                                <input class="image-upload-input" type="file" name="avatar"
                                                    id="avatar" accept="image/*">
                                                @error('avatar')
                                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn btn-primary"> Save </button>
                                            </div>
                                        </form> --}}
                                    </div>
                                    <div class="text">Max file size is 2MB, Minimum dimension: 330x300 And Suitable files
                                        are .jpg &amp; .png</div>
                                </div>

                                <form method="POST" action="{{ route('company.profile.update', $company->id) }}"
                                    class="default-form">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="form-group col-lg-4 col-md-12">
                                            <label for="name">Name</label>
                                            <input class="@error('name') border border-danger @enderror" id="name"
                                                type="text" name="name" placeholder="Name"
                                                value="{{ old('name', $company->name) }}">
                                            @error('name')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-4 col-md-12">
                                            <label for="email">Email Address</label>
                                            <input id="email" type="email" name="email" readonly
                                                value="{{ $company->email }}">
                                        </div>

                                        <div class="form-group col-lg-4 col-md-12">
                                            <label for="industry_type">Industry Type</label>
                                            <input class="@error('industry_type') border border-danger @enderror"
                                                id="industry_type" type="text" name="industry_type"
                                                placeholder="industry_type"
                                                value="{{ old('industry_type', $company->industry_type) }}">
                                            @error('industry_type')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label for="phone">Phone</label>
                                            <input class="@error('phone') border border-danger @enderror" id="phone"
                                                type="text" name="phone" placeholder="Phone"
                                                value="{{ old('phone', $company->phone) }}">
                                            @error('phone')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label for="website">Website</label>
                                            <input class="@error('website') border border-danger @enderror" id="website"
                                                type="text" name="website"
                                                value="{{ old('website', $company->website) }}" placeholder="Website">
                                            @error('website')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-4 col-md-6">
                                            <label for="country">Country</label>
                                            <select class="@error('country') border border-danger @enderror"
                                                class="chosen-select" name="country" id="country">
                                            </select>
                                            @error('country')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-4 col-md-6">
                                            <label for="state">State</label>
                                            <select class="@error('state') border border-danger @enderror"
                                                class="chosen-select" name="state" id="state">
                                            </select>
                                            @error('state')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-4 col-md-6">
                                            <label for="city">City</label>
                                            <select class="@error('city') border border-danger @enderror"
                                                class="chosen-select" name="city" id="city">
                                            </select>
                                            @error('city')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-12 col-lg-6">
                                            <label for="address">Address</label>
                                            <input class="@error('address') border border-danger @enderror" type="text"
                                                id="address" placeholder="Address" name="address"
                                                value="{{ old('address', $company->address) }}">
                                            @error('address')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-12 col-lg-6">
                                            <label for="license_no">License No.</label>
                                            <input class="@error('license_no') border border-danger @enderror"
                                                type="text" id="license_no" name="license_no" placeholder="License No."
                                                value="{{ old('license_no', $company->license_no) }}">
                                            @error('license_no')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <button type="submit" class="theme-btn btn-style-one">Save</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
@endpush

@push('script')
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>
    <script>
        $('.datepicker').datepicker();

        $('.image-upload-input').change(function() {
            const file = this.files[0];
            const previewer = $(this).closest('.image-preview').find('img');

            if (file) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    previewer.attr('src', event.target.result);
                }
                reader.readAsDataURL(file);
            }
        });

        var storedCountry = "{{ $company->country }}";
        var storedState = "{{ $company->state }}";
        var storedCityId = "{{ $company->city }}";

        var apiKey = "{{ config('app.country_state_city_api_key') }}";

        var fetchCountry = {
            "url": "https://api.countrystatecity.in/v1/countries/" + storedCountry,
            "method": "GET",
            "headers": {
                "X-CSCAPI-KEY": apiKey
            },
        };

        $.ajax(fetchCountry).done(function(response) {
            var selectedCountry = $('#country');
            selectedCountry.append($('<option>').text(response.name).val(storedCountry));
        });

        var fetchState = {
            "url": "https://api.countrystatecity.in/v1/countries/" + storedCountry + "/states/" +
                storedState,
            "method": "GET",
            "headers": {
                "X-CSCAPI-KEY": apiKey
            },
        };

        $.ajax(fetchState).done(function(response) {
            var selectedState = $('#state');
            selectedState.append($('<option>').text(response.name).val(storedState));
        });

        var fetchCity = {
            "url": "https://api.countrystatecity.in/v1/countries/" + storedCountry + "/states/" +
                storedState + "/cities",
            "method": "GET",
            "headers": {
                "X-CSCAPI-KEY": apiKey
            },
        };

        $.ajax(fetchCity).done(function(response) {
            var selectedCity = $('#city');
            var cityName = null;

            response.forEach(function(city) {
                if (city.id == storedCityId) {
                    cityName = city.name;
                    return false;
                }
            });

            if (cityName) {
                selectedCity.append($('<option>').text(cityName).val(storedCityId));
            } else {
                console.log("City not found");
            }
        });

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

        var getCountry = {
            "url": "https://api.countrystatecity.in/v1/countries",
            "method": "GET",
            "headers": {
                "X-CSCAPI-KEY": apiKey
            },
        };

        // get all country
        $.ajax(getCountry).done(function(response) {
            var countrySelect = $('#country');

            response.forEach(function(country) {
                countrySelect.append($('<option>').text(country.name).val(country.iso2));
            });
        });

        $('#country').on('change', function() {
            var selectedCountry = $(this).val();

            $('#state').empty();
            $('#city').empty();

            var getState = {
                "url": "https://api.countrystatecity.in/v1/countries/" + selectedCountry +
                    "/states",
                "method": "GET",
                "headers": {
                    "X-CSCAPI-KEY": apiKey
                },
            };

            // get all states by country
            $.ajax(getState).done(function(response) {
                var stateSelect = $('#state');

                response.forEach(function(state) {
                    stateSelect.append($('<option>').text(state.name).val(state.iso2));
                });
            });
        });

        $('#state').on('change', function() {
            var selectedCountry = $('#country').val();
            var selectedState = $(this).val();

            $('#city').empty();

            var getCity = {
                "url": "https://api.countrystatecity.in/v1/countries/" + selectedCountry + "/states/" +
                    selectedState + "/cities",
                "method": "GET",
                "headers": {
                    "X-CSCAPI-KEY": apiKey
                },
            };

            // get all city by states and country
            $.ajax(getCity).done(function(response) {
                var citySelect = $('#city');

                response.forEach(function(city) {
                    citySelect.append($('<option>').text(city.name).val(city.id));
                });
            });
        });
    </script>
@endpush

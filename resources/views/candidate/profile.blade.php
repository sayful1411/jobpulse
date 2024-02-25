@extends('layouts.master')

@section('title', 'Candidate Profile | ' . config('app.name'))

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
                                        <input class="uploadButton-input" type="file" name="avatar" accept="image/*"
                                            id="upload">
                                        <label class="uploadButton-button ripple-effect" for="upload">Browse
                                            Avatar</label>
                                        <span class="uploadButton-file-name"></span>
                                    </div>
                                    <div class="text">Max file size is 2MB, Minimum dimension: 330x300 And Suitable files
                                        are .jpg &amp; .png</div>
                                </div>

                                <form method="POST" action="{{ route('candidate.profile.store') }}" class="default-form">
                                    @csrf

                                    <div class="row">
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label for="name">Full Name</label>
                                            <input type="text" id="name" value="{{ $candidate->name }}" readonly>
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label for="nid">NID</label>
                                            <input class="@error('nid') border border-danger @enderror" type="number"
                                                id="nid" name="nid" value="{{ old('nid', $candidate->profile->nid ?? '') }}">
                                            @error('nid')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label for="phone">Phone</label>
                                            <input class="@error('phone') border border-danger @enderror" type="text"
                                                id="phone" name="phone" value="{{ old('phone', $candidate->phone) }}">
                                            @error('phone')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label for="email">Email address</label>
                                            <input type="text" id="email" value="{{ $candidate->email }}" readonly>
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label for="website">Website</label>
                                            <input class="@error('website') border border-danger @enderror" type="text"
                                                id="website" name="website"
                                                value="{{ old('website', $candidate->profile->website ?? '') }}">
                                            @error('website')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-3 col-md-12">
                                            <label for="current_salary">Current Salary</label>
                                            <input class="@error('current_salary') border border-danger @enderror"
                                                type="number" id="current_salary" name="current_salary"
                                                value="{{ old('current_salary', $candidate->othersInformation->current_salary ?? '') }}">
                                            @error('current_salary')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-3 col-md-12">
                                            <label for="expected_salary">Expected Salary</label>
                                            <input class="@error('expected_salary') border border-danger @enderror"
                                                type="number" id="expected_salary" name="expected_salary"
                                                value="{{ old('expected_salary', $candidate->othersInformation->expected_salary ?? '') }}">
                                            @error('expected_salary')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label for="father_name">Father's Name</label>
                                            <input class="@error('father_name') border border-danger @enderror"
                                                type="text" id="father_name" name="father_name"
                                                value="{{ old('father_name', $candidate->profile->father_name ?? '') }}">
                                            @error('father_name')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label for="mother_name">Mother's Name</label>
                                            <input class="@error('mother_name') border border-danger @enderror"
                                                type="text" id="mother_name" name="mother_name"
                                                value="{{ old('mother_name', $candidate->profile->mother_name ?? '') }}">
                                            @error('mother_name')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-4 col-md-12">
                                            <label for="blood_group">Blood Group</label>
                                            <input class="@error('blood_group') border border-danger @enderror"
                                                type="text" id="blood_group" name="blood_group"
                                                value="{{ old('blood_group', $candidate->profile->blood_group ?? '') }}" placeholder="A+">
                                            @error('blood_group')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-4 col-md-12 date" data-provide="datepicker">
                                            <label for="date_of_birth">Date of Birth</label>
                                            <input class="@error('date_of_birth') border border-danger @enderror"
                                                type="text" id="date_of_birth" name="date_of_birth"
                                                class="form-control"
                                                value="{{ old('date_of_birth', $candidate->profile->date_of_birth ?? '') }}">
                                            @error('date_of_birth')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="input-group-addon">
                                                <span class="glyphicon glyphicon-th"></span>
                                            </div>
                                        </div>

                                        <!-- Search Select -->
                                        <div class="form-group col-lg-4 col-md-12">
                                            <label for="gender">Gender</label>
                                            <select class="@error('gender') border border-danger @enderror"
                                                class="chosen-select" name="gender" id="gender">
                                                <option value="Male" @selected(old('gender', $candidate->profile->gender ?? '') == 'Male')>Male</option>
                                                <option value="Female" @selected(old('gender', $candidate->profile->gender ?? '') == 'Female')>Female</option>
                                                <option value="Other" @selected(old('gender', $candidate->profile->gender ?? '') == 'Other')>Other</option>
                                            </select>
                                            @error('gender')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label for="phone_2">Alternate Phone</label>
                                            <input class="@error('phone_2') border border-danger @enderror"
                                                type="text" id="phone_2" name="phone_2"
                                                value="{{ old('phone_2', $candidate->profile->phone_2 ?? '') }}">
                                            @error('phone_2')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label for="address">Address</label>
                                            <input class="@error('address') border border-danger @enderror"
                                                type="text" id="address" name="address"
                                                value="{{ old('address', $candidate->profile->address ?? '') }}">
                                            @error('address')
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

                    <!-- Social Account -->
                    <div class="ls-widget">
                        <div class="tabs-box">
                            <div class="widget-title">
                                <h4>Social Network</h4>
                            </div>

                            <div class="widget-content">
                                <form method="POST" action="{{ route('candidate.social.store') }}" class="default-form">
                                    @csrf

                                    <div class="row">
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Facebook</label>
                                            <input type="hidden" name="social_accounts[facebook][title]" value="Facebook" class="d-none">
                                            <input class="@error('social_accounts.facebook.url') border border-danger @enderror" type="url" name="social_accounts[facebook][url]" value="{{ old('social_accounts.facebook.url', $candidate->socialAccountsInformation[0]['url'] ?? '') }}">
                                            @error('social_accounts.facebook.url')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Twitter</label>
                                            <input type="hidden" name="social_accounts[twitter][title]" value="Twitter" class="d-none">
                                            <input class="@error('social_accounts.twitter.url') border border-danger @enderror" type="url" name="social_accounts[twitter][url]" value="{{ old('social_accounts.twitter.url', $candidate->socialAccountsInformation[1]['url'] ?? '') }}">
                                            @error('social_accounts.twitter.url')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Linkedin</label>
                                            <input type="hidden" name="social_accounts[linkedin][title]" value="LinkedIn" class="d-none">
                                            <input class="@error('social_accounts.linkedin.url') border border-danger @enderror" type="url" name="social_accounts[linkedin][url]" value="{{ old('social_accounts.linkedin.url', $candidate->socialAccountsInformation[2]['url'] ?? '') }}">
                                            @error('social_accounts.linkedin.url')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Google Plus</label>
                                            <input type="hidden" name="social_accounts[google_plus][title]" value="Google Plus" class="d-none">
                                            <input class="@error('social_accounts.google_plus.url') border border-danger @enderror" type="url" name="social_accounts[google_plus][url]" value="{{ old('social_accounts.google_plus.url', $candidate->socialAccountsInformation[3]['url'] ?? '') }}">
                                            @error('social_accounts.google_plus.url')
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
    <script>
        $('.datepicker').datepicker();
    </script>
@endpush

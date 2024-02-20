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

                                <form class="default-form">
                                    <div class="row">
                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label for="name">Full Name</label>
                                            <input type="text" id="name" value="{{ $candidate->name }}" readonly>
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label for="nid">NID</label>
                                            <input type="text" id="nid" name="nid" value="{{ old('nid', $candidate->nid) }}">
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label for="phone">Phone</label>
                                            <input type="text" id="phone" name="phone" value="{{ old('phone', $candidate->phone) }}">
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label for="email">Email address</label>
                                            <input type="text" id="email" value="{{ $candidate->email }}" readonly>
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label for="website">Website</label>
                                            <input type="text" id="website" name="website" value="{{ old('website', $candidate->website) }}">
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-3 col-md-12">
                                            <label for="current_salary">Current Salary</label>
                                            <input type="number" id="current_salary"  name="current_salary" value="{{ old('current_salary', $candidate->current_salary) }}">
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-3 col-md-12">
                                            <label for="expected_salary">Expected Salary</label>
                                            <input type="number" id="expected_salary"  name="expected_salary" value="{{ old('expected_salary', $candidate->expected_salary) }}">
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label for="father_name">Father's Name</label>
                                            <input type="text" id="father_name" name="father_name" value="{{ old('father_name', $candidate->father_name) }}">
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label for="mother_name">Mother's Name</label>
                                            <input type="text" id="mother_name" name="mother_name" value="{{ old('mother_name', $candidate->mother_name) }}">
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-4 col-md-12">
                                            <label for="blood_group">Blood Group</label>
                                            <input type="text" id="blood_group" name="blood_group" value="{{ old('blood_group', $candidate->blood_group) }}">
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-4 col-md-12 date" data-provide="datepicker">
                                            <label for="date_of_birth">Date of Birth</label>
                                            <input type="text" id="date_of_birth" name="date_of_birth" class="form-control" value="{{ old('date_of_birth', $candidate->date_of_birth) }}">
                                            <div class="input-group-addon">
                                                <span class="glyphicon glyphicon-th"></span>
                                            </div>
                                        </div>

                                        <!-- Search Select -->
                                        <div class="form-group col-lg-4 col-md-12">
                                            <label for="gender">Gender</label>
                                            <select class="chosen-select" id="gender" name="gender" value="{{ old('gender', $candidate->gender) }}">
                                                <option>Male</option>
                                                <option>Female</option>
                                                <option>Other</option>
                                            </select>
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label for="phone_2">Alternate Phone</label>
                                            <input type="text" id="phone_2" name="phone_2" value="{{ old('phone_2', $candidate->phone_2) }}">
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label for="address">Address</label>
                                            <input type="text" id="address" name="address" value="{{ old('address', $candidate->address) }}">
                                        </div>

                                        <!-- Input -->
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
                                <form class="default-form">
                                    <div class="row">
                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Facebook</label>
                                            <input type="text" name="facebook" >
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Twitter</label>
                                            <input type="text" name="twitter" >
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Linkedin</label>
                                            <input type="text" name="linkedin" >
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Google Plus</label>
                                            <input type="text" name="google_plus" >
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <button class="theme-btn btn-style-one">Save</button>
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

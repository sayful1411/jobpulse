@extends('layouts.master')

@section('title', 'Add Education | ' . config('app.name'))

@section('content')
    <section class="user-dashboard">
        <div class="dashboard-outer">
            <div class="upper-title-box">
                <h3>Add Education</h3>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Ls widget -->
                    <div class="pt-5 ls-widget">
                        <div class="tabs-box">
                            <div class="widget-content">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('education.store') }}"
                                    class="default-form">
                                    @csrf

                                    <div class="row">
                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <div class="form-group col-md-12">
                                                <label>Level of Education</label>
                                                <select name="level" class="form-select">
                                                    <option selected value="">Select Level</option>
                                                    <option value="PSC" @selected(old('level') == 'PSC')>PSC</option>
                                                    <option value="JSC" @selected(old('level') == 'JSC')>JSC</option>
                                                    <option value="SSC" @selected(old('level') == 'SSC')>SSC</option>
                                                    <option value="HSC" @selected(old('level') == 'HSC')>HSC</option>
                                                    <option value="Honors" @selected(old('level') == 'Honors')>Honors</option>
                                                    <option value="Masters" @selected(old('level') == 'Masters')>Masters</option>
                                                    <option value="Diploma" @selected(old('level') == 'Diploma')>Diploma</option>
                                                </select>
                                                @error('level')
                                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Exam/Degree Title</label>
                                            <input type="text" name="degree_name" value="{{ old('degree_name') }}" placeholder="HSC/BSS">
                                            @error('degree_name')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Major/Group/Subject</label>
                                            <input type="text" name="major" value="{{ old('major') }}" placeholder="Economics/Science">
                                            @error('major')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Institute Name</label>
                                            <input type="text" name="institute_name" value="{{ old('institute_name') }}" placeholder="Dhaka University">
                                            @error('institute_name')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Result</label>
                                            <input type="text" name="result" value="{{ old('result') }}" placeholder="A+/5.00">
                                            @error('result')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Passing Year</label>
                                            <input type="text" name="passing_year" value="{{ old('passing_year') }}" placeholder="2024">
                                            @error('passing_year')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
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
                </div>
            </div>

        </div>
    </section>
@endsection

@push('script')
    <script src="{{ asset('js/jquery.modal.min.js') }}"></script>
@endpush

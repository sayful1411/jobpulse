@extends('layouts.master')

@section('title', 'Create Job | ' . config('app.name'))

@section('content')
    <section class="user-dashboard">
        <div class="dashboard-outer">
            <div class="upper-title-box">
                <h3>Post a New Job!</h3>
                <div class="text">Ready to jump back in?</div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Ls widget -->
                    <div class="ls-widget">
                        <div class="tabs-box">
                            <div class="widget-title">
                                <h4>Post Job</h4>
                            </div>

                            <div class="widget-content">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <form class="default-form" method="POST" action="{{ route('company.jobs.store') }}">
                                    @csrf
                                    <div class="row">
                                        <!-- Input -->
                                        <div class="form-group col-lg-12 col-md-12">
                                            <label for="title">Job Title</label>
                                            <input class="@error('title') border border-danger @enderror" type="text"
                                                name="title" id="title" value="{{ old('title') }}"
                                                placeholder="Title">
                                            @error('title')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- About Company -->
                                        <div class="form-group col-lg-12 col-md-12">
                                            <label for="editor">Job Description</label>
                                            <textarea class="@error('description') border border-danger @enderror" name="description" id="summernote"
                                                placeholder="">{{ old('description') }}
                                            </textarea>
                                            @error('description')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-4 col-md-12">
                                            <label for="min_salary">Salary Minimum ($)</label>
                                            <input class="@error('min_salary') border border-danger @enderror"
                                                type="text" name="min_salary" id="min_salary"
                                                placeholder="10000" value="{{ old('min_salary') }}">
                                            @error('min_salary')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-4 col-md-12">
                                            <label for="max_salary">Salary Maximum ($)</label>
                                            <input class="@error('max_salary') border border-danger @enderror"
                                                type="text" name="max_salary" id="max_salary"
                                                placeholder="50000" value="{{ old('max_salary') }}">
                                            @error('max_salary')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-4 col-md-12">
                                            <label for="vacancy">Vacancy</label>
                                            <input class="@error('vacancy') border border-danger @enderror" type="text"
                                                name="vacancy" id="vacancy" value="{{ old('vacancy') }}"
                                                placeholder="5">
                                            @error('vacancy')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label for="job_type">Job Type</label>
                                            <input class="@error('job_type') border border-danger @enderror" type="text"
                                                name="job_type" id="job_type" value="{{ old('job_type') }}"
                                                placeholder="Web Development">
                                            @error('job_type')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label for="experience">Experience</label>
                                            <input class="@error('experience') border border-danger @enderror" type="text"
                                                name="experience" id="experience" value="{{ old('experience') }}"
                                                placeholder="At least 1 year">
                                            @error('experience')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12 date" data-provide="datepicker">
                                            <label for="expiration_date">Expiration Date</label>
                                            <input class="@error('expiration_date') border border-danger @enderror"
                                                type="text" id="expiration_date" name="expiration_date"
                                                class="form-control" value="{{ old('expiration_date') }}" placeholder="03/26/2024">
                                            @error('expiration_date')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="input-group-addon">
                                                <span class="glyphicon glyphicon-th"></span>
                                            </div>
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label for="location">Location</label>
                                            <input class="@error('location') border border-danger @enderror" type="text"
                                                id="location" name="location" value="{{ old('location') }}"
                                                placeholder="Dhaka, Bangladesh">
                                            @error('location')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-12 col-md-12">
                                            <label id="tags">Select Tags</label>
                                            <select class="tags" id="tags" name="tags[]" multiple="multiple">
                                                @foreach ($tags as $tag)
                                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('tags')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-12 col-md-12 text-right">
                                            <button type="submit" class="theme-btn btn-style-one">Create</button>
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
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {

            $('.tags').select2({
                tags: false
            });

            $('.datepicker').datepicker();

            $('#summernote').summernote({
                tabsize: 2,
                height: 300
            });
        });
    </script>
@endpush

@extends('layouts.master')

@section('title', 'Edit Experience | ' . config('app.name'))

@section('content')
    <section class="user-dashboard">
        <div class="dashboard-outer">
            <div class="upper-title-box">
                <h3>Edit Experience</h3>
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

                                <form method="POST" action="{{ route('experience.update', $experience->id) }}"
                                    class="default-form">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Company Name</label>
                                            <input type="text" name="company_name" value="{{ old('company_name', $experience->company_name) }}" placeholder="ABC IT Company">
                                            @error('company_name')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Department</label>
                                            <input type="text" name="department" value="{{ old('department', $experience->department) }}" placeholder="Software Engineer">
                                            @error('department')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-4 col-md-12 date" data-provide="datepicker">
                                            <label for="join">Joining Date</label>
                                            <input class="@error('join') border border-danger @enderror"
                                                type="text" id="join" name="join"
                                                class="form-control"
                                                value="{{ old('join', $experience->join->format('d-M-Y')) }}">
                                            @error('join')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="input-group-addon">
                                                <span class="glyphicon glyphicon-th"></span>
                                            </div>
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-4 col-md-12 date" data-provide="datepicker">
                                            <label for="resign">Resing Date</label>
                                            <input class="@error('resign') border border-danger @enderror"
                                                type="text" id="resign" name="resign"
                                                class="form-control"
                                                value="{{ old('resign', $experience->resign ? $experience->resign->format('d-M-Y') : '') }}">
                                            @error('resign')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="input-group-addon">
                                                <span class="glyphicon glyphicon-th"></span>
                                            </div>
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-4 col-md-12">
                                            <div class="form-group col-md-12">
                                                <label>Is Currently Working</label>
                                                <select name="is_currently_working" class="form-select">
                                                    <option value="1" @selected(old('is_currently_working', $experience->is_currently_working) == '1')>Yes</option>
                                                    <option selected value="0" @selected(old('is_currently_working', $experience->is_currently_working) == '0')>No</option>
                                                </select>
                                                @error('is_currently_working')
                                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-md-12">
                                            <label>Company Address</label>
                                            <input type="text" name="company_address" value="{{ old('company_address', $experience->company_address) }}" placeholder="">
                                            @error('company_address')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-12 col-md-12">
                                            <label>Responsibilities</label>
                                            <textarea name="responsibilities" placeholder="Responsibilities">{{ old('responsibilities', $experience->responsibilities) }}</textarea>
                                            @error('responsibilities')
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

@push('css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
@endpush

@push('script')
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        $('.datepicker').datepicker();
    </script>
@endpush

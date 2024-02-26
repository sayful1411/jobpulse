@extends('layouts.master')

@section('title', 'Add Training | ' . config('app.name'))

@section('content')
    <section class="user-dashboard">
        <div class="dashboard-outer">
            <div class="upper-title-box">
                <h3>Add Training</h3>
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

                                <form method="POST" action="{{ route('training.update', $training->id) }}"
                                    class="default-form">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Title</label>
                                            <input type="text" name="title" value="{{ old('title', $training->title) }}" placeholder="Web Developer">
                                            @error('title')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Institute</label>
                                            <input type="text" name="institute" value="{{ old('institute', $training->institute) }}" placeholder="Ostad Ltd.">
                                            @error('institute')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Completition Year</label>
                                            <input type="text" name="completion_year" value="{{ old('completion_year', $training->completion_year) }}" placeholder="2024">
                                            @error('completion_year')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-md-12">
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


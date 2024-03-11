@extends('layouts.app')

@section('title', 'All Jobs' . config('app.name'))

@section('content')
    <section class="page-title" style="padding: 150px 0 100px">
        <div class="auto-container">
            <!-- Job Search Form -->
            <div class="job-search-form">
                <form method="get" action="{{ route('all.jobs') }}">
                    <div class="row">
                        <!-- Form Group -->
                        <div class="form-group col-lg-4 col-md-12 col-sm-12">
                            <span class="icon flaticon-search-1"></span>
                            <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="Job title, type, or company">
                        </div>

                        <!-- Form Group -->
                        <div class="form-group col-lg-4 col-md-12 col-sm-12 location">
                            <span class="icon flaticon-map-locator"></span>
                            <input type="text" name="location" value="{{ request('location') }}" placeholder="Country or City">
                        </div>

                        <!-- Form Group -->
                        <div class="form-group col-lg-4 col-md-12 col-sm-12 text-right">
                            <button type="submit" class="theme-btn btn-style-one">Find Jobs</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Job Search Form -->
        </div>
    </section>

    <section class="ls-section">
        <div class="auto-container">
            <div class="filters-backdrop"></div>
            <div class="row">
                <div class="content-column col-lg-12">
                    <div class="ls-outer">
                        
                        <livewire:show-jobs :keyword="$keyword" :location="$location"/>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

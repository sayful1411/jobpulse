@extends('layouts.app')

@section('title', 'All Jobs' . config('app.name'))

@section('content')
    <section class="page-title" style="padding: 150px 0 100px">
        <div class="auto-container">
            <!-- Job Search Form -->
            <div class="job-search-form">
                <form method="post" action="">
                    <div class="row">
                        <!-- Form Group -->
                        <div class="form-group col-lg-4 col-md-12 col-sm-12">
                            <span class="icon flaticon-search-1"></span>
                            <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="Job title, type, or company">
                        </div>

                        <!-- Form Group -->
                        <div class="form-group col-lg-4 col-md-12 col-sm-12 location">
                            <span class="icon flaticon-map-locator"></span>
                            <input type="text" name="field_name" placeholder="City or postcode">
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
                        <!-- ls Switcher -->
                        <div class="ls-switcher">
                            <div class="showing-result">
                                <div class="top-filters">
                                    <div class="form-group">
                                        <select class="chosen-select">
                                            <option>Job Location</option>
                                            <option>Anywhere</option>
                                            <option>Bangladesh</option>
                                            <option>UK</option>
                                            <option>US</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <select class="chosen-select">
                                            <option>Date Posted</option>
                                            <option>Any Time</option>
                                            <option>Past Month</option>
                                            <option>Past Week</option>
                                            <option>Past 24 Hours</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <select class="chosen-select">
                                            <option>Salary estimate</option>
                                            <option>10K - 20K</option>
                                            <option>20K - 30K</option>
                                            <option>50K - 60K</option>
                                            <option>70K - 80K</option>
                                            <option>100K+</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="sort-by">
                                <select class="chosen-select">
                                    <option>Job Type</option>
                                    <option>Full Time</option>
                                    <option>Internship</option>
                                    <option>Part Time</option>
                                    <option>Remote</option>
                                </select>

                                <select class="chosen-select">
                                    <option>Show 10</option>
                                    <option>Show 20</option>
                                    <option>Show 30</option>
                                    <option>Show 40</option>
                                    <option>Show 50</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Job Block -->
                            @foreach ($jobs as $job)
                                <div class="job-block col-lg-6 col-md-12 col-sm-12">
                                    <div class="inner-box">
                                        <div class="content">
                                            <span class="company-logo">
                                                @if ($job->company && $job->company->image_url)
                                                    <img class="rounded-circle" src="{{ asset($job->company->image_url) }}"
                                                        alt="Company Image">
                                                @endif
                                            </span>
                                            <h4><a href="{{ route('single.job', $job->slug) }}">{{ $job->title }}</a></h4>
                                            <ul class="job-info">
                                                <li><span class="icon flaticon-map-locator"></span>{{ $job->location }}
                                                </li>
                                                <li><span
                                                        class="icon flaticon-clock-3"></span>{{ $job->created_at->diffForHumans() }}
                                                </li>
                                                <li><span
                                                        class="icon flaticon-money"></span>{{ '$' . $job->min_salary . ' - ' . '$' . $job->max_salary }}
                                                </li>
                                            </ul>
                                            <ul class="job-other-info">
                                                @foreach ($job->tags as $tag)
                                                    @php
                                                        $class = '';
                                                        switch ($tag->name) {
                                                            case 'Full Time':
                                                                $class = 'full-time';
                                                                break;
                                                            case 'Part Time':
                                                                $class = 'part-time';
                                                                break;
                                                            case 'On Site':
                                                                $class = 'onsite';
                                                                break;
                                                            case 'Remote':
                                                                $class = 'remote';
                                                                break;
                                                            case 'Contract':
                                                                $class = 'contract';
                                                                break;
                                                            case 'Internship':
                                                                $class = 'internship';
                                                                break;
                                                            case 'Urgent':
                                                                $class = 'urgent';
                                                                break;
                                                            default:
                                                                $class = 'green';
                                                                break;
                                                        }
                                                    @endphp
                                                    <li class="{{ $class }}">{{ $tag->name }}</li>
                                                @endforeach
                                            </ul>
                                            <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            @if ($jobs->isEmpty())
                                <h4 class="text-center">No records found.</h4>
                            @endif
                        </div>

                        <!-- Pagination -->
                        <div>
                            {{ $jobs->links('vendor.pagination.simple-bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

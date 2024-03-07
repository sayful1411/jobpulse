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
                            <input type="text" name="field_name" placeholder="Job title, keywords, or company">
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
                                            <option>Job Type</option>
                                            <option>Web Development</option>
                                            <option>Web Design</option>
                                            <option>Full Time</option>
                                            <option>Internship</option>
                                            <option>Part Time</option>
                                            <option>Temporary</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <select class="chosen-select">
                                            <option>Date Posted</option>
                                            <option>New Jobs</option>
                                            <option>Freelance</option>
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
                                    <option>New Jobs</option>
                                    <option>Freelance</option>
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
                                                    <img class="rounded-circle"
                                                        src="{{ asset($job->company->image_url) }}" alt="Company Image">
                                                @endif
                                            </span>
                                            <h4><a href="#">{{ $job->title }}</a></h4>
                                            <ul class="job-info">
                                                <li><span class="icon flaticon-map-locator"></span>{{ $job->location }}
                                                </li>
                                                <li><span
                                                        class="icon flaticon-clock-3"></span>{{ $job->created_at->diffForHumans() }}
                                                </li>
                                                <li><span class="icon flaticon-money"></span>{{ $job->salary_range }}</li>
                                            </ul>
                                            <ul class="job-other-info">
                                                @foreach ($job->tags as $tag)
                                                    @php
                                                        $class = '';
                                                        switch ($tag->name) {
                                                            case 'Full Time':
                                                                $class = 'bg-primary text-white';
                                                                break;
                                                            case 'Part Time':
                                                                $class = 'time';
                                                                break;
                                                            case 'On Site':
                                                                $class = 'bg-success text-white';
                                                                break;
                                                            case 'Remote':
                                                                $class = 'bg-warning';
                                                                break;
                                                            case 'Contract':
                                                                $class = 'privacy';
                                                                break;
                                                            case 'Internship':
                                                                $class = 'bg-dark text-white';
                                                                break;
                                                            case 'Urgent':
                                                                $class = 'bg-danger';
                                                                break;
                                                            default:
                                                                $class = 'secondary';
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
                        </div>

                        <!-- Pagination -->
                        <nav class="ls-pagination">
                            <ul>
                                <li class="prev"><a href="#"><i class="fa fa-arrow-left"></i></a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#" class="current-page">2</a></li>
                                <li><a href="#">3</a></li>
                                <li class="next"><a href="#"><i class="fa fa-arrow-right"></i></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

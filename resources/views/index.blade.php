@extends('layouts.app')

@section('title', config('app.name') . ' | The Ultimate Job Solutions')

@section('content')
    <!-- Banner Section Three-->
    <section class="banner-section-three -type-17"
        style="background-image:url('{{ asset('images') }}/index-17/header/bg.png');">
        <div class="auto-container">
            <div class="row align-items-center">
                <div class="content-column col-lg-7 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="title-box wow fadeInUp">
                            <h3>Join us & Explore<br> Thousands of Jobs</h3>
                            <div class="text">Find Jobs, Employment & Career Opportunities</div>
                        </div>

                        <!-- Job Search Form -->
                        <div class="job-search-form wow fadeInUp" data-wow-delay="1000ms">
                            <form method="post" action="{{ route('job.search') }}">
                                @csrf
                                <div class="row justify-content-between">
                                    <!-- Form Group -->
                                    <div class="form-group col-lg-8">
                                        <span class="icon flaticon-search-1"></span>
                                        <input type="text" name="keyword" value="{{ old('keyword') }}"
                                            placeholder="Job title, job type, or company name">
                                    </div>

                                    <!-- Form Group -->
                                    <div class="form-group col-auto">
                                        <button type="submit" class="theme-btn btn-style-two">Find Jobs</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @error('keyword')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <!-- Job Search Form -->

                        <!-- Popular Search -->
                        <div class="popular-searches wow fadeInUp" data-wow-delay="1000ms">
                            <span class="title">Popular Searches : </span>
                            <a href="#">Designer</a>,
                            <a href="#">Developer</a>,
                            <a href="#">Web</a>,
                            <a href="#">IOS</a>,
                            <a href="#">PHP</a>,
                            <a href="#">Senior</a>,
                            <a href="#">Engineer</a>,
                        </div>
                        <!-- End Popular Search -->
                    </div>
                </div>

                <div class="image-column col-lg-5 col-md-12">
                    <div class="image-box">
                        <figure class="main-image wow fadeInRight" data-wow-delay="1500ms"><img
                                src="{{ asset('images') }}/index-17/header/1.png" alt=""></figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Section Three-->

    <!-- Subscribe Section -->
    <section class="subscribe-section-two -type-5">
        <div class="auto-container wow fadeInUp">
            <div class="background-image" style="background-image: url({{ asset('images') }}/index-17/cta/bg.png);">
            </div>

            <div class="row align-items-center justify-content-between">
                <div class="col-lg-4 offset-lg-1">
                    <div class="sec-title pb-16">
                        <h2 class="">Looking To Post a Job</h2>
                        <div class="text">Advertise your jobs to millions of monthly<br> users and search 15.8 million
                            CVs in our<br> database.</div>

                        <div class="mt-20">
                            <a href="{{ route('company.register') }}" class="theme-btn">Post a Job</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Subscribe Section -->
@endsection

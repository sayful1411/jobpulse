@extends('layouts.app')

@section('title', config('app.name') . " | The Ultimate Job Solutions")

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
                            <form method="post" action="https://creativelayers.net/themes/superio/job-list-v10.html">
                                <div class="row justify-content-between">
                                    <!-- Form Group -->
                                    <div class="form-group col-lg-8">
                                        <span class="icon flaticon-search-1"></span>
                                        <input type="text" name="field_name"
                                            placeholder="Job title, keywords, or company">
                                    </div>

                                    <!-- Form Group -->
                                    <div class="form-group col-auto">
                                        <button type="submit" class="theme-btn btn-style-two">Find Jobs</button>
                                    </div>
                                </div>
                            </form>
                        </div>
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

    <!-- Clients Section-->
    <section class="clients-section-two layout-pt-40 layout-pb-60">
        <div class="auto-container">
            <div class="sponsors-outer wow fadeInUp">
                <!--Sponsors Carousel-->
                <ul class="sponsors-carousel owl-carousel owl-theme">
                    <li class="slide-item">
                        <figure class="image-box"><a href="#"><img src="{{ asset('images') }}/index-11/clients/1.svg"
                                    alt=""></a></figure>
                    </li>
                    <li class="slide-item">
                        <figure class="image-box"><a href="#"><img src="{{ asset('images') }}/index-11/clients/2.svg"
                                    alt=""></a></figure>
                    </li>
                    <li class="slide-item">
                        <figure class="image-box"><a href="#"><img src="{{ asset('images') }}/index-11/clients/3.svg"
                                    alt=""></a></figure>
                    </li>
                    <li class="slide-item">
                        <figure class="image-box"><a href="#"><img src="{{ asset('images') }}/index-11/clients/4.svg"
                                    alt=""></a></figure>
                    </li>
                    <li class="slide-item">
                        <figure class="image-box"><a href="#"><img src="{{ asset('images') }}/index-11/clients/5.svg"
                                    alt=""></a></figure>
                    </li>
                    <li class="slide-item">
                        <figure class="image-box"><a href="#"><img src="{{ asset('images') }}/index-11/clients/6.svg"
                                    alt=""></a></figure>
                    </li>
                    <li class="slide-item">
                        <figure class="image-box"><a href="#"><img src="{{ asset('images') }}/index-11/clients/7.svg"
                                    alt=""></a></figure>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Clients Section-->

    <!-- Job Categories -->
    <section class="layout-pt-60 layout-pb-60 border-bottom-none">
        <div class="auto-container">
            <div class="row justify-content-between align-items-end">
                <div class="col-lg-6">
                    <div class="">
                        <h2 class="fw-700">Popular Job Categories</h2>
                        <div class="text mt-9">2020 jobs live - 293 added today.</div>
                    </div>
                </div>

                <div class="col-auto">
                    <a href="#" class="button-icon -arrow">
                        Browse All
                        <span class="fa fa-angle-right"></span>
                    </a>
                </div>
            </div>

            <div class="row mt-50 wow fadeInUp">

                <!-- Category Block -->
                <div class="category-block-three -type-3 col-xl-2 col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="content">
                            <span class="icon flaticon-money-1"></span>
                            <h4><a href="#">Marketing</a></h4>
                            <p>(86 open positions)</p>
                        </div>
                    </div>
                </div>

                <!-- Category Block -->
                <div class="category-block-three -type-3 col-xl-2 col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="content">
                            <span class="icon flaticon-promotion"></span>
                            <h4><a href="#">Design</a></h4>
                            <p>(43 open positions)</p>
                        </div>
                    </div>
                </div>

                <!-- Category Block -->
                <div class="category-block-three -type-3 col-xl-2 col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="content">
                            <span class="icon flaticon-vector"></span>
                            <h4><a href="#">Development</a></h4>
                            <p>(12 open positions)</p>
                        </div>
                    </div>
                </div>

                <!-- Category Block -->
                <div class="category-block-three -type-3 col-xl-2 col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="content">
                            <span class="icon flaticon-web-programming"></span>
                            <h4><a href="#">Customer Service</a></h4>
                            <p>(72 open positions)</p>
                        </div>
                    </div>
                </div>

                <!-- Category Block -->
                <div class="category-block-three -type-3 col-xl-2 col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="content">
                            <span class="icon flaticon-headhunting"></span>
                            <h4><a href="#">Health and Care</a></h4>
                            <p>(25 open positions)</p>
                        </div>
                    </div>
                </div>

                <!-- Category Block -->
                <div class="category-block-three -type-3 col-xl-2 col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="content">
                            <span class="icon flaticon-rocket-ship"></span>
                            <h4><a href="#">Automotive Jobs</a></h4>
                            <p>(92 open positions)</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Job Categories -->

    <div class="tab-menu__wrapper">
        <section class="tab-menu js-tab-menu">
            <div class="auto-container">
                <div class="tab-menu__content">
                    <div class="row justify-content-center">

                        <div class="col-xl-auto col-md-4 col-auto">
                            <a href="#section-1" class="tab-menu__item js-scroll-to-id">
                                <div class="icon text-dark-4 icon-case"></div>
                                <div class="title text-dark-4">Search for jobs</div>
                            </a>
                        </div>

                        <div class="col-xl-auto col-md-4 col-auto">
                            <a href="#section-2" class="tab-menu__item js-scroll-to-id">
                                <div class="icon text-dark-4 icon-contact"></div>
                                <div class="title text-dark-4">Build a good resume</div>
                            </a>
                        </div>

                        <div class="col-xl-auto col-md-4 col-auto">
                            <a href="#section-3" class="tab-menu__item js-scroll-to-id">
                                <div class="icon text-dark-4 icon-doc"></div>
                                <div class="title text-dark-4">Perform during your interview</div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="section-1" class="about-section-two style-two js-tab-menu-content">
            <div class="auto-container">
                <div class="row grid-base justify-content-between align-items-center">
                    <!-- Content Column -->
                    <div class="content-column col-xl-4 col-lg-5 order-2 order-lg-1">
                        <div class="inner-column -no-padding wow fadeInLeft">
                            <div class="sec-title">
                                <h2 class="text-dark-4fw-700">Browse Hundreds<br> of Jobs</h2>
                                <div class="text mt-30">To start searching for jobs, you can attend job fairs online or in
                                    person, use job boards and career websites or reach out directly to recruiters in a
                                    targeted company to broaden your network.</div>
                            </div>
                            <ul class="list-style-one mt-24 mb-24">
                                <li>Bring to the table win-win survival</li>
                                <li>Capitalize on low hanging fruit to identify</li>
                                <li>But I must explain to you how all this</li>
                            </ul>
                            <a href="#" class="theme-btn -dark-blue">Discover More</a>
                        </div>
                    </div>

                    <!-- Image Column -->
                    <div class="image-column -no-margin col-lg-6 order-1 order-lg-2 wow fadeInRight">
                        <figure class="image-box"><img src="{{ asset('images') }}/index-17/images/1.png"
                                alt=""></figure>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Section -->

        <!-- About Section -->
        <section id="section-2" class="about-section-two style-two js-tab-menu-content">
            <div class="auto-container">
                <div class="row grid-base align-items-center">
                    <!-- Image Column -->
                    <div class="image-column -no-margin col-xl-5 col-lg-6 col-md-12 col-sm-12 wow fadeInRight">
                        <figure class="image-box"><img src="{{ asset('images') }}/index-17/images/2.png"
                                alt=""></figure>
                    </div>

                    <!-- Content Column -->
                    <div class="content-column col-xl-4 offset-xl-2 col-lg-5 offset-lg-1 col-md-12 col-sm-12">
                        <div class="wow fadeInLeft">
                            <div class="sec-title">
                                <h2 class="text-dark-4 fw-700">Find Your<br> Match</h2>
                                <div class="text mt-30">An efficient resume should promote your abilities and include
                                    tangible accomplishments that are relevant to the job you apply for. You should also
                                    prepare a cover letter that is concise and elaborates on how you can put your skills to
                                    use in the organization.</div>
                            </div>
                            <a href="#" class="theme-btn -dark-blue-light">Discover More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Section -->

        <!-- About Section -->
        <section id="section-3" class="about-section-two style-two layout-pb-120 js-tab-menu-content">
            <div class="auto-container">
                <div class="row grid-base justify-content-between align-items-center">
                    <!-- Content Column -->
                    <div class="content-column col-xl-4 col-lg-5 order-2 order-lg-1">
                        <div class="inner-column -no-padding wow fadeInLeft">
                            <div class="sec-title">
                                <h2 class="text-dark-4 fw-700">Apply<br> Directly</h2>
                                <div class="text mt-30">An efficient resume should promote your abilities and include
                                    tangible accomplishments that are relevant to the job you apply for. You should also
                                    prepare a cover letter that is concise and elaborates on how you can put your skills to
                                    use in the organization.</div>
                            </div>
                            <a href="#" class="theme-btn -dark-blue-light">Discover More</a>
                        </div>
                    </div>

                    <!-- Image Column -->
                    <div class="image-column -no-margin col-lg-6 order-1 order-lg-2 wow fadeInRight">
                        <figure class="image-box"><img src="{{ asset('images') }}/index-17/images/3.png"
                                alt=""></figure>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Section -->
    </div>

    <!-- Job Section -->
    <section class="job-section-four section-bg-color -image">
        <div class="section-bg-color__item -image md:d-none"
            style="background-image: url({{ asset('images') }}/index-17/jobs/bg.png);"></div>

        <div class="auto-container">
            <div class="row grid-base justify-content-between align-items-end">
                <div class="col-lg-6">
                    <div class="">
                        <h2 class="text-dark-4 fw-700">Featured Jobs</h2>
                        <div class="text-dark-4 text mt-9">Know your worth and find the job that qualify your life</div>
                    </div>
                </div>

                <div class="col-auto">
                    <a href="#" class="button-icon text-dark-4 -arrow">
                        Browse All
                        <span class="fa fa-angle-right"></span>
                    </a>
                </div>
            </div>

            <div class="row mt-50 wow fadeInUp">

                <!-- Job Block -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="job-block -type-2">
                        <div class="inner-box">
                            <div class="inner-header">
                                <div class="icon-wrap">
                                    <div class="icon flaticon-money-1"></div>
                                </div>
                                <div class="title">Development</div>
                            </div>

                            <div class="inner-content">
                                <h4><a href="#">Software Engineer (Android), Libraries</a></h4>
                                <ul class="job-other-info">
                                    <li class="privacy">London, UK</li>
                                    <li class="time">Full Time</li>
                                </ul>
                            </div>

                            <div class="inner-footer">
                                <div class="content">
                                    <div class="days">3 days ago</div>
                                    <div class="company-name">Catalyst</div>
                                </div>
                                <span class="company-logo"><img src="{{ asset('images') }}/resource/company-logo/3-1.png"
                                        alt=""></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Job Block -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="job-block -type-2">
                        <div class="inner-box">
                            <div class="inner-header">
                                <div class="icon-wrap">
                                    <div class="icon flaticon-promotion"></div>
                                </div>
                                <div class="title">Development</div>
                            </div>

                            <div class="inner-content">
                                <h4><a href="#">Software Engineer (Android), Libraries</a></h4>
                                <ul class="job-other-info">
                                    <li class="privacy">London, UK</li>
                                    <li class="time">Full Time</li>
                                </ul>
                            </div>

                            <div class="inner-footer">
                                <div class="content">
                                    <div class="days">3 days ago</div>
                                    <div class="company-name">Catalyst</div>
                                </div>
                                <span class="company-logo"><img src="{{ asset('images') }}/resource/company-logo/3-2.png"
                                        alt=""></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Job Block -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="job-block -type-2">
                        <div class="inner-box">
                            <div class="inner-header">
                                <div class="icon-wrap">
                                    <div class="icon flaticon-vector"></div>
                                </div>
                                <div class="title">Development</div>
                            </div>

                            <div class="inner-content">
                                <h4><a href="#">Software Engineer (Android), Libraries</a></h4>
                                <ul class="job-other-info">
                                    <li class="privacy">London, UK</li>
                                    <li class="time">Full Time</li>
                                </ul>
                            </div>

                            <div class="inner-footer">
                                <div class="content">
                                    <div class="days">3 days ago</div>
                                    <div class="company-name">Catalyst</div>
                                </div>
                                <span class="company-logo"><img src="{{ asset('images') }}/resource/company-logo/3-3.png"
                                        alt=""></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Job Block -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="job-block -type-2">
                        <div class="inner-box">
                            <div class="inner-header">
                                <div class="icon-wrap">
                                    <div class="icon flaticon-web-programming"></div>
                                </div>
                                <div class="title">Development</div>
                            </div>

                            <div class="inner-content">
                                <h4><a href="#">Software Engineer (Android), Libraries</a></h4>
                                <ul class="job-other-info">
                                    <li class="privacy">London, UK</li>
                                    <li class="time">Full Time</li>
                                </ul>
                            </div>

                            <div class="inner-footer">
                                <div class="content">
                                    <div class="days">3 days ago</div>
                                    <div class="company-name">Catalyst</div>
                                </div>
                                <span class="company-logo"><img src="{{ asset('images') }}/resource/company-logo/3-4.png"
                                        alt=""></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Job Block -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="job-block -type-2">
                        <div class="inner-box">
                            <div class="inner-header">
                                <div class="icon-wrap">
                                    <div class="icon flaticon-headhunting"></div>
                                </div>
                                <div class="title">Development</div>
                            </div>

                            <div class="inner-content">
                                <h4><a href="#">Software Engineer (Android), Libraries</a></h4>
                                <ul class="job-other-info">
                                    <li class="privacy">London, UK</li>
                                    <li class="time">Full Time</li>
                                </ul>
                            </div>

                            <div class="inner-footer">
                                <div class="content">
                                    <div class="days">3 days ago</div>
                                    <div class="company-name">Catalyst</div>
                                </div>
                                <span class="company-logo"><img src="{{ asset('images') }}/resource/company-logo/3-5.png"
                                        alt=""></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Job Block -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="job-block -type-2">
                        <div class="inner-box">
                            <div class="inner-header">
                                <div class="icon-wrap">
                                    <div class="icon flaticon-rocket-ship"></div>
                                </div>
                                <div class="title">Development</div>
                            </div>

                            <div class="inner-content">
                                <h4><a href="#">Software Engineer (Android), Libraries</a></h4>
                                <ul class="job-other-info">
                                    <li class="privacy">London, UK</li>
                                    <li class="time">Full Time</li>
                                </ul>
                            </div>

                            <div class="inner-footer">
                                <div class="content">
                                    <div class="days">3 days ago</div>
                                    <div class="company-name">Catalyst</div>
                                </div>
                                <span class="company-logo"><img src="{{ asset('images') }}/resource/company-logo/3-6.png"
                                        alt=""></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Job Block -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="job-block -type-2">
                        <div class="inner-box">
                            <div class="inner-header">
                                <div class="icon-wrap">
                                    <div class="icon flaticon-support-1"></div>
                                </div>
                                <div class="title">Development</div>
                            </div>

                            <div class="inner-content">
                                <h4><a href="#">Software Engineer (Android), Libraries</a></h4>
                                <ul class="job-other-info">
                                    <li class="privacy">London, UK</li>
                                    <li class="time">Full Time</li>
                                </ul>
                            </div>

                            <div class="inner-footer">
                                <div class="content">
                                    <div class="days">3 days ago</div>
                                    <div class="company-name">Catalyst</div>
                                </div>
                                <span class="company-logo"><img src="{{ asset('images') }}/resource/company-logo/3-7.png"
                                        alt=""></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Job Block -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <div class="job-block -type-2">
                        <div class="inner-box">
                            <div class="inner-header">
                                <div class="icon-wrap">
                                    <div class="icon flaticon-first-aid-kit-1"></div>
                                </div>
                                <div class="title">Development</div>
                            </div>

                            <div class="inner-content">
                                <h4><a href="#">Software Engineer (Android), Libraries</a></h4>
                                <ul class="job-other-info">
                                    <li class="privacy">London, UK</li>
                                    <li class="time">Full Time</li>
                                </ul>
                            </div>

                            <div class="inner-footer">
                                <div class="content">
                                    <div class="days">3 days ago</div>
                                    <div class="company-name">Catalyst</div>
                                </div>
                                <span class="company-logo"><img src="{{ asset('images') }}/resource/company-logo/3-8.png"
                                        alt=""></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Job Section -->

    <!-- Section -->
    <section class="layout-pb-60">
        <div class="auto-container">
            <!-- Fun Fact Section -->
            <div class="fun-fact-section layout-pt-60 md:pt-0 pb-0 wow fadeInUp">
                <div class="row grid-base">
                    <!--Column-->
                    <div class="counter-column mb-0 col-lg-4 col-md-4 col-sm-12 wow fadeInUp">
                        <div class="count-box"><span class="count-text" data-speed="3000" data-stop="4">0</span>M</div>
                        <h4 class="counter-title">4 million daily active users</h4>
                    </div>

                    <!--Column-->
                    <div class="counter-column mb-0 col-lg-4 col-md-4 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
                        <div class="count-box"><span class="count-text" data-speed="3000" data-stop="12">0</span>k</div>
                        <h4 class="counter-title">Over 12k open job positions</h4>
                    </div>

                    <!--Column-->
                    <div class="counter-column mb-0 col-lg-4 col-md-4 col-sm-12 wow fadeInUp" data-wow-delay="800ms">
                        <div class="count-box"><span class="count-text" data-speed="3000" data-stop="20">0</span>M</div>
                        <h4 class="counter-title">Over 20 million stories shared</h4>
                    </div>
                </div>
            </div>
            <!-- Fun Fact Section -->
        </div>
    </section>
    <!-- End Section -->

    <!-- Pricing Section -->
    <section class="layout-pt-60 layout-pb-60">
        <div class="auto-container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="sec-title -type-2 text-center">
                        <h2>Choose a plan that’s right for you.</h2>
                        <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna</div>
                    </div>
                </div>
            </div>

            <div class="row grid-base wow fadeInUp">

                <div class="col-lg-4 col-md-6">
                    <div class="pricingCard -type-2">
                        <h4 class="pricingCard__title">Start Up</h4>
                        <div class="pricingCard__price">Free</div>
                        <div class="pricingCard__subtitle">per month</div>

                        <div class="pricingCard__img">
                            <img src="{{ asset('images') }}/index-13/pricing/1.svg" alt="images">
                        </div>

                        <div class="pricingCard__text text-left">Standard listing submission, active for 30 days</div>

                        <ul class="pricingCard__list">
                            <li>All Operating Supported</li>
                            <li>Great Interface</li>
                            <li>Allows encryption</li>
                            <li>Face recognized system</li>
                            <li>24/7 Full support</li>
                        </ul>

                        <div class="pricingCard__btn">
                            <a href="#" class="theme-btn btn-style-modern">
                                Join This Plan
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="pricingCard -type-2">
                        <h4 class="pricingCard__title">Company</h4>
                        <div class="pricingCard__price">$599.95</div>
                        <div class="pricingCard__subtitle">per month</div>

                        <div class="pricingCard__img">
                            <img src="{{ asset('images') }}/index-13/pricing/2.svg" alt="images">
                        </div>

                        <div class="pricingCard__text text-left">Standard listing submission, active for 30 days</div>

                        <ul class="pricingCard__list">
                            <li>All Operating Supported</li>
                            <li>Great Interface</li>
                            <li>Allows encryption</li>
                            <li>Face recognized system</li>
                            <li>24/7 Full support</li>
                        </ul>

                        <div class="pricingCard__btn">
                            <a href="#" class="theme-btn btn-style-modern">
                                Join This Plan
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="pricingCard -type-2">
                        <h4 class="pricingCard__title">Enterprise</h4>
                        <div class="pricingCard__price">$999.95</div>
                        <div class="pricingCard__subtitle">per month</div>

                        <div class="pricingCard__img">
                            <img src="{{ asset('images') }}/index-13/pricing/3.svg" alt="images">
                        </div>

                        <div class="pricingCard__text text-left">Standard listing submission, active for 30 days</div>

                        <ul class="pricingCard__list">
                            <li>All Operating Supported</li>
                            <li>Great Interface</li>
                            <li>Allows encryption</li>
                            <li>Face recognized system</li>
                            <li>24/7 Full support</li>
                        </ul>

                        <div class="pricingCard__btn">
                            <a href="#" class="theme-btn btn-style-modern">
                                Join This Plan
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Pricing Section -->

    <!-- Job Categories -->
    <section class="layout-pt-60 layout-pb-60">
        <div class="auto-container">
            <div class="row justify-content-between align-items-end">
                <div class="col-lg-6">
                    <div class="">
                        <h2 class="fw-700">Latest news</h2>
                        <div class="text mt-9">Consectetur adipisicing elit, sed do eiusmod temp</div>
                    </div>
                </div>

                <div class="col-auto">
                    <a href="#" class="button-icon -arrow">Browse All</a>
                </div>
            </div>

            <div class="row grid-base pt-50 wow fadeInUp">

                <!-- Blog Block -->
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="blog -type-1">
                        <div class="blog-image">
                            <img src="{{ asset('images') }}/index-12/news/1.png" alt="image">
                        </div>

                        <div class="blog-content">
                            <div>November 23, 2021</div>
                            <h4><a href="#">Free advertising for your<br> online business</a></h4>
                        </div>
                    </div>
                </div>

                <!-- Blog Block -->
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="blog -type-1">
                        <div class="blog-image">
                            <img src="{{ asset('images') }}/index-12/news/2.png" alt="image">
                        </div>

                        <div class="blog-content">
                            <div>November 23, 2021</div>
                            <h4><a href="#">Free advertising for your<br> online business</a></h4>
                        </div>
                    </div>
                </div>

                <!-- Blog Block -->
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="blog -type-1">
                        <div class="blog-image">
                            <img src="{{ asset('images') }}/index-12/news/3.png" alt="image">
                        </div>

                        <div class="blog-content">
                            <div>November 23, 2021</div>
                            <h4><a href="#">Free advertising for your<br> online business</a></h4>
                        </div>
                    </div>
                </div>

                <!-- Blog Block -->
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="blog -type-1">
                        <div class="blog-image">
                            <img src="{{ asset('images') }}/index-12/news/4.png" alt="image">
                        </div>

                        <div class="blog-content">
                            <div>November 23, 2021</div>
                            <h4><a href="#">Free advertising for your<br> online business</a></h4>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Job Categories -->

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
                            <a href="#" class="theme-btn">Post a Job</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Subscribe Section -->
@endsection

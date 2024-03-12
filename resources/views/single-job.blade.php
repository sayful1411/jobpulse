@extends('layouts.app')

@section('title', $job->title . ' | ' . config('app.name'))

@section('content')
    <section class="job-detail-section">
        <!-- Upper Box -->
        <div class="upper-box">
            <div class="auto-container">
                <!-- Job Block -->
                <div class="job-block-seven" style="padding-top: 50px">
                    <div class="inner-box">
                        <div class="content">
                            <span class="company-logo">
                                @if ($job->company && $job->company->image_url)
                                    <img class="rounded-circle" src="{{ asset($job->company->image_url) }}"
                                        alt="Company Image">
                                @endif
                            </span>
                            <h4>{{ $job->title }}</h4>
                            <ul class="job-info">
                                <li><span class="icon flaticon-map-locator"></span>{{ $job->location }}
                                </li>
                                <li><span class="icon flaticon-clock-3"></span>{{ $job->created_at->diffForHumans() }}
                                </li>
                                <li><span
                                        class="icon flaticon-money"></span>{{ '$' . number_format($job->min_salary) . ' - ' . '$' . number_format($job->max_salary) }}
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
                        </div>

                        <div class="btn-box">
                            <a href="{{ route('apply.job', $job->slug) }}" class="theme-btn btn-style-one">Apply For Job</a>
                            <button class="bookmark-btn"><i class="flaticon-bookmark"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="job-detail-outer">
            <div class="auto-container">
                <div class="row">
                    <div class="content-column col-lg-8 col-md-12 col-sm-12">
                        <div class="job-detail">
                            {!! $job->description !!}
                        </div>

                        <!-- Related Jobs -->
                        {{-- <div class="related-jobs">
                            <div class="title-box">
                                <h3>Related Jobs</h3>
                                <div class="text">2020 jobs live - 293 added today.</div>
                            </div>

                            <!-- Job Block -->
                            <div class="job-block">
                                <div class="inner-box">
                                    <div class="content">
                                        <span class="company-logo"><img src="images/resource/company-logo/1-1.png"
                                                alt=""></span>
                                        <h4><a href="#">Software Engineer (Android), Libraries</a></h4>
                                        <ul class="job-info">
                                            <li><span class="icon flaticon-briefcase"></span> Segment</li>
                                            <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                                            <li><span class="icon flaticon-clock-3"></span> 11 hours ago</li>
                                            <li><span class="icon flaticon-money"></span> $35k - $45k</li>
                                        </ul>
                                        <ul class="job-other-info">
                                            <li class="time">Full Time</li>
                                            <li class="privacy">Private</li>
                                            <li class="required">Urgent</li>
                                        </ul>
                                        <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                                    </div>
                                </div>
                            </div>

                            <!-- Job Block -->
                            <div class="job-block">
                                <div class="inner-box">
                                    <div class="content">
                                        <span class="company-logo"><img src="images/resource/company-logo/1-2.png"
                                                alt=""></span>
                                        <h4><a href="#">Recruiting Coordinator</a></h4>
                                        <ul class="job-info">
                                            <li><span class="icon flaticon-briefcase"></span> Segment</li>
                                            <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                                            <li><span class="icon flaticon-clock-3"></span> 11 hours ago</li>
                                            <li><span class="icon flaticon-money"></span> $35k - $45k</li>
                                        </ul>
                                        <ul class="job-other-info">
                                            <li class="time">Full Time</li>
                                            <li class="privacy">Private</li>
                                            <li class="required">Urgent</li>
                                        </ul>
                                        <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                                    </div>
                                </div>
                            </div>

                            <!-- Job Block -->
                            <div class="job-block">
                                <div class="inner-box">
                                    <div class="content">
                                        <span class="company-logo"><img src="images/resource/company-logo/1-3.png"
                                                alt=""></span>
                                        <h4><a href="#">Product Manager, Studio</a></h4>
                                        <ul class="job-info">
                                            <li><span class="icon flaticon-briefcase"></span> Segment</li>
                                            <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                                            <li><span class="icon flaticon-clock-3"></span> 11 hours ago</li>
                                            <li><span class="icon flaticon-money"></span> $35k - $45k</li>
                                        </ul>
                                        <ul class="job-other-info">
                                            <li class="time">Full Time</li>
                                            <li class="privacy">Private</li>
                                            <li class="required">Urgent</li>
                                        </ul>
                                        <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                                    </div>
                                </div>
                            </div>

                        </div> --}}
                    </div>

                    <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
                        <aside class="sidebar">
                            <div class="sidebar-widget">
                                <!-- Job Overview -->
                                <h4 class="widget-title">Job Overview</h4>
                                <div class="widget-content">
                                    <ul class="job-overview">
                                        <li>
                                            <i class="icon icon-calendar"></i>
                                            <h5>Date Posted:</h5>
                                            <span>Posted {{ $job->created_at->diffForHumans() }}</span>
                                        </li>
                                        <li>
                                            <i class="icon icon-expiry"></i>
                                            <h5>Expiration date:</h5>
                                            <span>{{ $job->expiration_date->format('F d, Y') }}</span>
                                        </li>
                                        <li>
                                            <i class="icon icon-location"></i>
                                            <h5>Location:</h5>
                                            <span>{{ $job->location }}</span>
                                        </li>
                                        <li>
                                            <i class="icon icon-user-2"></i>
                                            <h5>Job Type:</h5>
                                            <span>{{ $job->job_type }}</span>
                                        </li>
                                        <li>
                                            <i class="icon icon-salary"></i>
                                            <h5>Salary:</h5>
                                            <span>{{ '$' . $job->min_salary . ' - ' . '$' . $job->max_salary }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="sidebar-widget company-widget">
                                <div class="widget-content">
                                    <div class="company-title">
                                        <div class="company-logo">
                                            @if ($job->company && $job->company->image_url)
                                                <img class="rounded-circle" src="{{ asset($job->company->image_url) }}"
                                                    alt="Company Image">
                                            @endif
                                        </div>
                                        <h5 class="company-name">{{ $job->company->name }}</h5>
                                        <a href="#" class="profile-link">View company profile</a>
                                    </div>

                                    <ul class="company-info">
                                        <li>Primary industry: <span>{{ $job->company->industry_type }}</span></li>
                                        {{-- <li>Company size: <span>501-1,000</span></li>
                                        <li>Founded in: <span>2011</span></li> --}}
                                        <li>Phone: <span>{{ $job->company->phone }}</span></li>
                                        <li>Email: <span>{{ $job->company->email }}</span></li>
                                        <li>Location: <span id="location"></span></li>
                                        {{-- <li>Social media:
                                            <div class="social-links">
                                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                                <a href="#"><i class="fab fa-instagram"></i></a>
                                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                            </div>
                                        </li> --}}
                                    </ul>

                                    <div class="btn-box"><a href="{{ $job->company->website }}"
                                            class="theme-btn btn-style-three">{{ $job->company->website }}</a></div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        var storedCountry = "{{ $job->company->country }}";
        var storedCityId = "{{ $job->company->city }}";
        var apiKey = "{{ config('app.country_state_city_api_key') }}";

        var fetchCountry = {
            "url": "https://api.countrystatecity.in/v1/countries/" + storedCountry,
            "method": "GET",
            "headers": {
                "X-CSCAPI-KEY": apiKey
            },
        };

        // get country
        $.ajax(fetchCountry).done(function(response) {
            var countryName = response.name;
            var fetchCity = {
                "url": "https://api.countrystatecity.in/v1/countries/" + storedCountry + "/cities",
                "method": "GET",
                "headers": {
                    "X-CSCAPI-KEY": apiKey
                },
            };

            // get city
            $.ajax(fetchCity).done(function(response) {
                var cityName = null;

                response.forEach(function(city) {
                    if (city.id == storedCityId) {
                        cityName = city.name;
                        return false;
                    }
                });

                if (cityName) {
                    var locationName = cityName + ", " + countryName;
                    $('#location').text(locationName);
                }
            });
        });
    </script>
@endpush

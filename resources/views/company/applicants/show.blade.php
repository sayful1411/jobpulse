@extends('layouts.master')

@section('title', 'All Applicants for | ' . config('app.name'))

@section('content')
    <section class="user-dashboard">
        <div class="dashboard-outer">
            <div class="upper-title-box">
                <h3>All Aplicants</h3>
                <div class="text">Ready to jump back in?</div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Ls widget -->
                    <div class="ls-widget">
                        <div class="tabs-box">
                            <div class="widget-title">
                                <h4>Applicant</h4>

                                <div class="chosen-outer">
                                    <!--Tabs Box-->
                                    <select class="chosen-select" style="display: none;">
                                        <option>Select Jobs</option>
                                        <option>Last 12 Months</option>
                                        <option>Last 16 Months</option>
                                        <option>Last 24 Months</option>
                                        <option>Last 5 year</option>
                                    </select>

                                    <!--Tabs Box-->
                                    <select class="chosen-select" style="display: none;">
                                        <option>All Status</option>
                                        <option>Last 12 Months</option>
                                        <option>Last 16 Months</option>
                                        <option>Last 24 Months</option>
                                        <option>Last 5 year</option>
                                    </select>
                                </div>
                            </div>

                            <div class="widget-content">

                                <div class="tabs-box">
                                    <div class="aplicants-upper-bar">
                                        <h6>{{ $job->title }}</h6>
                                        <ul class="aplicantion-status tab-buttons clearfix">
                                            <li class="tab-btn active-btn totals" data-tab="#totals">Total(s):
                                                {{ $job->candidates->count() }}</li>
                                            <li class="tab-btn approved" data-tab="#approved">Approved: </li>
                                            <li class="tab-btn rejected" data-tab="#rejected">Rejected(s): </li>
                                        </ul>
                                    </div>

                                    <div class="tabs-content">
                                        <!--Tab-->
                                        <div class="tab active-tab" id="totals">
                                            <div class="row">
                                                <!-- Candidate block three -->
                                                @foreach ($job->candidates as $candidate)
                                                    <div class="candidate-block-three col-lg-6 col-md-12 col-sm-12">
                                                        <div class="inner-box">
                                                            <div class="content">
                                                                @if ($candidate->image_url)
                                                                    <figure class="image"><img
                                                                            src="{{ asset($candidate->image_url) }}"
                                                                            alt="">
                                                                    </figure>
                                                                @else
                                                                    <figure class="image"><img
                                                                            src="{{ asset(\App\Models\User::PLACEHOLDER_IMAGE_PATH) }}"
                                                                            alt="">
                                                                    </figure>
                                                                @endif
                                                                <h4 class="name"><a
                                                                        href="#">{{ $candidate->name }}</a>
                                                                </h4>
                                                                <ul class="candidate-info">
                                                                    <li>
                                                                        <span class="icon flaticon-map-locator"></span>
                                                                        {{ $candidate->profile->address }}
                                                                    </li>
                                                                    <li>
                                                                        <span class="icon flaticon-money"></span>
                                                                        {{ $candidate->pivot->expected_salary }}
                                                                    </li>
                                                                </ul>
                                                                <ul class="post-tags">
                                                                    @foreach (collect($candidate->skill->skills)->shuffle()->slice(0, 3) as $skill)
                                                                        <li><a href="#">{{ $skill }}</a></li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                            <div class="option-box">
                                                                <ul class="option-list">
                                                                    <li><button data-text="View Aplication"><span
                                                                                class="la la-eye"></span></button></li>
                                                                    <li><button data-text="Approve Aplication"><span
                                                                                class="la la-check"></span></button></li>
                                                                    <li><button data-text="Reject Aplication"><span
                                                                                class="la la-times-circle"></span></button>
                                                                    </li>
                                                                    <li><button data-text="Delete Aplication"><span
                                                                                class="la la-trash"></span></button></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

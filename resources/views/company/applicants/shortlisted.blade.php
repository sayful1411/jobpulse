@extends('layouts.master')

@section('title', 'Shorlisted Resumes for | ' . config('app.name'))

@section('content')
    <section class="user-dashboard">
        <div class="dashboard-outer">
            <div class="upper-title-box">
                <h3>Shorlisted Resumes!</h3>
                <div class="text">Ready to jump back in?</div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Ls widget -->
                    <div class="ls-widget">
                        <div class="tabs-box">
                            <div class="widget-title">
                                <h4>Shorlist Resumes</h4>

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
                                            <li class="tab-btn approved" data-tab="#approved">Approved:
                                                {{ $job->approvedApplicationsCount() }}
                                            </li>
                                            <li class="tab-btn rejected" data-tab="#rejected">Rejected(s):
                                                {{ $job->rejectedApplicationsCount() }}
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="tabs-content">
                                        <!--Tab-->
                                        <div class="tab active-tab" id="totals">
                                            <div class="row">
                                                <!-- Candidate block three -->
                                                @foreach ($approvedApplicants as $applicant)
                                                    <div
                                                        class="candidate-block-three col-lg-6 col-md-12 col-sm-12 relative">
                                                        <p class="application-status approved">Approved</p>
                                                        <div class="inner-box">
                                                            <div class="content">
                                                                @if ($applicant->candidate->image_url)
                                                                    <figure class="image"><img
                                                                            src="{{ asset($applicant->candidate->image_url) }}"
                                                                            alt="">
                                                                    </figure>
                                                                @else
                                                                    <figure class="image"><img
                                                                            src="{{ asset(\App\Models\User::PLACEHOLDER_IMAGE_PATH) }}"
                                                                            alt="">
                                                                    </figure>
                                                                @endif
                                                                <h4 class="name"><a
                                                                        href="#">{{ $applicant->candidate->name }}</a>
                                                                </h4>
                                                                <ul class="candidate-info">
                                                                    <li>
                                                                        <span class="icon flaticon-map-locator"></span>
                                                                        {{ $applicant->candidate->profile->address }}
                                                                    </li>
                                                                    <li>
                                                                        <span class="icon flaticon-money"></span>
                                                                        {{ $applicant->expected_salary }}
                                                                    </li>
                                                                </ul>
                                                                <ul class="post-tags">
                                                                    @foreach (collect($applicant->candidate->skill->skills)->shuffle()->slice(0, 3) as $skill)
                                                                        <li><a href="#">{{ $skill }}</a></li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                                @if ($approvedApplicants->count() == 0)
                                                    <h6 class="text-center pb-3"> No <span class="text-success">APPROVED</span> applications found yet </h6>
                                                @endif
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

@push('css')
    <style>
        .application-status.approved {
            position: absolute !important;
            top: 5px;
            right: 20px;
            z-index: 9;
            padding: 5px 20px;
            border-radius: 50px;
            background: rgb(0 150 136 / 16%) !important;
            color: #009688 !important;
        }
    </style>
@endpush

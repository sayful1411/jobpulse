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
                                <h4>Applicants</h4>

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
                                            <li class="totals">Total(s):
                                                {{ $job->candidates->count() }}</li>
                                            <a href="{{ route('applications.shortlists', $job->id) }}">
                                                <li class="approved">Approved:
                                                    {{ $job->approvedApplicationsCount() }}
                                                </li>
                                            </a>
                                            <li class="rejected">Rejected(s):
                                                {{ $job->rejectedApplicationsCount() }}
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="tabs-content">
                                        <!--Tab-->
                                        <div class="tab active-tab" id="totals">
                                            <div class="row">
                                                <!-- Candidate block three -->
                                                @foreach ($applicants as $applicant)
                                                    <div
                                                        class="candidate-block-three col-lg-6 col-md-12 col-sm-12 relative">
                                                        {{-- <p class="application-status pending">Pending</p> --}}
                                                        <p
                                                            class="application-status {{ $applicant->status == 'rejected' ? 'rejected' : 'pending' }}">
                                                            {{ $applicant->status == 'rejected' ? 'Rejected' : 'Pending' }}
                                                        </p>
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
                                                                        href="#">{{ $applicant->name }}</a>
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
                                                            <div class="option-box">
                                                                <ul class="option-list">
                                                                    <li>
                                                                        <a href="{{ route('applications.view', $applicant->candidate->id) }}">
                                                                            <button data-text="View Aplication">
                                                                                <span class="la la-eye"></span>
                                                                            </button>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <form method="POST"
                                                                            action="{{ route('applications.approve', [$applicant->candidate->id, $job->id]) }}">
                                                                            @csrf
                                                                            <button data-text="Approve Aplication">
                                                                                <span class="la la-check"></span>
                                                                            </button>
                                                                        </form>
                                                                    </li>
                                                                    <li>
                                                                        <form method="POST"
                                                                            action="{{ route('applications.reject', [$applicant->candidate->id, $job->id]) }}">
                                                                            @csrf
                                                                            <button type="submit"
                                                                                data-text="Reject Aplication">
                                                                                <span class="la la-times-circle"></span>
                                                                            </button>
                                                                        </form>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                                @if ($applicants->count() == 0)
                                                    <h6 class="text-center pb-3"> No applications found yet </h6>
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
        .application-status.pending {
            position: absolute !important;
            top: 5px;
            right: 20px;
            z-index: 9;
            padding: 5px 20px;
            border-radius: 50px;
            background: rgba(249, 171, 0, 0.15) !important;
            color: #f9ab00 !important;
        }

        .application-status.rejected {
            position: absolute !important;
            top: 5px;
            right: 20px;
            z-index: 9;
            padding: 5px 20px;
            border-radius: 50px;
            background: rgb(217 48 37 / 18%) !important;
            color: #d93025 !important;
        }
    </style>
@endpush

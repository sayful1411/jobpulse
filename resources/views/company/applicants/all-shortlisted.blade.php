@extends('layouts.master')

@section('title', 'Shorlisted Resumes | ' . config('app.name'))

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
                                <h4>Shorlisted Resumes by each Job</h4>

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

                                @foreach ($jobs as $job)
                                    <div class="tabs-box">
                                        <div class="aplicants-upper-bar">
                                            <a href="{{ route('applications.shortlists', $job->id) }}">
                                                <h6>{{ $job->title }}</h6>
                                            </a>
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
                                    </div>
                                @endforeach
                                <!-- Pagination -->
                                <div>
                                    {{ $jobs->links('vendor.pagination.simple-bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

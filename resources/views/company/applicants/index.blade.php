@extends('layouts.master')

@section('title', 'All Applicants | ' . config('app.name'))

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

                                @foreach ($jobs as $job)
                                    <div class="tabs-box">
                                        <div class="aplicants-upper-bar">
                                            <a href="{{ route('applicants.show', $job->id) }}">
                                                <h6>{{ $job->title }}</h6>
                                            </a>
                                            <ul class="aplicantion-status tab-buttons clearfix">
                                                <li class="tab-btn active-btn totals" data-tab="#totals">Total(s):
                                                    {{ $job->candidates->count() }}</li>
                                                <li class="tab-btn approved" data-tab="#approved">Approved: </li>
                                                <li class="tab-btn rejected" data-tab="#rejected">Rejected(s): </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

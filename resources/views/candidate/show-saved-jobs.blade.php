@extends('layouts.master')

@section('title', 'Saved Jobs | ' . config('app.name'))

@section('content')
    <section class="user-dashboard">
        <div class="dashboard-outer">
            <div class="upper-title-box">
                <h3>Saved Jobs</h3>
                <div class="text">Ready to jump back in?</div>
            </div>

            <div class="row">
                <div class="col-lg-12">

                    <div>
                        <!-- Ls widget -->
                        <div class="ls-widget">
                            <div class="tabs-box">
                                <div class="widget-title">
                                    <h4>My Saved Jobs</h4>
                                </div>

                                <div class="widget-content">
                                    <div class="table-outer">
                                        <table class="default-table manage-job-table">
                                            <thead>
                                                <tr>
                                                    <th>Job Title</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($savedJobs as $job)
                                                    <tr>
                                                        <td>
                                                            <!-- Job Block -->
                                                            <div class="job-block">
                                                                <div class="inner-box">
                                                                    <div class="content">
                                                                        <span class="company-logo">
                                                                            @if ($job->company && $job->company->image_url)
                                                                                <img class="rounded-circle"
                                                                                    src="{{ asset($job->company->image_url) }}"
                                                                                    alt="Company Image">
                                                                            @endif
                                                                        </span>
                                                                        <h4>
                                                                            <a href="{{ route('single.job', $job->slug) }}">
                                                                                {{ $job->title }}
                                                                            </a>
                                                                        </h4>
                                                                        <ul class="job-info">
                                                                            <li><span
                                                                                    class="icon flaticon-map-locator"></span>{{ $job->location }}
                                                                            </li>
                                                                            <li><span
                                                                                    class="icon flaticon-money"></span>{{ '$' . number_format($job->min_salary) . ' - ' . '$' . number_format($job->max_salary) }}
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td
                                                            class="@if ($job->status === 'Active') text-green @else text-red @endif">
                                                            {{ $job->status }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="mt-4">
                                            {{ $savedJobs->links('vendor.pagination.simple-bootstrap-5') }}
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

@extends('layouts.master')

@section('title', 'All Job | ' . config('app.name'))

@section('content')
    <section class="user-dashboard">
        <div class="dashboard-outer">
            <div class="upper-title-box">
                <h3>Manage Jobs</h3>
                <div class="text">Ready to jump back in?</div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Ls widget -->
                    <div class="ls-widget">
                        <div class="tabs-box">
                            <div class="widget-title">
                                <h4>My Job Listings</h4>

                                <div class="chosen-outer">
                                    <!--Tabs Box-->
                                    <select class="chosen-select" style="display: none;">
                                        <option>Last 6 Months</option>
                                        <option>Last 12 Months</option>
                                        <option>Last 16 Months</option>
                                        <option>Last 24 Months</option>
                                        <option>Last 5 year</option>
                                    </select>
                                </div>
                            </div>

                            <div class="widget-content">
                                <div class="table-outer">
                                    <table class="default-table manage-job-table">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Applications</th>
                                                <th>Created &amp; Expired</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($jobs as $job)
                                                <tr>
                                                    <td>
                                                        <h6>{{ $job->title }}</h6>
                                                        <span class="info">
                                                            <i class="icon flaticon-map-locator"></i>
                                                            {{ $job->location }}
                                                        </span>
                                                    </td>
                                                    <td class="applied"><a href="#">3+ Applied</a></td>
                                                    <td>{{ $job->created_at->format('M d, Y') }}<br>{{ $job->expiration_date->format('M d, Y') }}
                                                    </td>
                                                    <td>
                                                        @if ($job->expiration_data >= now())
                                                            <p style="color: #df5e1d">Inactive</p>
                                                        @else
                                                            <p style="color: #34A853">Active</p>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="option-box">
                                                            <ul class="option-list">
                                                                <li>
                                                                    <button data-text="View Jobs">
                                                                        <span class="la la-eye"></span>
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <a href="{{ route('jobs.edit', $job->id) }}">
                                                                        <button data-text="Edit Jobs">
                                                                            <span class="la la-pencil"></span>
                                                                        </button>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <button data-text="Delete Jobs">
                                                                        <span class="la la-trash"></span>
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td>{{ $jobs->links() }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection

<div>
    <!-- Ls widget -->
    <div class="ls-widget">
        <div class="tabs-box">
            <div class="widget-title">
                <h4>My Applied Jobs</h4>
            </div>

            <div class="widget-content">
                <div class="table-outer">
                    <table class="default-table manage-job-table">
                        <thead>
                            <tr>
                                <th>Job Title</th>
                                <th>Date Applied</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($appliedJobs as $appliedJob)
                                <tr>
                                    <td>
                                        <!-- Job Block -->
                                        <div class="job-block">
                                            <div class="inner-box">
                                                <div class="content">
                                                    <span class="company-logo">
                                                        @if ($appliedJob->job->company && $appliedJob->job->company->image_url)
                                                            <img class="rounded-circle"
                                                                src="{{ asset($appliedJob->job->company->image_url) }}"
                                                                alt="Company Image">
                                                        @endif
                                                    </span>
                                                    <h4>
                                                        <a href="#">
                                                            {{ $appliedJob->job->title }}
                                                        </a>
                                                    </h4>
                                                    <ul class="job-info">
                                                        <li><span
                                                                class="icon flaticon-map-locator"></span>{{ $appliedJob->job->location }}
                                                        </li>
                                                        <li><span
                                                                class="icon flaticon-money"></span>{{ '$' . number_format($appliedJob->job->min_salary) . ' - ' . '$' . number_format($appliedJob->job->max_salary) }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $appliedJob->created_at->format('M d, Y') }}</td>
                                    <td class="@if ($appliedJob->status === 'Active') text-green @else text-red @endif">
                                        {{ $appliedJob->status }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $appliedJobs->links('vendor.livewire.simple-bootstrap') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div>
    <!-- Filter -->
    <div class="ls-switcher">
        <div class="showing-result">
            <div class="top-filters">
                <div class="form-group">
                    <select class="form-select" wire:model.live="locationFilter">
                        <option value="">Anywhere</option>
                        <option value="bangladesh">Bangladesh</option>
                        <option value="uk">UK</option>
                        <option value="usa">USA</option>
                    </select>
                </div>

                <div class="form-group">
                    <select class="form-select" wire:model.live="dateFilter">
                        <option value="">Any Time</option>
                        <option value="past_month">Past Month</option>
                        <option value="past_week">Past Week</option>
                        <option value="past_24_hours">Past 24 Hours</option>
                    </select>
                </div>

                <div class="form-group">
                    <select class="form-select" wire:model.live="salaryFilter">
                        <option value="">Salary estimate</option>
                        <option value="10k">-10k</option>
                        <option value="20k">20K - 30K</option>
                        <option value="30k">30K - 50K</option>
                        <option value="60k">60K - 90K</option>
                        <option value="100k">100K+</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="sort-by">
            <div class="form-group me-2">
                <select class="form-select" wire:model.live="jobTypeFilter">
                    <option value="">Job Type</option>
                    <option value="Full Time">Full Time</option>
                    <option value="Internship">Internship</option>
                    <option value="Part Time">Part Time</option>
                    <option value="Remote">Remote</option>
                </select>
            </div>

            <div class="form-group">
                <select class="form-select" wire:model.live="perPageFilter">
                    <option value="10">Show 10</option>
                    <option value="20">Show 20</option>
                    <option value="30">Show 30</option>
                    <option value="40">Show 40</option>
                    <option value="50">Show 50</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Jobs -->
    <div class="row" wire:loading.class="opacity-50">
        <!-- Job Block -->
        @foreach ($jobs as $job)
            <div class="job-block col-lg-6 col-md-12 col-sm-12">
                <div class="inner-box">
                    <div class="content">
                        <span class="company-logo">
                            @if ($job->company && $job->company->image_url)
                                <img class="rounded-circle" src="{{ asset($job->company->image_url) }}"
                                    alt="Company Image">
                            @endif
                        </span>
                        <h4><a href="{{ route('single.job', $job->slug) }}">{{ $job->title }}</a></h4>
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

                        @if ($job->isSavedByUser())
                            <button class="bookmark-btn"><span class="la la-check"></span></button>
                        @else
                            <a href="{{ route('save-job', $job->slug) }}">
                                <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                            </a>
                        @endif

                    </div>
                </div>
            </div>
        @endforeach

        @if ($jobs->isEmpty())
            <h4 class="text-center">No Jobs found.</h4>
        @endif
    </div>

    <!-- Pagination -->
    <div>
        {{ $jobs->links('vendor.livewire.simple-bootstrap') }}
    </div>
</div>

@extends('layouts.master')

@section('title', 'Applicant Profile | ' . config('app.name'))

@section('content')
    <section class="candidate-detail-section">
        <!-- Upper Box -->
        <div class="upper-box">
            <div class="auto-container">
                <!-- Candidate block Five -->
                <div class="candidate-block-five">
                    <div class="inner-box">
                        <div class="content">
                            @if ($candidate->image_url)
                                <figure class="image"><img src="{{ asset($candidate->image_url) }}" alt="">
                                </figure>
                            @else
                                <figure class="image"><img src="{{ asset(\App\Models\User::PLACEHOLDER_IMAGE_PATH) }}"
                                        alt="">
                                </figure>
                            @endif
                            <h4 class="name">{{ $candidate->name }}</h4>
                            <ul class="candidate-info">
                                <li><span class="icon flaticon-map-locator"></span>{{ $candidate->profile->address }}</li>
                                <li><span class="icon flaticon-clock"></span> Member Since,
                                    {{ $candidate->created_at->format('F d, Y') }}</li>
                            </ul>
                            <ul class="post-tags">
                                @foreach (collect($candidate->skill->skills)->shuffle()->slice(0, 3) as $skill)
                                    <li><a href="#">{{ $skill }}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="btn-box">
                            <a href="#" class="theme-btn btn-style-one">Download CV</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="candidate-detail-outer bg-white">
            <div class="auto-container">
                <div class="row">
                    <div class="content-column col-lg-8 col-md-12 col-sm-12">
                        <div class="job-detail">
                            <h4>Candidates About</h4>
                            <p>{{ $candidate->profile->bio }}</p>

                            <!-- Resume / Education -->
                            <div class="resume-outer">
                                <div class="upper-title">
                                    <h4>Education</h4>
                                </div>
                                @foreach ($candidate->educations as $education)
                                    <!-- Resume BLock -->
                                    <div class="resume-block">
                                        <div class="inner">
                                            <span class="name">{{ substr($education->institute_name, 0, 1) }}</span>
                                            <div class="title-box">
                                                <div class="info-box">
                                                    <h3>{{ $education->degree_name }}</h3>
                                                    <span>{{ $education->institute_name }}</span>
                                                </div>
                                                <div class="edit-box">
                                                    <span class="year">PASS IN:
                                                        {{ $education->passing_year }}</span>
                                                    <div class="edit-btns">
                                                        <a href="{{ route('education.edit', $education->id) }}">
                                                            <button><span class="la la-pencil"></span></button>
                                                        </a>
                                                        <form method="POST"
                                                            action="{{ route('education.destroy', $education->id) }}">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" class="education_popup"
                                                                title='Delete Education'><span
                                                                    class="la la-trash"></span></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text">
                                                <li>Major: {{ $education->major }}</li>
                                                <li>Major: {{ $education->result }}</li>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            @if ($candidate->experiences && $candidate->experiences->count() > 0)
                                <!-- Resume / Work & Experience -->
                                <div class="resume-outer theme-blue">
                                    <div class="upper-title">
                                        <h4>Work &amp; Experience</h4>
                                    </div>
                                    @foreach ($candidate->experiences as $experience)
                                        <!-- Resume BLock -->
                                        <div class="resume-block">
                                            <div class="inner">
                                                <span class="name">{{ substr($experience->company_name, 0, 1) }}</span>
                                                <div class="title-box">
                                                    <div class="info-box">
                                                        <h3>{{ $experience->department }}</h3>
                                                        <span>{{ $experience->company_name }}</span>
                                                    </div>
                                                    <div class="edit-box">
                                                        <span class="year">
                                                            @if ($experience->is_currently_working)
                                                                {{ $experience->join->format('Y') . ' - ' . 'Current' }}
                                                            @else
                                                                {{ $experience->join->format('Y') . ' - ' . $experience->resign->format('Y') }}
                                                            @endif
                                                        </span>
                                                        <div class="edit-btns">
                                                            <a href="{{ route('experience.edit', $experience->id) }}">
                                                                <button><span class="la la-pencil"></span></button>
                                                            </a>
                                                            <form method="POST"
                                                                action="{{ route('experience.destroy', $experience->id) }}">
                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="submit" class="experience_popup"
                                                                    title='Delete Experience'><span
                                                                        class="la la-trash"></span></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text">{{ $experience->responsibilities }}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
                        <aside class="sidebar">
                            <div class="sidebar-widget">
                                <div class="widget-content">
                                    <ul class="job-overview">

                                        @if ($candidate->othersInformation->current_salary)
                                            <li>
                                                <i class="icon icon-rate"></i>
                                                <h5>Current Salary:</h5>
                                                <span>{{ $candidate->othersInformation->current_salary }}</span>
                                            </li>
                                        @endif

                                        @if ($candidate->othersInformation->expected_salary)
                                            <li>
                                                <i class="icon icon-salary"></i>
                                                <h5>Expected Salary:</h5>
                                                <span>{{ $candidate->othersInformation->expected_salary }}</span>
                                            </li>
                                        @endif

                                        <li>
                                            <i class="icon icon-user-2"></i>
                                            <h5>Gender:</h5>
                                            <span>{{ $candidate->profile->gender }}</span>
                                        </li>

                                        <li>
                                            <i class="icon icon-envelope"></i>
                                            <h5>Email:</h5>
                                            <span>{{ $candidate->email }}</span>
                                        </li>

                                        <li>
                                            <i class="icon icon-phone"></i>
                                            <h5>Phone:</h5>
                                            <span>{{ $candidate->phone }}</span>
                                        </li>

                                    </ul>
                                </div>

                            </div>

                            <div class="sidebar-widget social-media-widget">
                                <h4 class="widget-title">Social media</h4>
                                <div class="widget-content">
                                    <div class="social-links">
                                        <a href="{{ $candidate->socialAccountsInformation[0]->url ?? '#' }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a href="{{ $candidate->socialAccountsInformation[1]->url ?? '#' }}" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a href="{{ $candidate->socialAccountsInformation[2]->url ?? '#' }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                        <a href="{{ $candidate->socialAccountsInformation[3]->url ?? '#' }}" target="_blank"><i class="fab fa-google-plus"></i></a>
                                    </div>
                                </div>
                            </div>


                            <div class="sidebar-widget">
                                <!-- Job Skills -->
                                <h4 class="widget-title">Professional Skills</h4>
                                <div class="widget-content">
                                    <ul class="job-skills">
                                        @foreach ($candidate->skill->skills as $skill)
                                            <li><a href="#">{{ $skill }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

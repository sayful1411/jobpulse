@extends('layouts.master')

@section('title', 'Candidate Resume | ' . config('app.name'))

@section('content')
    <section class="user-dashboard">
        <div class="dashboard-outer">
            <div class="upper-title-box">
                <h3>My Resume</h3>
                <div class="text">Ready to jump back in?</div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Ls widget -->
                    <div class="ls-widget">
                        <div class="tabs-box">
                            <div class="widget-title">
                                <h4>My Profile</h4>
                            </div>

                            <div class="widget-content">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <div class="row">
                                    <form method="POST" action="{{ route('candidate.bio') }}" class="default-form">
                                        @csrf
                                        <!-- About Candidate -->
                                        <div class="form-group col-lg-12 col-md-12">
                                            <label>Bio</label>
                                            <textarea class="overflow-auto" name="bio" placeholder="About Yourself">{{ $candidateBio->bio ?? '' }}</textarea>
                                            @error('bio')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-lg-12 col-md-12">
                                            <button class="theme-btn btn-style-one">Save</button>
                                        </div>
                                    </form>

                                    <div class="form-group col-lg-12 col-md-12">
                                        <!-- Resume / Education -->
                                        <div class="resume-outer">
                                            <div class="upper-title">
                                                <h4>Education</h4>
                                                <a href="{{ route('education.create') }}">
                                                    <button class="add-info-btn"><span class="icon flaticon-plus"></span>
                                                        Add Aducation</button>
                                                </a>
                                            </div>

                                            @if ($educations && $educations->count() > 0)
                                                @foreach ($educations as $education)
                                                    <!-- Resume BLock -->
                                                    <div class="resume-block">
                                                        <div class="inner">
                                                            <span
                                                                class="name">{{ substr($education->institute_name, 0, 1) }}</span>
                                                            <div class="title-box">
                                                                <div class="info-box">
                                                                    <h3>{{ $education->degree_name }}</h3>
                                                                    <span>{{ $education->institute_name }}</span>
                                                                </div>
                                                                <div class="edit-box">
                                                                    <span class="year">PASS IN:
                                                                        {{ $education->passing_year }}</span>
                                                                    <div class="edit-btns">
                                                                        <a
                                                                            href="{{ route('education.edit', $education->id) }}">
                                                                            <button><span
                                                                                    class="la la-pencil"></span></button>
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
                                            @else
                                                <div>
                                                    <p class="py-3 text-center">Empty Education</p>
                                                </div>
                                            @endif

                                        </div>

                                        <!-- Resume / Work & Experience -->
                                        <div class="resume-outer theme-blue">
                                            <div class="upper-title">
                                                <h4>Work &amp; Experience</h4>
                                                <a href="{{ route('experience.create') }}">
                                                    <button class="add-info-btn"><span class="icon flaticon-plus"></span>
                                                        Add Work</button></a>
                                            </div>
                                            @if ($experiences && $experiences->count() > 0)
                                                @foreach ($experiences as $experience)
                                                    <!-- Resume BLock -->
                                                    <div class="resume-block">
                                                        <div class="inner">
                                                            <span
                                                                class="name">{{ substr($experience->company_name, 0, 1) }}</span>
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
                                                                        <a
                                                                            href="{{ route('experience.edit', $experience->id) }}">
                                                                            <button><span
                                                                                    class="la la-pencil"></span></button>
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
                                            @else
                                                <div>
                                                    <p class="py-3 text-center">Empty Experience</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12 col-md-12">
                                        <!-- Resume / Training -->
                                        <div class="resume-outer theme-yellow">
                                            <div class="upper-title">
                                                <h4>Training</h4>
                                                <a href="{{ route('training.create') }}">
                                                    <button class="add-info-btn"><span class="icon flaticon-plus"></span>
                                                        Training</button></a>
                                            </div>

                                            @if ($trainings && $trainings->count() > 0)
                                                @foreach ($trainings as $training)
                                                    <!-- Resume BLock -->
                                                    <div class="resume-block">
                                                        <div class="inner">
                                                            <span
                                                                class="name">{{ substr($training->institute, 0, 1) }}</span>
                                                            <div class="title-box">
                                                                <div class="info-box">
                                                                    <h3>{{ $training->title }}</h3>
                                                                    <span>{{ $training->institute }}</span>
                                                                </div>
                                                                <div class="edit-box">
                                                                    <span
                                                                        class="year">{{ $training->completion_year }}</span>
                                                                    <div class="edit-btns">
                                                                        <a
                                                                            href="{{ route('training.edit', $training->id) }}">
                                                                            <button><span
                                                                                    class="la la-pencil"></span></button>
                                                                        </a>
                                                                        <form method="POST"
                                                                            action="{{ route('training.destroy', $training->id) }}">
                                                                            @csrf
                                                                            @method('DELETE')

                                                                            <button type="submit" class="training_popup"
                                                                                title='Delete Training'><span
                                                                                    class="la la-trash"></span></button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div>
                                                    <p class="py-3 text-center">Empty Training</p>
                                                </div>
                                            @endif

                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12 col-md-12">
                                        <!-- Resume / Skills -->
                                        <div class="resume-outer theme-yellow">
                                            <div class="upper-title">
                                                <h4>Skills</h4>
                                                <a href="{{ route('skill.create') }}">
                                                    <button class="add-info-btn"><span class="icon flaticon-plus"></span>
                                                        Skills</button></a>
                                            </div>

                                            @if ($candidate && !empty($candidate->skills))
                                                <!-- Resume BLock -->
                                                <div class="resume-block">
                                                    <div class="inner">
                                                        <div class="row">
                                                            @foreach ($candidate->skills as $skill)
                                                                <div class="col-6 col-md-4 my-3">
                                                                    <div class="edit-box">
                                                                        <span class="year">{{ $skill }}</span>
                                                                        <div class="edit-btns">
                                                                            <form
                                                                                action="{{ route('skill.destroy', $skill) }}"
                                                                                method="post">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit"><span
                                                                                        class="la la-trash"></span></button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div>
                                                    <p class="py-3 text-center">Empty Skill</p>
                                                </div>
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
    </section>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        // delete education
        $('.education_popup').click(function(event) {

            var form = $(this).closest("form");

            event.preventDefault();

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });

        });

        // delete experience
        $('.experience_popup').click(function(event) {

            var form = $(this).closest("form");

            event.preventDefault();

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });

        });

        // delete training
        $('.training_popup').click(function(event) {

            var form = $(this).closest("form");

            event.preventDefault();

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });

        });
    </script>
@endpush

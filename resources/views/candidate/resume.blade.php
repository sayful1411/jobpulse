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

                                <div class="row">
                                    <form class="default-form">
                                        <!-- About Company -->
                                        <div class="form-group col-lg-12 col-md-12">
                                            <label>Bio</label>
                                            <textarea
                                                placeholder="Spent several years working on sheep on Wall Street. Had moderate success investing in Yugo's on Wall Street. Managed a small team buying and selling Pogo sticks for farmers. Spent several years licensing licorice in West Palm Beach, FL. Developed several new methods for working it banjos in the aftermarket. Spent a weekend importing banjos in West Palm Beach, FL.In this position, the Software Engineer collaborates with Evention's Development team to continuously enhance our current software solutions as well as create new solutions to eliminate the back-office operations and management challenges present"></textarea>
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
                                                <a href="{{ route('candidate.resume.education') }}">
                                                    <button class="add-info-btn"><span class="icon flaticon-plus"></span>
                                                        Add Aducation</button>
                                                </a>
                                            </div>

                                            <!-- Resume BLock -->
                                            <div class="resume-block">
                                                <div class="inner">
                                                    <span class="name">M</span>
                                                    <div class="title-box">
                                                        <div class="info-box">
                                                            <h3>Bachlors in Fine Arts</h3>
                                                            <span>Modern College</span>
                                                        </div>
                                                        <div class="edit-box">
                                                            <span class="year">2012 - 2014</span>
                                                            <div class="edit-btns">
                                                                <button><span class="la la-pencil"></span></button>
                                                                <button><span class="la la-trash"></span></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text">Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing elit. Proin a ipsum tellus. Interdum et malesuada
                                                        fames ac ante<br> ipsum primis in faucibus.</div>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- Resume / Work & Experience -->
                                        <div class="resume-outer theme-blue">
                                            <div class="upper-title">
                                                <h4>Work &amp; Experience</h4>
                                                <button class="add-info-btn"><span class="icon flaticon-plus"></span>
                                                    Add Work</button>
                                            </div>
                                            <!-- Resume BLock -->
                                            <div class="resume-block">
                                                <div class="inner">
                                                    <span class="name">S</span>
                                                    <div class="title-box">
                                                        <div class="info-box">
                                                            <h3>Product Designer</h3>
                                                            <span>Spotify Inc.</span>
                                                        </div>
                                                        <div class="edit-box">
                                                            <span class="year">2012 - 2014</span>
                                                            <div class="edit-btns">
                                                                <button><span class="la la-pencil"></span></button>
                                                                <button><span class="la la-trash"></span></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text">Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing elit. Proin a ipsum tellus. Interdum et malesuada
                                                        fames ac ante<br> ipsum primis in faucibus.</div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12 col-md-12">
                                        <!-- Resume / Training -->
                                        <div class="resume-outer theme-yellow">
                                            <div class="upper-title">
                                                <h4>Training</h4>
                                                <button class="add-info-btn"><span class="icon flaticon-plus"></span>
                                                    Training</button>
                                            </div>
                                            <!-- Resume BLock -->
                                            <div class="resume-block">
                                                <div class="inner">
                                                    <span class="name"></span>
                                                    <div class="title-box">
                                                        <div class="info-box">
                                                            <h3>Perfect Attendance Programs</h3>
                                                            <span></span>
                                                        </div>
                                                        <div class="edit-box">
                                                            <span class="year">2012 - 2014</span>
                                                            <div class="edit-btns">
                                                                <button><span class="la la-pencil"></span></button>
                                                                <button><span class="la la-trash"></span></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text">Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing elit. Proin a ipsum tellus. Interdum et malesuada
                                                        fames ac ante<br> ipsum primis in faucibus.</div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12 col-md-12">
                                        <!-- Resume / Skills -->
                                        <div class="resume-outer theme-yellow">
                                            <div class="upper-title">
                                                <h4>Skills</h4>
                                                <button class="add-info-btn"><span class="icon flaticon-plus"></span>
                                                    Skills</button>
                                            </div>
                                            <!-- Resume BLock -->
                                            <div class="resume-block">
                                                <div class="inner">
                                                    <div class="row">
                                                        <div class="col-3">
                                                            <div class="edit-box">
                                                                <span class="year">2012 - 2014</span>
                                                                <div class="edit-btns">
                                                                    <button><span class="la la-pencil"></span></button>
                                                                    <button><span class="la la-trash"></span></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="edit-box">
                                                                <span class="year">2012 - 2014</span>
                                                                <div class="edit-btns">
                                                                    <button><span class="la la-pencil"></span></button>
                                                                    <button><span class="la la-trash"></span></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="edit-box">
                                                                <span class="year">2012 - 2014</span>
                                                                <div class="edit-btns">
                                                                    <button><span class="la la-pencil"></span></button>
                                                                    <button><span class="la la-trash"></span></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="edit-box">
                                                                <span class="year">2012 - 2014</span>
                                                                <div class="edit-btns">
                                                                    <button><span class="la la-pencil"></span></button>
                                                                    <button><span class="la la-trash"></span></button>
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
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection

@push('script')
    <script src="{{ asset('js/jquery.modal.min.js') }}"></script>
@endpush

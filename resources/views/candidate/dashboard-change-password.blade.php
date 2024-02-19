@extends('layouts.master')

@section('title', 'Candidate Dashboard | ' . config('app.name'))

@section('content')
    <section class="user-dashboard">
        <div class="dashboard-outer">
            <div class="upper-title-box">
                <h3>Change Password</h3>
                <div class="text">Ready to jump back in?</div>
            </div>

            <!-- Ls widget -->
            <div class="ls-widget">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="widget-title">
                    <h4>Change Password</h4>
                </div>

                <div class="widget-content">
                    <form method="POST" action="{{ route('password.update') }}" class="default-form">
                        @csrf
                        @method('put')

                        <div class="row">
                            <!-- Input -->
                            <div class="form-group col-lg-7 col-md-12">
                                <label for="update_password_current_password">Old Password </label>
                                <input class="@error('email') border border-danger @enderror" type="password" id="update_password_current_password" name="current_password">
                                @error('current_password')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Input -->
                            <div class="form-group col-lg-7 col-md-12">
                                <label for="update_password_password">New Password</label>
                                <input class="@error('email') border border-danger @enderror" type="password" id="update_password_password" name="password">
                                @error('password')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Input -->
                            <div class="form-group col-lg-7 col-md-12">
                                <label for="update_password_password_confirmation">Confirm Password</label>
                                <input class="@error('email') border border-danger @enderror" type="password" id="update_password_password_confirmation"
                                    name="password_confirmation">
                                @error('password_confirmation')
                                    <div class="mt-1 text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Input -->
                            <div class="form-group col-lg-6 col-md-12">
                                <button type="submit" class="theme-btn btn-style-one">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

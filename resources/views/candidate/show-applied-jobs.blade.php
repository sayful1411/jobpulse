@extends('layouts.master')

@section('title', 'Applied Jobs | ' . config('app.name'))

@section('content')
    <section class="user-dashboard">
        <div class="dashboard-outer">
            <div class="upper-title-box">
                <h3>Applied Jobs</h3>
                <div class="text">Ready to jump back in?</div>
            </div>

            <div class="row">
                <div class="col-lg-12">

                    <livewire:candidate.show-applied-jobs/>
                    
                </div>
            </div>

        </div>
    </section>
@endsection

@extends('layouts.master')

@section('title', 'Add Skills | ' . config('app.name'))

@section('content')
    <section class="user-dashboard">
        <div class="dashboard-outer">
            <div class="upper-title-box">
                <h3>Add Skills</h3>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Ls widget -->
                    <div class="pt-5 ls-widget">
                        <div class="tabs-box">
                            <div class="widget-content">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('skill.store') }}" class="default-form">
                                    @csrf

                                    <div class="row">

                                        <!-- Input -->
                                        <select class="tags" name="skills[]" multiple="multiple">
                                            <!-- No initial options provided -->
                                        </select>
                                        @error('skills')
                                                <div class="mt-1 text-danger">{{ $message }}</div>
                                        @enderror

                                        <!-- Input -->
                                        <div class="form-group col-md-12 mt-3">
                                            <button type="submit" class="theme-btn btn-style-one">Save</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@push('script')
    <!-- Include Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.tags').select2({
                tags: true // Enable free input
            });
        });
    </script>
@endpush

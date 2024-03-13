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
                                                    <td class="applied"><a href="#">{{ $job->candidates->count() }} Applied</a></td>
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
                                                                    <a href="{{ route('company.jobs.edit', $job->id) }}">
                                                                        <button data-text="Edit Jobs">
                                                                            <span class="la la-pencil"></span>
                                                                        </button>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a onclick="deleteJob({{ $job->id }})">
                                                                        <button data-text="Delete Jobs">
                                                                            <span class="la la-trash"></span>
                                                                        </button>
                                                                    </a>
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

@push('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function deleteJob(jobId) {
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
                    $.ajax({
                        url: "{{ route('company.jobs.destroy', ':id') }}".replace(':id', jobId),
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            Swal.fire({
                                title: "Deleted!",
                                text: "Your file has been deleted.",
                                icon: "success",
                                showConfirmButton: false,
                                timer: 3000
                            });
                            location.reload();
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.status);
                        }
                    });
                }
            });
        }
    </script>
@endpush

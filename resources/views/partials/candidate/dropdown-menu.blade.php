<div class="dropdown dashboard-option">
    <a class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="false">
        @if ($candidate->image_url)
            <img class="thumb"
                src="{{ asset($candidate->image_url) }}" alt="">
        @else
            <img style="width: 12rem; height: 12rem;" class="object-fit-cover rounded"
                src="{{ asset(\App\Models\User::PLACEHOLDER_IMAGE_PATH) }}" alt="">
        @endif
        <span class="name">My Account</span>
    </a>
    <ul class="dropdown-menu">
        <li class="{{ request()->routeIs('candidate.dashboard') ? 'active' : '' }}"><a
                href="{{ route('candidate.dashboard') }}"> <i class="la la-home"></i> Dashboard</a></li>
        <li class="{{ request()->routeIs('candidate.profile') ? 'active' : '' }}"><a
                href="{{ route('candidate.profile') }}"><i class="la la-user-tie"></i>My Profile</a></li>
        <li class="{{ request()->routeIs('candidate.resume') ? 'active' : '' }}"><a
                href="{{ route('candidate.resume') }}"><i class="la la-file-invoice"></i>My Resume</a></li>
        <li><a href="candidate-dashboard-applied-job.html"><i class="la la-briefcase"></i> Applied Jobs </a></li>
        <li><a href="candidate-dashboard-job-alerts.html"><i class="la la-bell"></i>Job Alerts</a></li>
        <li><a href="dashboard-packages.html"><i class="la la-box"></i>Plugin</a></li>
        <li class="{{ request()->routeIs('password.change') ? 'active' : '' }}"><a
                href="{{ route('password.change') }}"><i class="la la-lock"></i>Change Password</a></li>

        <li>
            <form method="POST" action="{{ route('candidate.logout') }}">
                @csrf
                <a href="{{ route('candidate.logout') }}"
                    onclick="event.preventDefault();
                this.closest('form').submit();">
                    <i class="la la-sign-out"></i>Logout
                </a>
            </form>
        </li>
    </ul>
</div>

<div class="user-sidebar">

    <div class="sidebar-inner">
        <ul class="navigation">
            <li class="{{ request()->routeIs('candidate.dashboard') ? 'active' : '' }}"><a
                    href="{{ route('candidate.dashboard') }}"> <i class="la la-home"></i> Dashboard</a></li>
            <li class="{{ request()->routeIs('candidate.profile') ? 'active' : '' }}"><a
                    href="{{ route('candidate.profile') }}"><i class="la la-user-tie"></i>My Profile</a></li>
            <li class="{{ request()->routeIs('candidate.resume') || request()->routeIs('candidate.resume.*') ? 'active' : '' }}"><a
                    href="{{ route('candidate.resume') }}"><i class="la la-file-invoice"></i>My Resume</a></li>
            <li class="{{ request()->routeIs('candidate.applied-jobs') ? 'active' : '' }}"><a
                    href="{{ route('candidate.applied-jobs') }}"><i class="la la-briefcase"></i> Applied Jobs </a></li>
            <li><a href="#"><i class="la la-bell"></i>Job Alerts</a></li>
            <li class="{{ request()->routeIs('saved.job') ? 'active' : '' }}"><a href="{{ route('saved.job') }}"><i
                        class="la la-bookmark"></i>Saved Jobs</a></li>
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
</div>

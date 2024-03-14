<div class="dropdown dashboard-option">
    <a class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="false">
        @if (auth()->guard('company')->check() && auth()->guard('company')->user()->image_url)
            <img class="thumb" src="{{ asset(auth()->guard('company')->user()->image_url) }}" alt="">
        @else
            <img style="width: 12rem; height: 12rem;" class="object-fit-cover rounded"
                src="{{ asset(\App\Models\User::PLACEHOLDER_IMAGE_PATH) }}" alt="">
        @endif
        <span class="name">My Account</span>
    </a>

    <ul class="dropdown-menu">
        <li class="{{ request()->routeIs('company.dashboard') ? 'active' : '' }}"><a
                href="{{ route('company.dashboard') }}"> <i class="la la-home"></i> Dashboard</a></li>
        <li class="{{ request()->routeIs('company.profile') ? 'active' : '' }}"><a
                href="{{ route('company.profile') }}"><i class="la la-user-tie"></i>Company Profile</a></li>
        <li class="{{ request()->routeIs('company.jobs.create') ? 'active' : '' }}"><a
                href="{{ route('company.jobs.create') }}"><i class="la la-paper-plane"></i>Post a New Job</a></li>
        <li
            class="{{ request()->routeIs('company.jobs.*') && !request()->routeIs('company.jobs.create') ? 'active' : '' }}">
            <a href="{{ route('company.jobs.index') }}"><i class="la la-briefcase"></i> Manage Jobs </a></li>
        <li class="{{ request()->routeIs('applicants.*') ? 'active' : '' }}"><a
                href="{{ route('applicants.all') }}"><i class="la la-file-invoice"></i> All Applicants</a></li>
        <li><a href="dashboard-resumes.html"><i class="la la-bookmark-o"></i>Shortlisted Resumes</a></li>
        <li class="{{ request()->routeIs('company.password.change') ? 'active' : '' }}"><a
                href="{{ route('company.password.change') }}"><i class="la la-lock"></i>Change Password</a></li>
        <li>
            <form method="POST" action="{{ route('company.logout') }}">
                @csrf
                <a href="{{ route('company.logout') }}"
                    onclick="event.preventDefault();
                this.closest('form').submit();">
                    <i class="la la-sign-out"></i>Logout
                </a>
            </form>
        </li>
    </ul>
</div>

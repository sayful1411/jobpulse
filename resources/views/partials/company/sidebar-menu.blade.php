<div class="user-sidebar">

    <div class="sidebar-inner">
        <ul class="navigation">
            <li class="active"><a href="dashboard.html"> <i class="la la-home"></i> Dashboard</a></li>
            <li><a href="dashboard-company-profile.html"><i class="la la-user-tie"></i>Company Profile</a></li>
            <li><a href="dashboard-post-job.html"><i class="la la-paper-plane"></i>Post a New Job</a></li>
            <li><a href="dashboard-manage-job.html"><i class="la la-briefcase"></i> Manage Jobs </a></li>
            <li><a href="dashboard-applicants.html"><i class="la la-file-invoice"></i> All Applicants</a></li>
            <li><a href="dashboard-resumes.html"><i class="la la-bookmark-o"></i>Shortlisted Resumes</a></li>
            <li><a href="dashboard-packages.html"><i class="la la-box"></i>Packages</a></li>
            <li><a href="dashboard-messages.html"><i class="la la-comment-o"></i>Messages</a></li>
            <li><a href="dashboard-resume-alerts.html"><i class="la la-bell"></i>Resume Alerts</a></li>
            <li><a href="dashboard-change-password.html"><i class="la la-lock"></i>Change Password</a></li>
            <li><a href="dashboard-company-profile.html"><i class="la la-user-alt"></i>View Profile</a></li>
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
</div>

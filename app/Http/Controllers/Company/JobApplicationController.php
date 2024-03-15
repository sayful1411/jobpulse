<?php

namespace App\Http\Controllers\Company;

use App\Models\JobListing;
use App\Models\JobApplication;
use Illuminate\Support\Facades\DB;
use App\Enums\JobApplicationStatus;
use App\Http\Controllers\Controller;
use App\Models\ApplyJob;

class JobApplicationController extends Controller
{
    public function approve($candidateId, $jobListingId)
    {
        // Approve the application
        DB::transaction(function() use ($candidateId, $jobListingId) {
            JobApplication::updateOrCreate(
                ['user_id' => $candidateId, 'job_listing_id' => $jobListingId],
                ['user_id' => $candidateId, 'job_listing_id' => $jobListingId]
            );

            ApplyJob::where('user_id', $candidateId)
            ->where('job_listing_id', $jobListingId)
            ->update(['status' => JobApplicationStatus::APPROVED]);
        });

        flash()->addSuccess('Application approved successfully.');

        return redirect()->back();
    }

    public function reject($candidateId, $jobListingId)
    {
        // Reject the application
        DB::transaction(function() use ($candidateId, $jobListingId) {
            JobApplication::updateOrCreate(
                ['user_id' => $candidateId, 'job_listing_id' => $jobListingId],
                ['user_id' => $candidateId, 'job_listing_id' => $jobListingId]
            );

            ApplyJob::where('user_id', $candidateId)
            ->where('job_listing_id', $jobListingId)
            ->update(['status' => JobApplicationStatus::REJECTED]);
        });

        flash()->addSuccess('Application rejected successfully.');

        return redirect()->back();
    }

    public function allShortlists()
    {
        $companyId = auth()->user()->id;

        $jobs = JobListing::with('candidates', 'candidates.jobApplications')->where('company_id', $companyId)->latest()->paginate(2);

        return view('company.applicants.all-shortlisted', compact('jobs'));
    }

    public function shortLists(JobListing $job)
    {
        $approvedApplicants = ApplyJob::where('job_listing_id', $job->id)
            ->where('status', JobApplicationStatus::APPROVED)
            ->with('candidate', 'candidate.profile', 'candidate.skill')->get();

        // dd($approvedApplicants);

        return view('company.applicants.shortlisted', compact('approvedApplicants', 'job'));
    }
}

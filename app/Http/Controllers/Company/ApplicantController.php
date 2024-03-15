<?php

namespace App\Http\Controllers\Company;

use App\Enums\JobApplicationStatus;
use App\Http\Controllers\Controller;
use App\Models\ApplyJob;
use App\Models\JobListing;

class ApplicantController extends Controller
{
    public function index()
    {
        $companyId = auth()->user()->id;

        $jobs = JobListing::with('candidates', 'candidates.jobApplications')->where('company_id', $companyId)->latest()->paginate(2);

        // dd($jobs);

        return view('company.applicants.index', compact('jobs'));
    }

    public function show($jobId)
    {
        $job = JobListing::findOrFail($jobId);

        $applicants = ApplyJob::where('job_listing_id', $jobId)
            ->whereNot('status', JobApplicationStatus::APPROVED)
            ->with('candidate', 'candidate.profile', 'candidate.skill')
            ->get();

        // dd($applicants);

        // $job->load([
        //     'candidates.profile',
        //     'candidates.skill',
        //     'appliedJobs',
        //     'candidates.jobApplications' => function ($query) {
        //         $query->whereNot('status', JobApplicationStatus::APPROVED);
        //     }
        // ]);

        // $job = JobApplication::where('job_listing_id', $job->id)
        //     ->whereNot('status', JobApplicationStatus::APPROVED)
        //     ->with('candidate', 'candidate.profile', 'candidate.skill', 'applyJob')->get();

        // dd($job);

        return view('company.applicants.show', compact('applicants', 'job'));
    }
}

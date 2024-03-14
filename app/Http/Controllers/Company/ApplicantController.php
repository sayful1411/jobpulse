<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\JobListing;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function index()
    {
        $companyId = auth()->user()->id;

        $jobs = JobListing::with('candidates', 'candidates.jobApplications')->where('company_id', $companyId)->latest()->paginate(2);

        // dd($jobs);

        return view('company.applicants.index', compact('jobs'));
    }

    public function show(JobListing $job)
    {
        $job->load('candidates.profile', 'candidates.skill');  

        return view('company.applicants.show', compact('job'));
    }
}

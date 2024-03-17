<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\ApplyJob;
use App\Models\JobListing;
use Illuminate\Http\Request;

class ApplyJobController extends Controller
{
    public function index($slug)
    {
        $job = JobListing::where('slug', $slug)->firstOrFail();

        return view('job-application-form', compact('job'));
    }

    public function store(Request $request, JobListing $job)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'experience' => ['nullable', 'string'],
            'expected_salary' => ['required', 'numeric'],
        ]);

        $candidate = auth()->guard('web')->user();

        if (auth()->guard('company')->user() instanceof Company) {
            return redirect()->back()->with('error', 'Companies cannot apply for jobs.');
        }

        if ($candidate == null) {
            return redirect()->route('candidate.login');
        }

        $candidate->load('profile', 'educations', 'skill');

        if ($candidate->profile == null) {
            return redirect()->route('candidate.profile')->with('error', 'Please fill out profile details');
        }

        if ($candidate->profile->bio == null || $candidate->educations == null || $candidate->skill == null) {
            return redirect()->route('candidate.resume')->with('error', 'Before applying for a job, please fill out the bio, education, and skills information');
        }
        
        $jobId = $job->id;

        $alreadyApplied = ApplyJob::where('job_listing_id', $jobId)->where('user_id', $candidate->id)->exists();

        if($alreadyApplied){
            return redirect()->back()->with('error', 'You have already applied for this job');
        }

        $candidate->jobs()->attach($jobId, [
            'name' => $request->name,
            'experience' => $request->experience,
            'expected_salary' => $request->expected_salary,
        ]);

        return redirect()->back()->with('success', 'Job application submitted successfully!');
    }
}

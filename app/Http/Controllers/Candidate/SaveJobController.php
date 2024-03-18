<?php

namespace App\Http\Controllers\Candidate;

use App\Models\JobListing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SaveJobController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function saveJob($slug)
    {
        $candidate = Auth::user();

        if ($candidate == null) {
            return redirect()->route('candidate.login');
        }

        $jobListing = JobListing::where('slug', $slug)->firstOrFail();

        $jobListingId = $jobListing->id;

        if ($candidate->savedJobs()->where('job_listing_id', $jobListingId)->exists()) {
            $candidate->savedJobs()->detach($jobListingId);
        }

        $candidate->savedJobs()->attach($jobListingId);

        flash()->addSuccess('Job has been Saved.');

        return redirect()->back();
    }

    public function showSavedJobs()
    {
        $candidate = Auth::user();

        $savedJobs = $candidate->savedJobs()->with('company')->simplePaginate(10);

        foreach ($savedJobs as $job) {
            $expirationDate = $job->expiration_date;
            $status = $expirationDate->isFuture() ? 'Active' : 'Expired';
            $job->status = $status;
        }

        return view('candidate.show-saved-jobs', compact('savedJobs'));
    }
}

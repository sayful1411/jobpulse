<?php

namespace App\Http\Controllers\Company;

use App\Enums\JobApplicationStatus;
use App\Http\Controllers\Controller;
use App\Models\JobApplication;

class JobApplicationController extends Controller
{
    public function approve($candidateId, $jobListingId)
    {
        // Approve the application
        JobApplication::updateOrCreate(
            ['user_id' => $candidateId, 'job_listing_id' => $jobListingId],
            ['status' => JobApplicationStatus::APPROVED]
        );

        flash()->addSuccess('Application approved successfully.');

        return redirect()->back();
    }

    public function reject($candidateId, $jobListingId)
    {
        // Reject the application
        JobApplication::updateOrCreate(
            ['user_id' => $candidateId, 'job_listing_id' => $jobListingId],
            ['status' => JobApplicationStatus::REJECTED]
        );

        flash()->addSuccess('Application rejected successfully.');

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;

class FindJobController extends Controller
{
    public function index()
    {
        $jobs = JobListing::with('tags', 'company')->latest()->simplePaginate(10);

        return view('all-jobs', compact('jobs'));
    }

    public function singleJob($slug)
    {
        $job = JobListing::where('slug', $slug)->firstOrFail();
        
        $job->load('tags', 'company');

        return view('single-job', compact('job'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;

class FindJobController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->filled('keyword') ? $request->keyword : null;
        $location = $request->filled('location') ? $request->location : null;

        return view('all-jobs', compact('keyword', 'location'));
    }

    public function singleJob($slug)
    {
        $job = JobListing::where('slug', $slug)->firstOrFail();

        $job->load('tags', 'company');

        return view('single-job', compact('job'));
    }
}

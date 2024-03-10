<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;

class FindJobController extends Controller
{
    public function index(Request $request)
    {
        $query = JobListing::with('tags', 'company')->latest();

        if ($request->has('keyword')) {
            $searchQuery = $request->input('keyword');

            $query->where(function ($query) use ($searchQuery) {
                $query->where('title', 'like', '%' . $searchQuery . '%')
                    ->orWhere('job_type', 'like', '%' . $searchQuery . '%')
                    ->orWhereHas('company', function ($query) use ($searchQuery) {
                        $query->where('name', 'like', '%' . $searchQuery . '%');
                    });
            });
        }

        if ($request->filled('location')) {
            $location = $request->input('location');
            $query->where('location', 'like', '%' . $location . '%');
        }

        $jobs = $query->simplePaginate(10);

        return view('all-jobs', compact('jobs'));
    }

    public function singleJob($slug)
    {
        $job = JobListing::where('slug', $slug)->firstOrFail();

        $job->load('tags', 'company');

        return view('single-job', compact('job'));
    }
}

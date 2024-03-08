<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;

class FindJobController extends Controller
{
    public function index()
    {
        $jobs = JobListing::with('tags')->latest()->simplePaginate(10);

        return view('all-jobs', compact('jobs'));
    }
}

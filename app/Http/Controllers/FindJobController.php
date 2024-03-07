<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;

class FindJobController extends Controller
{
    public function index()
    {
        $jobs = JobListing::with('tags')->latest()->get();

        return view('all-jobs', compact('jobs'));
    }
}

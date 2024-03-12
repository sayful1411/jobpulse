<?php

namespace App\Http\Controllers\Candidate;

use Carbon\Carbon;
use App\Models\ApplyJob;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppliedJobController extends Controller
{
    public function index()
    {
        return view('candidate.show-applied-jobs');
    }
}

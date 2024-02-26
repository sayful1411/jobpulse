<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Experience;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function index()
    {
        $educations = Education::all();
        $experiences = Experience::all();

        return view('candidate.resume', compact('educations', 'experiences'));
    }
}

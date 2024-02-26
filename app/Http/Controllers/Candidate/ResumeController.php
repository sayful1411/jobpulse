<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Training;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function index()
    {
        $educations = Education::all();
        $experiences = Experience::all();
        $trainings = Training::all();

        return view('candidate.resume', compact('educations', 'experiences', 'trainings'));
    }
}

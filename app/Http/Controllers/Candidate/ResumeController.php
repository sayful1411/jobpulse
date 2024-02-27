<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Skill;
use App\Models\Training;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function index()
    {
        $authID = auth()->id();

        $educations = Education::where('user_id', $authID)->first();
        
        $experiences = Experience::where('user_id', $authID)->first();

        $trainings = Training::where('user_id', $authID)->first();

        $trainings = Training::where('user_id', $authID)->first();

        $candidate   = Skill::where('user_id', $authID)->first();

        return view('candidate.resume', compact('educations', 'experiences', 'trainings', 'candidate'));
    }
}

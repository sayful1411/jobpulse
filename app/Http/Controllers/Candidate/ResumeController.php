<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Skill;
use App\Models\Training;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function index()
    {
        $authID = auth()->id();

        $candidateBio = UserProfile::where('user_id', $authID)->select('bio')->first();

        $educations = Education::where('user_id', $authID)->first();

        $experiences = Experience::where('user_id', $authID)->first();

        $trainings = Training::where('user_id', $authID)->first();

        $trainings = Training::where('user_id', $authID)->first();

        $candidate   = Skill::where('user_id', $authID)->first();

        return view('candidate.resume', compact('candidateBio', 'educations', 'experiences', 'trainings', 'candidate'));
    }

    public function store(Request $request)
    {
        $authID = auth()->id();
        
        $validatedData = $request->validate([
            'bio' => 'required|string'
        ]);

        $userProfile = UserProfile::where('user_id', $authID)->first();

        if(empty($userProfile)){
            return redirect()->back()->with('error', 'Please update your profile first');
        }

        UserProfile::where('user_id', $authID)->update($validatedData);

        return redirect()->back()->with('success', 'Bio data has been updated');
    }
}

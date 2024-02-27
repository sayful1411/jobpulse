<?php

namespace App\Http\Controllers\Candidate\Resume;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort(404);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('candidate.resume.skill.add-skill');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'skills' => 'required|array',
            'skills.*' => 'string|max:255',
        ]);

        $authID = auth()->id();

        $candidate = Skill::where('user_id', $authID)->first();

        $skills = $request->input('skills', []);

        $candidateSkills = $candidate ? array_merge($candidate->skills, $skills) : $skills;

        if ($candidate) {
            $candidate->update([
                'skills' => $candidateSkills,
            ]);
        } else {
            Skill::create([
                'user_id' => $authID,
                'skills' => $candidateSkills,
            ]);
        }

        return redirect()->back()->with('success', 'Skills added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($skill)
    {
        $authID = auth()->id();

        $candidate = Skill::where('user_id', $authID)->first();

        $skills = $candidate->skills;

        $updatedSkills = array_diff($skills, [$skill]);

        $candidate->update([
            'skills' => $updatedSkills,
        ]);

        return redirect()->back()->with('success', 'Skill deleted successfully.');
    }
}

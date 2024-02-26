<?php

namespace App\Http\Controllers\Candidate\Resume;

use App\Http\Controllers\Controller;
use App\Http\Requests\Candidate\Resume\StoreExperienceRequest;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
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
        return view('candidate.resume.experience.add-experience');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExperienceRequest $request)
    {
        $authID = auth()->id();

        $validatedData = $request->validated();

        $validatedData['user_id'] = $authID;

        Experience::create($validatedData);

        return redirect()->back()->with('success', 'Experience information has been Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Experience $experience)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Experience $experience)
    {
        return view('candidate.resume.experience.edit-experience', compact('experience'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreExperienceRequest $request, Experience $experience)
    {
        $authID = auth()->id();

        $validatedData = $request->validated();

        $validatedData['user_id'] = $authID;

        $experience->update($validatedData);

        return redirect()->back()->with('success', 'Experience information has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Experience $experience)
    {
        $experience->delete();

        return redirect()->back()->with('success', 'Experience information has been deleted');
    }
}

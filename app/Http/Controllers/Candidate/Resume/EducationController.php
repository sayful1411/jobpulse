<?php

namespace App\Http\Controllers\Candidate\Resume;

use App\Models\Education;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Candidate\Resume\StoreEducationRequest;

class EducationController extends Controller
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
        return view('candidate.resume.education.add-education');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEducationRequest $request)
    {
        $authID = auth()->id();

        $validatedData = $request->validated();

        $validatedData['user_id'] = $authID;

        Education::updateOrCreate([
            'user_id' => $authID,
            'level' => $validatedData['level']
        ], $validatedData);

        return redirect()->back()->with('success', 'Education information has been updated');
    }

    /**
     * Display the specified resource.
     */
    public function show(Education $education)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Education $education)
    {
        return view('candidate.resume.education.edit-education', compact('education'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreEducationRequest $request, Education $education)
    {
        $authID = auth()->id();

        $validatedData = $request->validated();

        $validatedData['user_id'] = $authID;

        $education->update($validatedData);

        return redirect()->back()->with('success', 'Education information has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Education $education)
    {
        $education->delete();

        return redirect()->back()->with('success', 'Education information has been deleted');
    }
}

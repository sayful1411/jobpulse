<?php

namespace App\Http\Controllers\Candidate\Resume;

use App\Http\Controllers\Controller;
use App\Http\Requests\Candidate\Resume\StoreTrainingRequest;
use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
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
        return view('candidate.resume.training.add-training');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTrainingRequest $request)
    {
        $authID = auth()->id();

        $validatedData = $request->validated();

        $validatedData['user_id'] = $authID;

        Training::create($validatedData);

        return redirect()->back()->with('success', 'Training information has been Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Training $training)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Training $training)
    {
        return view('candidate.resume.training.edit-training', compact('training'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTrainingRequest $request, Training $training)
    {
        $authID = auth()->id();

        $validatedData = $request->validated();

        $validatedData['user_id'] = $authID;

        $training->update($validatedData);

        return redirect()->back()->with('success', 'Training information has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Training $training)
    {
        $training->delete();

        return redirect()->back()->with('success', 'Training information has been deleted');
    }
}

<?php

namespace App\Http\Controllers\Candidate\Resume;

use App\Http\Controllers\Controller;
use App\Http\Requests\Candidate\Resume\StoreEducationRequest;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        return view('candidate.resume.add-education');
    }

    public function store(StoreEducationRequest $request)
    {
        $authID = auth()->id();

        $validatedData = $request->validated();

        $validatedData['user_id'] = $authID;

        Education::updateOrCreate(['user_id' => $authID], $validatedData);

        return redirect()->back()->with('success', 'Education information has been updated');
    }
}

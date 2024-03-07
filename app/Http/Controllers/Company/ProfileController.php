<?php

namespace App\Http\Controllers\Company;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Company\UpdateProfileRequest;

class ProfileController extends Controller
{
    public function index()
    {
        $authID = auth()->id();

        $company = Company::where('id', $authID)->first();

        return view('company.profile', compact('company'));
    }

    public function update(UpdateProfileRequest $request, Company $company)
    {
        $validatedData = $request->validated();

        $company->update($validatedData);

        return redirect()->back()->with('success', 'Profile updated successfully');
    }
}

<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\UpdateProfileRequest;
use App\Models\Company;
use Illuminate\Http\Request;

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

    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => ['required', 'image', 'mimes:png,jpg', 'max:2048'],
        ]);

        $company = Company::findOrFail(auth()->user()->id);

        $imageName = null;

        $existingMedia = $company->getFirstMedia('company_avatar');
        if ($existingMedia) {
            $existingMedia->delete();
        }

        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $extension = $image->getClientOriginalExtension();
            $imageName = 'company-avatar' . md5(uniqid()) . time() . '.' . $extension;
        }

        if ($imageName) {
            $company->addMediaFromRequest('avatar')->usingFileName($imageName)->toMediaCollection('company_avatar');
        }

        return redirect()->back()->with('success', 'Profile avatar has been updated');
    }
}

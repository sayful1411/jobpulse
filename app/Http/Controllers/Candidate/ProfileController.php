<?php

namespace App\Http\Controllers\Candidate;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Candidate\UpdateProfileRequest;
use App\Models\UserOthersInformation;

class ProfileController extends Controller
{
    public function index()
    {
        $authID = auth()->id();

        $candidate = User::with('profile', 'othersInformation')->where('id', $authID)->first();

        return view('candidate.profile', compact('candidate'));
    }

    public function store(UpdateProfileRequest $request)
    {
        $authID = auth()->id();

        $validatedData = $request->validated();

        $validatedData['user_id'] = $authID;

        try {
            DB::beginTransaction();

            UserProfile::updateOrCreate(['user_id' => $authID], $validatedData);

            UserOthersInformation::updateOrCreate(['user_id' => $authID], $validatedData);

            User::where('id', $authID)->update([
                'phone' => $validatedData['phone']
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Profile has been Updated');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Failed to update profile. Please try again.');
        }
    }
}

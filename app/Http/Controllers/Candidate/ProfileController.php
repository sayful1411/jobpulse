<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Candidate\UpdateProfileRequest;
use App\Http\Requests\Candidate\UpdateSocialAccountRequest;
use App\Models\User;
use App\Models\UserOthersInformation;
use App\Models\UserProfile;
use App\Models\UserSocialAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        $authID = auth()->id();

        $candidate = User::with('profile', 'othersInformation', 'socialAccountsInformation')->where('id', $authID)->first();

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
                'phone' => $validatedData['phone'],
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Profile has been Updated');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Failed to update profile. Please try again.');
        }
    }

    public function updateSocialAccount(UpdateSocialAccountRequest $request)
    {
        $authID = auth()->id();

        $validatedData = $request->validated();

        foreach ($validatedData['social_accounts'] as $platform => $data) {
            if (!empty($data['title']) && empty($data['url'])) {
                return redirect()->back()->with('error', 'At least one URL is required.');
            }

            UserSocialAccount::updateOrCreate(
                ['user_id' => $authID, 'title' => $platform],
                ['url' => $data['url']]
            );
        }

        return redirect()->back()->with('success', 'Social account information has been updated');
    }

    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => ['required', 'image', 'mimes:png,jpg', 'max:2048'],
        ]);

        $candidate = User::findOrFail(auth()->user()->id);

        $imageName = null;

        $existingMedia = $candidate->getFirstMedia('candidate_avatar');
        if ($existingMedia) {
            $existingMedia->delete();
        }

        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $extension = $image->getClientOriginalExtension();
            $imageName = 'candidate-avatar' . md5(uniqid()) . time() . '.' . $extension;
        }

        if ($imageName) {
            $candidate->addMediaFromRequest('avatar')->usingFileName($imageName)->toMediaCollection('candidate_avatar');
        }

        return redirect()->back()->with('success', 'Profile avatar has been updated');
    }
}

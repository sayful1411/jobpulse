<?php

namespace App\Http\Controllers\Candidate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Candidate\UpdatePasswordRequest;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordController extends Controller
{
    public function index()
    {
        return view('candidate.dashboard-change-password');
    }

    public function update(UpdatePasswordRequest $request)
    {
        $validated = $request->validated();

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'Password has been updated');
    }
}

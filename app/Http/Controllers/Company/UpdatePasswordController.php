<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Candidate\UpdatePasswordRequest;

class UpdatePasswordController extends Controller
{
    public function index()
    {
        return view('company.change-password');
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

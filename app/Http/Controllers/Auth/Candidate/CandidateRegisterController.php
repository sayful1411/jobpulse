<?php

namespace App\Http\Controllers\Auth\Candidate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Candidate\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;

class CandidateRegisterController extends Controller
{
    public function index()
    {
        return view('auth.candidate.register');
    }

    public function store(RegisterRequest $request)
    {
        $validatedData = $request->validated();

        $candidate = User::create($validatedData);

        event(new Registered($candidate));

        return to_route('candidate.login')->with('success', 'Registration successful. Please verify email to continue');
    }
}

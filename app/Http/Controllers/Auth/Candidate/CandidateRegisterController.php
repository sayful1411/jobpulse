<?php

namespace App\Http\Controllers\Auth\Candidate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Candidate\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class CandidateRegisterController extends Controller
{
    public function index()
    {
        return view('auth.candidate.register');
    }

    public function store(RegisterRequest $request)
    {
        $validatedData = $request->validated();

        User::create($validatedData);

        return to_route('candidate.login')->with('success', 'Registration successful. Please verify email to continue');
    }
}

<?php

namespace App\Http\Controllers\Auth\Candidate;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\Candidate\RegisterRequest;

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

        Auth::login($candidate);

        return redirect()->route('verification.notice');
    }
}

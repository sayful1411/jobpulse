<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $authID = auth()->id();

        $candidate = User::with('profile')->where('id', $authID)->first();

        return view('candidate.profile', compact('candidate'));
    }
}

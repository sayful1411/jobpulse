<?php

namespace App\Http\Controllers\Auth\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CandidateRegisterController extends Controller
{
    public function index()
    {
        return view('auth.candidate.register');
    }
}

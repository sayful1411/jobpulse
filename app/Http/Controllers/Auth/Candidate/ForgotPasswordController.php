<?php

namespace App\Http\Controllers\Auth\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('auth.candidate.forgot-password');
    }
}

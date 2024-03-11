<?php

namespace App\Http\Controllers\Auth\Company;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.company.login');
    }

    public function store(LoginRequest $request)
    {
        $credentials = $request->validated();

        $remember = $request->has('remember') ? true : false;

        if (Auth::guard('company')->attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended(RouteServiceProvider::HOME);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}

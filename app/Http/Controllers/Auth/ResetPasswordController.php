<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;

class ResetPasswordController extends Controller
{
    public function resetPasswordPage(Request $request)
    {
        $token = $request->token;
        $guard = $request->guard;
        $email = $request->email;

        return view('auth.reset-password', compact('token', 'guard', 'email'));
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $credentials = $request->only(
            'email', 'password', 'password_confirmation', 'token'
        );

        $guard = $request->input('guard') === 'companies' ? 'companies' : 'users';

        $status = Password::broker($guard)->reset(
            $credentials,
            function ($user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            if ($guard === 'companies') {
                return redirect()->route('company.login')->with('success', __($status));
            } else {
                return redirect()->route('candidate.login')->with('success', __($status));
            }
        } else {
            return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => __($status)]);
        }
    }

}

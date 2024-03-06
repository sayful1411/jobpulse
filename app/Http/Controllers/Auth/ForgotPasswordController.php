<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use App\Notifications\CustomResetPasswordNotification;

class ForgotPasswordController extends Controller
{
    public function candidateSendLinkPage()
    {
        return view('auth.candidate.forgot-password');
    }

    public function companySendLinkPage()
    {
        return view('auth.company.forgot-password');
    }

    public function sendLink(Request $request, $guard)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::broker($guard)->sendResetLink(
            $request->only('email'),
            function ($user, $token) use ($guard) {
                $user->notify(new CustomResetPasswordNotification($token, $guard));
            }
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }
}

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Candidate\LogoutController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\Candidate\ResetPasswordController;
use App\Http\Controllers\Auth\Candidate\CandidateLoginController;
use App\Http\Controllers\Auth\Candidate\ForgotPasswordController;
use App\Http\Controllers\Auth\Candidate\CandidateRegisterController;
use App\Http\Controllers\Candidate\ProfileController;
use App\Http\Controllers\Candidate\UpdatePasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/login-popup', function () {
    return view('auth.candidate.login-signup-popup');
})->name('login.popup');

Route::middleware('guest')->group(function () {
    Route::get('/candidate/login', [CandidateLoginController::class, 'index'])
    ->name('candidate.login');

    Route::post('/candidate/login', [CandidateLoginController::class, 'store']);

    Route::get('/candidate/register', [CandidateRegisterController::class, 'index'])
    ->name('candidate.register');

    Route::post('/candidate/register', [CandidateRegisterController::class, 'store']);

    Route::get('/candidate/forgot-password', [ForgotPasswordController::class, 'index'])
    ->name('candidate.forgot.password');

    Route::post('/candidate/forgot-password', [ForgotPasswordController::class, 'store']);

    Route::get('reset-password/{token}', [ResetPasswordController::class, 'index'])
    ->name('password.reset');

    Route::post('reset-password', [ResetPasswordController::class, 'store'])
    ->name('password.store');
});

Route::middleware('auth')->group(function () {
    /*
    |--------------------------------------------------------------------------
    | Candidate Routes
    |--------------------------------------------------------------------------
    | dashboard
    | change password
    | email verification
    | logout
    | profile
    */
    Route::middleware(['verified'])->group(function () {
        Route::get('/candidate/dashboard', function () {
            return view('candidate.dashboard');
        })->name('candidate.dashboard');

        Route::get('/candidate/change-password', [UpdatePasswordController::class, 'index'])
        ->name('password.change');

        Route::put('/update-password', [UpdatePasswordController::class, 'update'])
        ->name('password.update');

        Route::get('/candidate/profile', [ProfileController::class, 'index'])
        ->name('candidate.profile');

        Route::post('/candidate/profile', [ProfileController::class, 'store'])
        ->name('candidate.profile.store');
    });

    Route::get('/email/verify', [EmailVerificationController::class, 'index'])
    ->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verifyEmail'])
    ->middleware(['signed', 'throttle:6,1'])->name('verification.verify');

    Route::post('/email/verification-notification', [EmailVerificationController::class, 'resendLink'])
    ->middleware('throttle:6,1')->name('verification.send');

    Route::post('/candidate/logout', LogoutController::class)->name('candidate.logout');
});


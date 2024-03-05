<?php

use App\Http\Controllers\Auth\Candidate\LoginController as CandidateLoginController;
use App\Http\Controllers\Auth\Candidate\LogoutController;
use App\Http\Controllers\Auth\Candidate\RegisterController as CandidateRegisterController;
use App\Http\Controllers\Auth\Company\LoginController as CompanyLoginController;
use App\Http\Controllers\Auth\Company\RegisterController as CompanyRegisterController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Candidate\ProfileController;
use App\Http\Controllers\Candidate\ResumeController;
use App\Http\Controllers\Candidate\Resume\EducationController;
use App\Http\Controllers\Candidate\Resume\ExperienceController;
use App\Http\Controllers\Candidate\Resume\SkillController;
use App\Http\Controllers\Candidate\Resume\TrainingController;
use App\Http\Controllers\Candidate\UpdatePasswordController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/login-popup', function () {
    return view('auth.login-signup-popup');
})->name('login.popup');

// candidate auth
Route::group(['prefix' => 'candidate', 'middleware' => 'guest'], function () {
    Route::get('/login', [CandidateLoginController::class, 'index'])
        ->name('candidate.login');

    Route::post('/login', [CandidateLoginController::class, 'store']);

    Route::get('/register', [CandidateRegisterController::class, 'index'])
        ->name('candidate.register');

    Route::post('/register', [CandidateRegisterController::class, 'store']);

    Route::get('/forgot-password', [ForgotPasswordController::class, 'candidateSendLinkPage'])
        ->name('candidate.forgot.password');

    Route::post('/forgot-password', [ForgotPasswordController::class, 'candidateSendLink']);
});

// company auth
Route::group(['prefix' => 'company', 'as' => 'company.', 'middleware' => 'guest:company'], function () {
    Route::get('/register', [CompanyRegisterController::class, 'index'])
        ->name('register');

    Route::post('/register', [CompanyRegisterController::class, 'store']);

    Route::get('/login', [CompanyLoginController::class, 'index'])
        ->name('login');

    Route::post('/login', [CompanyLoginController::class, 'store']);

    Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])
        ->name('forgot.password');

    Route::post('/forgot-password', [ForgotPasswordController::class, 'store']);
});

// reset password
Route::middleware(['guest', 'guest:company'])->group(function () {
    Route::get('reset-password/{token}', [ResetPasswordController::class, 'candidateResetPasswordPage'])
        ->name('password.reset');

    Route::post('reset-password', [ResetPasswordController::class, 'candidateResetPassword'])
        ->name('password.store');
});

// verify
Route::middleware(['auth', 'auth:company'])->group(function () {
    Route::get('/email/verify', [EmailVerificationController::class, 'index'])
        ->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verifyEmail'])
        ->middleware(['signed', 'throttle:6,1'])->name('verification.verify');

    Route::post('/email/verification-notification', [EmailVerificationController::class, 'resendLink'])
        ->middleware('throttle:6,1')->name('verification.send');
});

/*
|--------------------------------------------------------------------------
| Candidate Routes
|--------------------------------------------------------------------------
 */
Route::middleware('auth')->group(function () {
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

        Route::post('/candidate/social', [ProfileController::class, 'updateSocialAccount'])
            ->name('candidate.social.store');

        Route::post('/candidate/avatar', [ProfileController::class, 'updateAvatar'])
            ->name('candidate.avatar.update');

        Route::get('/candidate/resume', [ResumeController::class, 'index'])
            ->name('candidate.resume');

        Route::post('/candidate/bio', [ResumeController::class, 'store'])
            ->name('candidate.bio');

        Route::resource('/candidate/resume/education', EducationController::class);

        Route::resource('/candidate/resume/experience', ExperienceController::class);

        Route::resource('/candidate/resume/training', TrainingController::class);

        Route::resource('/candidate/resume/skill', SkillController::class)->except('show', 'edit', 'update');
    });

    Route::post('/candidate/logout', LogoutController::class)->name('candidate.logout');
});

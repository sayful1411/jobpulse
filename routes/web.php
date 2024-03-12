<?php

use App\Http\Controllers\ApplyJobController;
use App\Http\Controllers\Auth\Candidate\LoginController as CandidateLoginController;
use App\Http\Controllers\Auth\Candidate\LogoutController as CandidateLogoutController;
use App\Http\Controllers\Auth\Candidate\RegisterController as CandidateRegisterController;
use App\Http\Controllers\Auth\Company\LoginController as CompanyLoginController;
use App\Http\Controllers\Auth\Company\LogoutController as CompanyLogoutController;
use App\Http\Controllers\Auth\Company\RegisterController as CompanyRegisterController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Candidate\ProfileController as CandidateProfileController;
use App\Http\Controllers\Candidate\ResumeController;
use App\Http\Controllers\Candidate\Resume\EducationController;
use App\Http\Controllers\Candidate\Resume\ExperienceController;
use App\Http\Controllers\Candidate\Resume\SkillController;
use App\Http\Controllers\Candidate\Resume\TrainingController;
use App\Http\Controllers\Candidate\UpdatePasswordController as CandidateUpdatePasswordController;
use App\Http\Controllers\Company\JobController;
use App\Http\Controllers\Company\ProfileController as CompanyProfileController;
use App\Http\Controllers\Company\UpdatePasswordController as CompanyUpdatePasswordController;
use App\Http\Controllers\FindJobController;
use App\Http\Controllers\JobSearchController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index')->name('home');

Route::view('/login-popup', 'auth.login-signup-popup')->name('login.popup');
Route::post('/search', [JobSearchController::class, 'search'])->name('job.search');
Route::get('/all-jobs', [FindJobController::class, 'index'])->name('all.jobs');
Route::get('/jobs/{slug}', [FindJobController::class, 'singleJob'])->name('single.job');
Route::get('/apply-job/{slug}', [ApplyJobController::class, 'index'])->name('apply.job');
Route::post('/apply-job/{job}', [ApplyJobController::class, 'store'])->name('store.applied.job');

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

    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendLink'])
        ->defaults('guard', 'users');
});

// company auth
Route::group(['prefix' => 'company', 'as' => 'company.', 'middleware' => 'guest:company'], function () {
    Route::get('/register', [CompanyRegisterController::class, 'index'])
        ->name('register');

    Route::post('/register', [CompanyRegisterController::class, 'store']);

    Route::get('/login', [CompanyLoginController::class, 'index'])
        ->name('login');

    Route::post('/login', [CompanyLoginController::class, 'store']);

    Route::get('/forgot-password', [ForgotPasswordController::class, 'companySendLinkPage'])
        ->name('forgot.password');

    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendLink'])
        ->defaults('guard', 'companies');
});

// reset password
Route::middleware(['guest:web,company'])->group(function () {
    Route::get('reset-password/{token}/{guard}', [ResetPasswordController::class, 'resetPasswordPage'])
        ->name('password.reset');

    Route::post('reset-password', [ResetPasswordController::class, 'resetPassword'])
        ->name('password.store');
});

// verify
Route::middleware(['auth:web,company'])->group(function () {
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

        Route::view('/candidate/dashboard', 'candidate.dashboard')->name('candidate.dashboard');

        Route::get('/candidate/change-password', [CandidateUpdatePasswordController::class, 'index'])
            ->name('password.change');

        Route::put('/update-password', [CandidateUpdatePasswordController::class, 'update'])
            ->name('password.update');

        Route::get('/candidate/profile', [CandidateProfileController::class, 'index'])
            ->name('candidate.profile');

        Route::post('/candidate/profile', [CandidateProfileController::class, 'store'])
            ->name('candidate.profile.store');

        Route::post('/candidate/social', [CandidateProfileController::class, 'updateSocialAccount'])
            ->name('candidate.social.store');

        Route::post('/candidate/avatar', [CandidateProfileController::class, 'updateAvatar'])
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

    Route::post('/candidate/logout', CandidateLogoutController::class)->name('candidate.logout');
});

/*
|--------------------------------------------------------------------------
| Company Routes
|--------------------------------------------------------------------------
 */
Route::middleware('auth:company')->group(function () {

    Route::view('/status', 'approval')->name('disapproved');

    Route::middleware(['verified', 'approved'])->group(function () {

        Route::view('/company/dashboard', 'company.dashboard')->name('company.dashboard');

        Route::get('/company/profile', [CompanyProfileController::class, 'index'])
            ->name('company.profile');

        Route::put('/company/profile/{company}', [CompanyProfileController::class, 'update'])
            ->name('company.profile.update');

        Route::post('/company/avatar', [CompanyProfileController::class, 'updateAvatar'])
            ->name('company.avatar.update');

        Route::get('/company/change-password', [CompanyUpdatePasswordController::class, 'index'])
            ->name('company.password.change');

        Route::put('/company/update-password', [CompanyUpdatePasswordController::class, 'update'])
            ->name('company.password.update');

        Route::resource('/company/jobs', JobController::class)->names('company.jobs');
    });

    Route::post('/company/logout', CompanyLogoutController::class)->name('company.logout');
});

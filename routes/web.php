<?php

use App\Http\Controllers\Auth\Candidate\CandidateLoginController;
use App\Http\Controllers\Auth\Candidate\CandidateRegisterController;
use Illuminate\Support\Facades\Route;

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

    Route::get('/candidate/register', [CandidateRegisterController::class, 'index'])
    ->name('candidate.register');

    Route::post('/candidate/register', [CandidateRegisterController::class, 'store']);
});

Route::get('/candidate/dashboard', function () {
    return view('candidate.dashboard');
})->middleware('auth', 'verified')->name('candidate.dashboard');

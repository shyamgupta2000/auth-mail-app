<?php

use App\Http\Controllers\SendMailController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[UserController::class, 'login'])->name('login');
Route::post('/login',[UserController::class, 'loginSave'])->name('loginSave');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register',action: [UserController::class, 'registerSave'])->name('registerSave');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/forgot-password', [UserController::class, 'forgotPassword'])->name('forgotPassword');
Route::post('/forgot-password', [UserController::class, 'forgotPasswordSave'])->name('forgotPasswordSave');

// GitHub Redirect
Route::get('/auth/{provider}/redirect', [SocialiteController::class, 'redirect'])->where('provider', 'google|github|twitter');

// GitHub Callback
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'callback'])->where('provider', 'google|github|twitter');

Route::get('/dashobard', [UserController::class, 'dashboard'])->name('dashboard');
Route::get('sendMail', [SendMailController::class, 'index'])->name('sendMail.index');
Route::get('send-email', [SendMailController::class, 'sendEmail'])->name('sendEmail.send');
Route::post('sendMailData', [SendMailController::class, 'fetchMailData'])->name('fetchMail.data');

<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
Route::get('/dashobard', [UserController::class, 'dashboard'])->name('dashboard');

// GitHub Redirect
Route::get('/auth/github/redirect', function () {
    return Socialite::driver('github')->redirect();
});
// GitHub Callback
Route::get('/auth/github/callback', function () {
    try {
        $socialiteUser = Socialite::driver('github')->user();

        $validator = Validator::make(
            ['email' => $socialiteUser->getEmail()],
            ['email' => ['unique:users,email']],
            ['email.unique' => 'Coudn\'t log in. Maybe you used a different login method?']
        );

        $user = User::firstOrCreate(
            [
                'provider_id' => $socialiteUser->getId(),
                'provider' => 'github',
            ],
            [
                'name' => $socialiteUser->getName(),
                'email' => $socialiteUser->getEmail(),
                'email_verified_at' => now(),
            ]
        );

        Auth::login($user);

        return redirect()->route('dashboard');
    } catch (\Exception $e) {
        // Log the error for debugging
        \Log::error('GitHub OAuth Error: ' . $e->getMessage());

        return redirect()->route('login')->with('error', 'Authentication failed. Please try again.');
    }
});

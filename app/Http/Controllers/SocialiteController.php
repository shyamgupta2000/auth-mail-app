<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class SocialiteController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            $socialiteUser = Socialite::driver($provider)->user();
    
            $validator = Validator::make(
                ['email' => $socialiteUser->getEmail()],
                ['email' => ['unique:users,email']],
                ['email.unique' => 'Coudn\'t log in. Maybe you used a different login method?']
            );
    
            $user = User::firstOrCreate(
                [
                    'provider_id' => $socialiteUser->getId(),
                    'provider' => $provider,
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
            Log::error('GitHub OAuth Error: ' . $e->getMessage());
    
            return redirect()->route('login')->with('error', 'Authentication failed. Please try again.');
        }
    }
}

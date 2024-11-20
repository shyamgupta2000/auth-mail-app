<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginSave(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)){
            return redirect()->route('dashboard');
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerSave(Request $request)
    {
        $data = $request->validate([
            'name'=> 'required|string',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $user = User::create($data);

        if($user)
        {
            return redirect()->route('login');
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function forgotPassword()
    {
        return view('auth.forgot_password');
    }

    public function forgotPasswordSave(Request $request)
    {
        dd($request->email);
        // return view('auth.forgot_password');
    }

    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        } else{
            return redirect()->route('login');
        }
    }
}

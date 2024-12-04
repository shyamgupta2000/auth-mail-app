<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Jobs\SendMailJob;

class SendMailController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return view('components.send_mail');
        } else{
            return redirect()->route('login');
        }
    }

    public function sendEmail()
    {
        if(Auth::check()){
            $data['email'] = 'webdevops2000@gmail.com';
            dispatch(new SendMailJob($data));
            dd('Success');
        } else{
            return redirect()->route('login');
        }
    }

    public function fetchMailData(Request $request){
        $data = $request->validate([
            'content'=> 'required|string',
            // 'email' => 'required|email',
            // 'password' => 'required|confirmed',
        ]);

        dd($data);
    }
}

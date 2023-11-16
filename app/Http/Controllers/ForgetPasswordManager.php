<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgetPasswordManager extends Controller
{
    //
    public function forgetPassword(){
        return view('Auth.forget-password');
    }
    public function forgotPasswordPost(Request $request){
        $request->validate([
            'email' =>'required|email|exists:users',
        ]);

        $token = Str::random(length:64);
    }
}

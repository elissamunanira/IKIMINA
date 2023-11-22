<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgetPasswordManager extends Controller
{
    //
    public function forgetPassword(){
        return view('Auth.forget-password');
    }
    public function forgotPasswordPost(){
        
    }
}

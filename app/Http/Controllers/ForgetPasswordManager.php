<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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

        $token = Str::random(64);

        DB::table('password_reset')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);
    }
}

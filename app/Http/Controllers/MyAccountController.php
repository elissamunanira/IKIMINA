<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Saving;
use App\Models\Loan;
use App\Models\LoanCategory;

class MyAccountController extends Controller
{
    
    public function myAccount()
    {
        $i=0;
        $v=0;
        $user = auth()->user();
        $savings = $user->savings;
        $loans = $user->loans;
        $penalties = $user->penalties;
        return view('account.my-account', compact('savings','loans','penalties','v','i'));
    }
    
}

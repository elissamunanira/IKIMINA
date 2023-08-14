<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Saving;
use App\Models\Loan;
use App\Models\Penalty;
use App\Models\LoanCategory;

class MyAccountController extends Controller
{
    
    public function mySaving()
    {
        $i=0;
        $user = auth()->user();
        $savings = $user->savings;
        $loans = $user->loans;
        $penalties = $user->penalties;
        return view('account.my-account', compact('savings','loans','penalties','i'));
    }
    

    public function myLoan()
    {
        $v=0;
        $user = auth()->user();
        $loans = $user->loans;
        return view('account.my-loan', compact('loans','v'));
    }

     public function myPenalty()
    {
        $i=0; 
        $user = auth()->user(); 
        $penalties = $user->Penalty;
        return view('account.my-penalties', compact('penalties','i'));
    }

    public function myMituelle()
    {
        $i=0; 
        $user = auth()->user(); 
        $mituelles = $user->Mituelle;
        return view('account.my-mituelles', compact('mituelles','i'));
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Saving;

class SavingController extends Controller
{



    public function index(){
 
        $users = User::all();
        $savings = Saving::all();
        return view('saving.index',compact('users','savings'));
    }

    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:0',
            'month' => 'required|date',
        ]);

        $savings = new Saving;
        $savings->user_id = $validatedData['user_id'];
        $savings->amount = $validatedData['amount'];
        $savings->month = $validatedData['month'];
        $savings->save();

        return redirect()->back()->with('success', 'Savings record added successfully.');
    }

    public function create(){
        $users = User::all();
        return view('saving.create',compact('users'));
    }

    public function showSavings(User $user)
    {
        $savings = Saving::where('user_id', $user->id)->get();
        return view('saving.index', compact('user', 'savings'));
    }
    public function mySavings()
    {
        $user = auth()->user();
        $savings = $user->savings;
        return view('saving.my-savings', compact('savings'));
    }


    public function totalSavings(){
        
        $users = User::with('saving')->get();

        foreach ($users as $user) {
            $totalSavings = $user->saving->sum('amount');
            return view('savings.totalSaving',compact('users','totalSaving'));
        }
    }
}

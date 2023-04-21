<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Saving;

class SavingController extends Controller
{



    public function index(){
        $savings = Saving::all();
        return view('saving.index',compact('savings'));
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
        return view('saving.create');
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
}

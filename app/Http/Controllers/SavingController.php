<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Saving;
use App\Models\Loan;

class SavingController extends Controller
{



    public function index(){


        $user = User::all();
        $savings = $user->savings;
        return view('savings.index',compact('users','savings'));
 
        // $users = User::all();
        // $savings = Saving::all();
        // return view('savings.index',compact('users','savings'));
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
        return view('savings.create',compact('users'));
    }

    public function showSavings(User $user)
    {
        $i = 0;
        $savings = Saving::where('user_id', $user->id)->get();
        return view('savings.index', compact('user', 'savings','i'));
    }
    public function edit($id){
        $saving = Saving::with('user')->find($id);
        $users = User::select(DB::raw("CONCAT(firstname, ' ', lastname) AS full_name"), 'id')->pluck('full_name', 'id');
        return view('savings.edit',compact('saving','users'));
    }

    public function update(){
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:0',
            'month' => 'required|date',
        ]);

        $savings = Saving::find($id);
        $savings->user_id = $validatedData['user_id'];
        $savings->amount = $validatedData['amount'];
        $savings->month = $validatedData['month'];
        $savings->save();

        return redirect()->back()->with('success', 'Savings record Updated successfully.');
    }

    public function totalSavings(){
        
        $users = User::with('savings')->get();

        foreach ($users as $user) {
            $totalSavings = $user->savings->sum('amount');
            return view('savings.totalSaving',compact('users','totalSavings'));
        }
    }

    public function singleTotalSavings(){

        $i=0;
        $users = User::with('savings')->get();
        return view('savings.totalSaving',compact('users','i'));
    }
}

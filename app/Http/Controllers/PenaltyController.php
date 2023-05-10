<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rule;

class PenaltyController extends Controller
{
    public function index()
    {
        $penalties = Penalty::with(['user', 'rule'])->orderBy('created_at', 'desc')->get();
        return view('penalties.index', compact('penalties'));
    }

    public function create()
    {
        $users = user::all();
        $rules = Rule::all();
        return view('penalties.create', compact('users', 'rules'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'rule_id' => 'required|exists:rules,id',
            'description' => 'required',
            'amount' => 'required|numeric',
        ]);

        $penalty = Penalty::create($validated);

        // Apply the penalty
        // ...

        return redirect()->route('penalties.index');
    }

    public function pay(Penalty $penalty)
    {
        $penalty->update(['paid' => true]);
    }
}

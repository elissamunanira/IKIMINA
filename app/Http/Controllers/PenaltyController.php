<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenaltyController extends Controller
{
    public function index()
    {
        $penalties = Penalty::with(['member', 'rule'])->orderBy('created_at', 'desc')->get();
        return view('penalties.index', compact('penalties'));
    }

    public function create()
    {
        $members = Member::all();
        $rules = Rule::all();
        return view('penalties.create', compact('members', 'rules'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'member_id' => 'required|exists:members,id',
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

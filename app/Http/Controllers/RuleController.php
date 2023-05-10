<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rule;

class RuleController extends Controller
{
     public function index()
    {
        $rules = Rule::orderBy('created_at', 'desc')->get();
        return view('rules.index', compact('rules'));
    }

    public function create()
    {
        return view('rules.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            // 'penalty_points' => 'required|numeric',
        ]);

        Rule::create($validated);

        return redirect()->route('rules.index');
    }

    public function edit(Rule $rule)
    {
        return view('rules.edit', compact('rule'));
    }

    public function update(Request $request, Rule $rule)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'penalty_points' => 'required|numeric',
        ]);

        $rule->update($validated);

        return redirect()->route('rules.index');
    }

    public function destroy(Rule $rule)
    {
        $rule->delete();

        return redirect()->route('rules.index');
    }
}

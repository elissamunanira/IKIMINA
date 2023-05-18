<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Budget;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $i = 0;
         $budgets = Budget::all();

        return view('budgets.index', compact('budgets','i'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('budgets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
        'action_name' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'budget_amount' => 'required|numeric',
    ]);

    Budget::create($validatedData);

    return redirect()->route('budgets.index');
    }

    /**
     * Display the specified resource.
     */
   public function show(Budget $budget)
{
    return view('budgets.show', compact('budget'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $budget = Budget::find($id);
        return view('budgets.edit',compact('budget'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $budget = Budget::findOrFail($id);

        $request->validate([
            'action_name' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'budget_amount' => 'required|numeric',
        ]);

        $budget->action_name = $request->action_name;
        $budget->start_date = $request->start_date;
        $budget->end_date = $request->end_date;
        $budget->budget_amount = $request->budget_amount;
        $budget->save();

        return redirect()->route('budgets.index')->with('success', 'Budget updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $budget = Budget::findOrFail($id);
        $budget->delete();

        return redirect()->route('budgets.index')->with('success', 'Budget deleted successfully.');
    }
}

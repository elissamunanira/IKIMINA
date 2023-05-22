<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create($budgetLineId)
    {
        $budgetLine = BudgetLine::findOrFail($budgetLineId);
        return view('expenses.create', compact('budgetLine'));
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'expense_name' => 'required',
            'expense_amount' => 'required|numeric',
            'description' => 'required',
            'budget_line_id' => 'required|exists:budget_lines,id',
        ]);

        Expense::create($validatedData);

        return redirect()->route('expenses.index')->with('success', 'Expense created successfully.');

        $validatedData = $request->validate([
            'expense_name' => 'required',
            'description' => 'required',
            'amount' => 'required|numeric',
        ]);

        $budgetLine = BudgetLine::findOrFail($budgetLineId);
        $expense = new Expense($validatedData);
        $budgetLine->expenses()->save($expense);

        return redirect()->route('budgets.show', $budgetLine->budget->id)
            ->with('success', 'Expense created successfully');

    }


    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

      public function update(Request $request, Expense $expense)
    {
        $validatedData = $request->validate([
            'expense_name' => 'required',
            'expense_amount' => 'required|numeric',
            'description' => 'required',
            'budget_line_id' => 'required|exists:budget_lines,id',
        ]);

        $expense->update($validatedData);

            return redirect()->route('expenses.index')->with('success', 'Expense updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();

        return redirect()->route('expenses.index')->with('success', 'Expense deleted successfully.');
    }
}

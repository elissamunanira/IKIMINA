<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Budget;
use App\Models\BudgetLine;
use App\Models\Expense;

class ExpenseController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */

   public function index($id)
    {
        $i = 0;
        $expenses = Expense::all();
        $budgetLine = BudgetLine::findOrFail($id);
        return view('expenses.index', compact('expenses','budgetLine','i'));
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
    
    public function store(Request $request, $budgetLineId)
    {
        $validatedData = $request->validate([
            'expense_name' => 'required',
            'description' => 'required',
            'expense_amount' => 'required|numeric',
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

    public function show($id)
    {
        $expense = Expense::findOrFail($id);
        // $budgetLine = BudgetLine::findOrFail($budgetLineId);
        return view('expenses.show', compact('expense'));
    }

    /**
     * Show the form for editing the specified resource.
     */

     public function edit($budgetLineId, $expenseId)
    {
        $budgetLine = BudgetLine::findOrFail($budgetLineId);
        $expense = Expense::findOrFail($expenseId);
        return view('expenses.edit', compact('budgetLine', 'expense'));
    }

    /**
     * Update the specified resource in storage.
     */

    //   public function update(Request $request, Expense $expense)
    // {
    //     $validatedData = $request->validate([
    //         'expense_name' => 'required',
    //         'expense_amount' => 'required|numeric',
    //         'description' => 'required',
    //         'budget_line_id' => 'required|exists:budget_lines,id',
    //     ]);

    //     $expense->update($validatedData);

    //         return redirect()->route('expenses.index')->with('success', 'Expense updated successfully.');
    // }


      public function update(Request $request, $budgetLineId, $expenseId)
    {
        $validatedData = $request->validate([
            'expense_name' => 'required',
            'description' => 'required',
            'expense_amount' => 'required|numeric',
        ]);

        $budgetLine = BudgetLine::findOrFail($budgetLineId);
        $expense = Expense::findOrFail($expenseId);
        $expense->update($validatedData);

        return redirect()->route('budgets.show', $budgetLine->budget->id)
            ->with('success', 'Expense updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Expense $expense)
    // {
    //     $expense->delete();

    //     return redirect()->route('expenses.index')->with('success', 'Expense deleted successfully.');
    // }

     public function destroy($budgetLineId, $expenseId)
    {
        $budgetLine = BudgetLine::findOrFail($budgetLineId);
        $expense = Expense::findOrFail($expenseId);
        $expense->delete();

        return redirect()->route('budgets.show', $budgetLine->budget->id)
            ->with('success', 'Expense deleted successfully');
    }


}

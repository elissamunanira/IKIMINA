<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Budget;
use App\Models\BudgetLine;

class BudgetLineController extends Controller
{
    public function index(Budget $budget)
    {
        $i = 0;
        $budgetLines = $budget->budgetLines;
        return view('budgetlines.index', compact('i','budget', 'budgetLines'));
    }

    public function create(Budget $budget)
    {
        return view('budgetlines.create', compact('budget'));
    }

    public function store(Request $request, Budget $budget)
    {
        $validatedData = $request->validate([
            'budget_line_name' => 'required|string|max:255',
            'budget_line_amount' => 'required|numeric|min:0',
            'budget_line_description' => 'required' 
        ]);

        $budgetLine = $budget->budgetLines()->create($validatedData);

        return redirect()->route('budgets.budgetlines.show', ['budget' => $budget, 'budgetline' => $budgetLine]);
    }

    public function show(Budget $budget, BudgetLine $budgetLine)
    {
        return view('budgetlines.show', compact('budget', 'budgetLine'));
    }

    public function edit(Budget $budget, BudgetLine $budgetLine)
    {
        return view('budgetlines.edit', compact('budget', 'budgetLine'));
    }

    public function update(Request $request, Budget $budget, BudgetLine $budgetLine)
    {
        $validatedData = $request->validate([
            'budget_line_name' => 'required|string|max:255',
            'budget_line_amount' => 'required|numeric|min:0',
        ]);

        $budgetLine->update($validatedData);

        return redirect()->route('budgets.budgetlines.show', ['budget' => $budget, 'budgetline' => $budgetLine]);
    }

    public function destroy(Budget $budget, BudgetLine $budgetLine)
    {
        $budgetLine->delete();

        return redirect()->route('budgets.budgetlines.index', $budget);
    }
}
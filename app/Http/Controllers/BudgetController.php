<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Budget;
use App\Models\BudgetLine;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $i = 0;
        //  $budgetLine = BudgetLine::all();
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
        'budget_name' => 'required',
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
            'budget_name' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'budget_amount' => 'required|numeric',
        ]);

        $budget->budget_name = $request->budget_name;
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


        public function compareBudgetExpenses()
    {

        $i = 0;
        // Retrieve all budget lines
        $budgetLines = BudgetLine::all();

        // Initialize variables for total budgeted amount and total actual expenses
        $totalBudgetedAmount = 0;
        $totalActualExpenses = 0;

        // Calculate the variance for each budget line and sum up the totals
        foreach ($budgetLines as $budgetLine) {
            // Sum up the budgeted amounts
            $totalBudgetedAmount += $budgetLine->budget_line_amount;

            // Retrieve the actual expenses for the budget line
            $actualExpenses = $budgetLine->expenses()->sum('expense_amount');

            // Sum up the actual expenses
            $totalActualExpenses += $actualExpenses;

            // Calculate the variance for the budget line
            $variance = $actualExpenses - $budgetLine->amount;

            $percentage = ($variance*100)/$budgetLine->amount;

            // Add the variance to the budget line object
            $budgetLine->variance = $variance;
        }

        // Calculate the overall variance (profit or loss)
        $overallVariance = $totalActualExpenses - $totalBudgetedAmount;

        return view('budgets.compare', [
            'budgetLines' => $budgetLines,
            'totalBudgetedAmount' => $totalBudgetedAmount,
            'totalActualExpenses' => $totalActualExpenses,
            'overallVariance' => $overallVariance,'percentage'=>$percentage,'i'=>$i
        ]);
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Budget;
use App\Models\BudgetLine;
use App\Models\Expense;


class RealityController extends Controller
{
    public function budgetReality(){

    }

    public function budgetLineReality(){

        // Retrieve all budget lines
        $budgetLines = BudgetLine::all();

        // Initialize variables for total budgeted amount and total actual expenses
        $totalBudgetedAmount = 0;
        $totalActualExpenses = 0;

        // Iterate over each budget line
        foreach ($budgetLines as $budgetLine) {
            // Sum up the budgeted amounts
            $totalBudgetedAmount += $budgetLine->budget_line_amount;

            // Retrieve the actual expenses for the budget line
            $actualExpenses = $budgetLine->expenses()->sum('expense_amount');
            
            // Sum up the actual expenses
            $totalActualExpenses += $actualExpenses;
            
            // Calculate the variance for the budget line
            $variance = $actualExpenses - $budgetLine->amount;

            // Output the results for each budget line
            // echo "Budget Line: " . $budgetLine->name . "\n";
            // echo "Budgeted Amount: " . $budgetLine->amount . "\n";
            // echo "Actual Expenses: " . $actualExpenses . "\n";
            // echo "Variance: " . $variance . "\n";
            // echo "----------------------------------\n";
        }

        // Calculate the overall variance (profit or loss)
        $overallVariance = $totalActualExpenses - $totalBudgetedAmount;

        return view('budget.reality',compact('budgetLines','totalBudgetedAmount','actualExpenses','totalActualExpenses','variance','overallVariance'));

    }

}

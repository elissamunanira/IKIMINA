<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = ['expense_name', 'expense_description', 'expense_amount', 'expense_date', 'budget_line_id'];


    public function budgetLine()
    {
        return $this->belongsTo(BudgetLine::class);
    }
    

}

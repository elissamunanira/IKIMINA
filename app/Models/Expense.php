<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;


    public function budgetLine()
    {
        return $this->belongsTo(BudgetLine::class);
    }
    

}

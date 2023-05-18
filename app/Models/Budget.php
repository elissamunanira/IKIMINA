<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;
     
    protected $fillable = ['budget_name', 'start_date', 'end_date', 'budget_amount' ];

    public function budgetLines()
    {
        return $this->hasMany(BudgetLine::class);
    }
}

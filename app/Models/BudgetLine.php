<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetLine extends Model
{
    use HasFactory;

    public function budget()
    {
        return $this->belongsTo(Budget::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

}

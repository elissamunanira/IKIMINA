<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory; 
    
    protected $fillable = ['user_id', 'loan_category', 'loan_amount', 'interest_amount', 'total_amount'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function loanCategory()
    {
        return $this->belongsToMany(LoanCategory::class);
    }
    public function payment() {
        return $this->hasMany(Payment::class);
    }


}

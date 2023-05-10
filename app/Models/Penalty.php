<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penalty extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'rule_id', 'description', 'amount', 'paid'];

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function rule()
    {
        return $this->belongsTo(Rule::class);
    }
}

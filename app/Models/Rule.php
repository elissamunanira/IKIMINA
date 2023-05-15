<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;
    
    protected $fillable = ['name','description','rule_amount'];

    public function penalty(){

        return $this->hasMany(Penalty::class);
    }
}

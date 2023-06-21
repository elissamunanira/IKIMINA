<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mituelle extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','mituelle_amount','mituelle_month'];

    public function user(){
        $this->belongsTo(User::class);
    }
}

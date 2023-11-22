<?php

// namespace App\Models;
namespace App\Imports;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Saving;

class SavingImport implements ToModel
{
    public function model(array $row)
    {
        return new Saving([
            'user_id' => $row['user_id'],
            'amount' => $row['amount'],
            'month' => $row["month"],
        ]);
    }
}
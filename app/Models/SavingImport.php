<?php

// namespace App\Models;
namespace App\Imports;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Saving;

class SavingImport implements ToModel
{
    public function map($row):array
    {
        return new Saving([
            'user_id' => $row[0],
            'amount' => $row[1],
            'month' => $row[2],
        ]);
    }
}
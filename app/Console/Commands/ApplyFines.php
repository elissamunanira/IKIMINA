<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Saving;
use App\Models\Fine;

class ApplyFines extends Command
{
    protected $signature = 'apply:fines';
    protected $description = 'Apply fines based on specific date of every month';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $specifiedDate = 15; // Change this to your desired date
        $currentDate = Carbon::now();

        // Check if the current date has passed the specified date of the month
        if ($currentDate->day >= $specifiedDate) {
            // Get all savings for which fines need to be applied
            $overdueSavings = Saving::where('fine_applied', false)
                ->where('month', '<', $currentDate->subMonth())
                ->get();

            foreach ($overdueSavings as $saving) {
                $fineAmount = $saving->amount * 0.05; // 5% of the amount as a fine

                // Store the fine in the fines table
                Fine::create([
                    'user_id' => $saving->user_id,
                    'amount' => $fineAmount,
                ]);

                // Mark the saving as fined and update the amount
                $saving->update([
                    'fine_applied' => true,
                    'amount' => $saving->amount + $fineAmount,
                ]);

                // Optionally, you can notify the user about the fine
                // Implement your notification logic here
            }

            $this->info('Fines applied successfully.');
        } else {
            $this->info('Fines not applicable yet.');
        }
    }
}
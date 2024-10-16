<?php

namespace App\Console\Commands;

use App\Models\Pekerjaan;
use Illuminate\Console\Command;
use App\Models\YourModel; // Ganti dengan nama model Anda
use Illuminate\Support\Facades\Log;

class UpdateExpiredStatuses extends Command
{
    protected $signature = 'status:update-expired';
    protected $description = 'Update statuses to closed if expired_date has passed';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        Log::info('Status update expired command executed.');
        $now = now();
        $this->info("Current time: {$now}");
    
        $jobsToClose = Pekerjaan::where('expired', '<', $now)
            ->where('status', '!=', 'close') // Hanya update yang belum closed
            ->get();
    
        $this->info("Found {$jobsToClose->count()} jobs to close.");
    
        foreach ($jobsToClose as $job) {
            $this->info("Job ID {$job->id} will be closed.");
        }
    
        Pekerjaan::where('expired', '<', $now)
            ->where('status', '!=', 'close') // Hanya update yang belum closed
            ->update(['status' => 'close']);
    
        $this->info('Statuses updated to closed where expired_date has passed.');
    }
    
}

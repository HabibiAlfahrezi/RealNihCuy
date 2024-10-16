<?php

namespace App\Console\Commands;

use App\Models\Subscription;
use Midtrans\Snap;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CheckPaymentStatus extends Command
{
    protected $signature = 'payment:check-status';
    protected $description = 'Check and update payment status';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */


    /**
     * The console command description.
     *
     * @var string
     */


    /**
     * Execute the console command.
     */
 //
    
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        Log::info('Payment check status command executed.');
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $subscriptions = Subscription::where('status', 'pending')->get();
        foreach ($subscriptions as $subscription) {
            try {
                $status = Snap::status($subscription->order_id);
                $transactionStatus = $status->transaction_status;
                
                switch($transactionStatus) {
                    case 'capture':
                    case 'settlement':
                        $subscription->status = 'success';
                        break;
                    case 'pending':
                        $subscription->status = 'pending';
                        break;
                    case 'deny':
                    case 'expire':
                    case 'cancel':
                        $subscription->status = $transactionStatus;
                        break;
                    default:
                        $subscription->status = 'unknown';
                }
                $subscription->save();
            } catch (\Exception $e) {
                $this->error("Failed to check status for Order ID: {$subscription->order_id}");
            }
        }
    }
}

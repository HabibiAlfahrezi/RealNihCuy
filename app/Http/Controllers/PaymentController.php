<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Pricing;
use App\Models\Subscription;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Snap;

class PaymentController extends Controller
{

    public function pricing(){
   

        return view('pricing');
    }

    
    public function create(Request $request)
    {
        $request->validate([
            'price' => 'required|numeric',
            'item_name' => 'required|string',
        ]);
    
        $data = $request->only(['price', 'item_name']);
    
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
    
        $orderId = 'ORDER-' . time();
        $transaction = Subscription::create([
            'user_id' => Auth::user()->id,
            'item_name' => $data['item_name'],
            'price' => $data['price'],
            'status' => 'pending',
            'order_id' => $orderId,
        ]);


        
        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => (int)$data['price'],
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ],
            'item_details' => [
                [
                    'id' => 'ITEM1',
                    'price' => (int)$data['price'],
                    'quantity' => 1,
                    'name' => $data['item_name']
                ]
            ],
            'callbacks' => [
                'finish' => route('payment.finish'),
            ],
            'enabled_payments' => [
            'credit_card',  // Kartu Kredit
            'gopay',        // GoPay (termasuk QRIS untuk Dana, dll.)
            'bri_va',       // BRI Virtual Account
            'bni_va',       // BNI Virtual Account
            'bca_va',       // BCA Virtual Account
            ],
        ];
    
        try {
            $paymentUrl = Snap::createTransaction($params)->redirect_url;
    
            $transaction->snap_token = $paymentUrl;
            $transaction->save();
    
            return redirect($paymentUrl);
    
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create payment',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
  

    public function finish(Request $request)
    {
        $orderId = $request->input('order_id');
        $transactionStatus = $request->input('transaction_status');
    
        // Temukan transaksi berdasarkan order_id
        $transaction = Subscription::where('order_id', $orderId)->first();
    
        if ($transaction) {
            // Update status transaksi
            switch($transactionStatus) {
                case 'capture':
                case 'settlement':
                    $transaction->status = 'success';
                    break;
                case 'pending':
                    $transaction->status = 'pending';
                    break;
                case 'deny':
                case 'expire':
                case 'cancel':
                    $transaction->status = $transactionStatus;
                    break;
                default:
                    $transaction->status = 'unknown';
            }
            $transaction->save();
    
            // Update UserProfile dengan role "Premium"
            if ($transaction->status === 'success') {
                $userId = $transaction->user_id;
                Company::where('user_id', $userId)->update([
                    'role' => 'Premium'
                ]);
                return redirect()->route('home')->with('status', 'Payment processed successfully and user role updated to Premium.');
            } else {
                return redirect()->route('home')->with('error', 'Payment failed.');
            }
        }
    
        return redirect()->route('home')->with('error', 'Transaction not found.');
    }
    
    
}

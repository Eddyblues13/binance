<?php

namespace App\Http\Controllers\User;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WithdrawalController extends Controller
{
    // Show the withdrawal form
    public function create()
    {
        $userId = Auth::id();

        $data['usd_sum'] = Transaction::where('user_id', $userId)
        ->sum('usd_value');
        return view('user.withdrawal.create',$data);
    }

    public function wallet()
    {
        $userId = Auth::id();

        $data['usd_sum'] = Transaction::where('user_id', $userId)
        ->sum('usd_value');
        return view('user.withdrawal.withdraw-wallet',$data);
    }

    // Handle form submission and show confirmation receipt
    public function confirm(Request $request)
    {
        // Validate the request
        $request->validate([
            'crypto' => 'required|string',
            'wallet' => 'required|string',
            'amount' => 'required|numeric|min:10', // Example validation for amount
        ]);

        // Generate a random transaction ID (in reality, this would come from a database or payment gateway)
        $transactionId = strtoupper(uniqid('TXN-'));

        // Pass the details to the confirmation view
        return view('user.withdrawal.confirm', [
            'transactionId' => $transactionId,
            'crypto' => $request->crypto,
            'wallet' => $request->wallet,
            'amount' => $request->amount,
        ]);
    }
}

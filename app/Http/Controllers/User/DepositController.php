<?php

namespace App\Http\Controllers\User;

use App\Models\Deposit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DepositController extends Controller
{
    public function index()
    {
        return view('user.deposit.home');
    }


    public function handleDeposit(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([

            'crypto_method' => 'nullable|string',

        ]);


        // Assuming Wallet model stores details about payment methods (like BTC, ETH, etc.)
        // Use where to search for a wallet by its payment mode (code or type)
        // $wallet = Wallet::first();

        // Pass all necessary data to the view
        return view('user.deposit.payment', [
            // 'wallet' => $wallet, // Wallet details
            'method' => $validatedData['crypto_method'], // Amount

        ]);
    }


    public function handlePayment(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:0',
            'payment_mode' => 'required|string',
            'proof' => 'sometimes|file|mimes:jpg,jpeg,png,pdf|max:2048', // Validate the proof of payment if uploaded
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Retrieve form input
        $depositType = $request->input('deposit_type');
        $amount = $request->input('amount');
        $paymentMode = $request->input('payment_mode');

        // Initialize filePath variable
        $filePath = null;

        // Handle the proof file upload if present
        if ($request->hasFile('proof')) {
            $file = $request->file('proof');
            $filePath = $file->store('payment_proofs', 'public'); // Store the file in the 'payment_proofs' directory
        }

        // Ensure the user is authenticated
        if (Auth::check()) {
            // Create the deposit record in the database
            Deposit::create([
                'user_id' => Auth::id(),
                'deposit_type' => $paymentMode,
                'amount' => $amount,
                'payment_mode' => $paymentMode,
                'status' => 'pending', // Set the initial status to pending
                'proof' => $filePath,  // Save the file path if uploaded
            ]);



            // Redirect to the deposits page with a success message
            return redirect()->route('deposits')->with('status', 'Payment submitted successfully!');
        }

        // If user is not authenticated, redirect back with an error
        return redirect()->back()->with('error', 'You need to be logged in to submit a payment.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    // Step 1: Show the list of available deposit methods (cryptocurrencies)
    public function showDepositMethods()
    {
        // List of cryptocurrencies and their corresponding images
        $cryptos = [
            ['name' => 'Bitcoin', 'image' => 'bitcoin.png'],
            ['name' => 'Ethereum', 'image' => 'ethereum.png'],
            ['name' => 'Litecoin', 'image' => 'litecoin.png'],
            ['name' => 'USDT', 'image' => 'usdt.png'],
            ['name' => 'Ripple', 'image' => 'ripple.png'],
            // Add other cryptocurrencies as needed...
        ];

        return view('deposits.methods', compact('cryptos'));
    }

    // Step 2: Show the specific deposit method page with wallet address and QR code
    public function showPaymentPage($crypto)
    {
        // This is where you would fetch the correct wallet address and QR code based on the crypto
        // For example purposes, we'll use hardcoded values. In a real app, you'd fetch from a database.
        $wallets = [
            'Bitcoin' => [
                'address' => '1A1zP1eP5QGefi2DMPTfTL5SLmv7DivfNa',
                'qr_code' => 'bitcoin_qr.png'
            ],
            'Ethereum' => [
                'address' => '0x32Be343B94f860124dC4fEe278FDCBD38C102D88',
                'qr_code' => 'ethereum_qr.png'
            ],
            'Litecoin' => [
                'address' => 'LcHKjcQf25YqESn8xrmhg5cwYUR5fbJb8j',
                'qr_code' => 'litecoin_qr.png'
            ],
            'USDT' => [
                'address' => 'TFL1jGpeASdAF7R4J5XBhjCC9YrYrmytfQ',
                'qr_code' => 'usdt_qr.png'
            ],
            // Add more wallets and QR codes for other cryptocurrencies...
        ];

        if (!isset($wallets[$crypto])) {
            // If the crypto is not found, redirect to deposit methods
            return redirect()->route('deposit.methods')->with('error', 'Invalid cryptocurrency method.');
        }

        // Fetch the wallet address and QR code for the selected crypto
        $walletAddress = $wallets[$crypto]['address'];
        $qrCodeImage = $wallets[$crypto]['qr_code'];
        $cryptoName = $crypto;

        return view('deposits.payment', compact('cryptoName', 'walletAddress', 'qrCodeImage'));
    }

    // Step 3: Handle the proof of payment upload
    public function uploadPaymentProof(Request $request)
    {
        // Validate the request
        $request->validate([
            'proof' => 'required|file|mimes:jpeg,png,pdf|max:2048', // Proof must be an image or PDF file, max 2MB
            'crypto_method' => 'required|string',
            'wallet_address' => 'required|string'
        ]);

        // Handle the file upload
        if ($request->hasFile('proof')) {
            $file = $request->file('proof');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_proof.' . $extension;
            $file->move('uploads/payment_proofs/', $filename);

            // Save proof info to the database (optional)
            // You might want to store the file path and other details in a 'deposits' or 'transactions' table
            // Assuming you have a 'Deposit' model...
            /*
             Deposit::create([
                 'user_id' => auth()->id(),
                 'crypto_method' => $request->crypto_method,
                 'wallet_address' => $request->wallet_address,
                 'payment_proof' => 'uploads/payment_proofs/' . $filename,
                 'status' => 'pending', // Set to pending until admin approval
             ]);
             */

            // Redirect back with success message
            return redirect()->route('deposit.methods')->with('success', 'Payment proof uploaded successfully.');
        }

        return back()->with('error', 'Failed to upload payment proof. Please try again.');
    }



    public function Profile()
    {
        return view('user.profile');
    }
}

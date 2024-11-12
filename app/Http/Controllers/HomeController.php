<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

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

    public function testing()
    {
        $userId = Auth::id();

        // Sum of investments
        $data['usd_sum'] = Transaction::where('user_id', $userId)
            ->sum('usd_value');

        // Get the user model
        $user = Auth::user(); // Retrieve the authenticated user

        // Get the user's currency
        $userCurrency = $user->currency; // E.g., 'EUR', 'GBP', etc.
        $usdValue = $data['usd_sum']; // The value in USD

        // Convert the USD value to the user's currency
        // $convertedValue = $this->convertToUserCurrency($usdValue, $userCurrency);

        $usdValue = 100; // Example amount in USD
        $currency = 'EUR'; // Target currency, e.g., EUR

        // Call the conversion function
        //$convertedValue = $this->convertToUserCurrency($usdValue, $currency);

        // Add the converted value to the data array
        //$data['converted_value'] = $convertedValue;



        return view('testing', $data);
    }


    public function welcome()
    {
        $userId = Auth::id();

        // Sum of investments
        $data['usd_sum'] = Transaction::where('user_id', $userId)
            ->sum('usd_value');

        // Get the user model
        $user = Auth::user(); // Retrieve the authenticated user

        // Get the user's currency
        $userCurrency = $user->currency; // E.g., 'EUR', 'GBP', etc.
        $usdValue = $data['usd_sum']; // The value in USD

        // Convert the USD value to the user's currency
        // $convertedValue = $this->convertToUserCurrency($usdValue, $userCurrency);

        $usdValue = 100; // Example amount in USD
        $currency = 'EUR'; // Target currency, e.g., EUR

        // Call the conversion function
        //$convertedValue = $this->convertToUserCurrency($usdValue, $currency);

        // Add the converted value to the data array
        //$data['converted_value'] = $convertedValue;



        return view('user.welcome', $data);
    }



    public function index()
    {
        $userId = Auth::id();

        // Sum of investments
        $data['usd_sum'] = Transaction::where('user_id', $userId)
            ->sum('usd_value');

        // Get the user model
        $user = Auth::user(); // Retrieve the authenticated user

        // Get the user's currency
        $userCurrency = $user->currency; // E.g., 'EUR', 'GBP', etc.
        $usdValue = $data['usd_sum']; // The value in USD

        // Convert the USD value to the user's currency
        // $convertedValue = $this->convertToUserCurrency($usdValue, $userCurrency);

        $usdValue = 100; // Example amount in USD
        $currency = 'EUR'; // Target currency, e.g., EUR

        // Call the conversion function
        //$convertedValue = $this->convertToUserCurrency($usdValue, $currency);

        // Add the converted value to the data array
        //$data['converted_value'] = $convertedValue;



        return view('user.home', $data);
    }


    // private function convertToUserCurrency($usdValue, $currency)
    // {
    //     // Exchangerate.host endpoint for USD as the base currency
    //     $apiUrl = "https://api.exchangerate.host/convert?from=USD&to={$currency}";

    //     // Fetch exchange rate for USD to the selected currency
    //     $response = Http::get($apiUrl);

    //     if ($response->ok() && isset($response['result'])) {
    //         // Calculate the converted value
    //         return $usdValue * $response['result'];
    //     } else {
    //         throw new Exception("Unable to retrieve exchange rate.");
    //     }
    // }


    private function convertToUserCurrency($usdValue, $currency)
    {
        // Exchangerate.host endpoint for USD as the base currency, with amount specified
        $apiUrl = "https://api.exchangerate.host/convert?from=USD&to={$currency}&amount={$usdValue}";

        // Fetch exchange rate for USD to the selected currency
        $response = Http::get($apiUrl);

        if ($response->ok() && isset($response['result'])) {
            // Return the converted value directly from the response
            return $response['result'];
        } else {
            throw new \Exception("Unable to retrieve exchange rate.");
        }
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
        $userId = Auth::id();

        $data['usd_sum'] = Transaction::where('user_id', $userId)
            ->sum('usd_value');
        return view('user.profile', $data);
    }

    public function News()
    {
        $userId = Auth::id();

        $data['usd_sum'] = Transaction::where('user_id', $userId)
            ->sum('usd_value');
        return view('user.news', $data);
    }

    public function Calculator()
    {
        $userId = Auth::id();

        $data['usd_sum'] = Transaction::where('user_id', $userId)
            ->sum('usd_value');
        return view('user.calculator', $data);
    }

    public function Market()
    {
        $userId = Auth::id();

        $data['usd_sum'] = Transaction::where('user_id', $userId)
            ->sum('usd_value');
        return view('user.market', $data);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('status', 'You have been logged out successfully.');
    }

    public function Tradehistory()
    {
        $userId = Auth::id();

        $data['usd_sum'] = Transaction::where('user_id', $userId)
            ->sum('usd_value');
        return view('user.tradehistory', $data);
    }


    public function Orderbook()
    {
        $userId = Auth::id();

        $data['usd_sum'] = Transaction::where('user_id', $userId)
            ->sum('usd_value');
        return view('user.orderbook', $data);
    }


    public function personalDp(Request $request)
    {


        $update = Auth::user();



        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/display', $filename);
            $update->photo =  $filename;
        }
        $update->update();

        return back()->with('status', 'Personal Details Updated Successfully');
    }



    //   public function uploadProfile(Request $request)

    //   {


    //       $update = Auth::user();
    //       if ($request->hasFile('image')) {
    //           $file = $request->file('image');

    //           $ext = $file->getClientOriginalExtension();
    //           $filename = time() . '.' . $ext;
    //           $file->move('user/uploads/id', $filename);
    //           $update->photo =  $filename;
    //       }

    //       $update->update();

    //       return redirect('photo')->with('status', 'Profile Picture Updated!');
    //   }








    public function updatePassword(Request $request)
    {
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        #Match The Old Password
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully!");
    }



    public function profileUpdate(Request $request)
    {
        //validation rules

        $request->validate([
            'name' => 'string',
            'email' => 'string',
            'phone' => 'string',
            'address' => 'string'

        ]);
        $user = Auth::user();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->phone = $request['phone'];
        $user->address = $request['address'];


        $user->update();
        return back()->with('status', 'Profile Updated');
    }



    public function saveCurrency(Request $request)
    {
        // Validate the request data to ensure currency is provided
        $request->validate([
            'currency' => 'required|string'
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Save the selected currency to the user's profile in the database
        $user->currency = $request->currency;
        $user->save();

        // Respond with JSON indicating success
        return response()->json(['success' => true]);
    }

    // Save the selected country to session
    public function saveCountry(Request $request)
    {
        $request->validate([
            'country' => 'required|string'
        ]);
        // Get the authenticated user
        $user = Auth::user();

        // Save the selected currency to the user's profile in the database
        $user->country = $request->country;
        $user->save();

        // Respond with JSON indicating success
        return response()->json(['success' => true]);
    }
}

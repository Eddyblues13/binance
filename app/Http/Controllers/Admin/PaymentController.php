<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PaymentSetting;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function paymentSettings()
    {
        $data['payment'] = DB::table('payment_settings')->get();
        return view('admin.payment_settings', $data);
    }
    // Display a listing of the resource
    public function index()
    {
        $payment = PaymentSetting::all(); // Retrieve all PaymentSettingcurrencies
        return view('PaymentSettings.index', compact('payment')); // Adjust view name as necessary
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('PaymentSettings.create'); // Adjust view name as necessary
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'deposit_option' => 'required|string|max:255',
            // Add more validation rules as necessary
        ]);

        PaymentSetting::create($request->all()); // Adjust to match your fillable fields

        return redirect()->route('PaymentSettings.index')->with('success', 'PaymentSettingcurrency added successfully.');
    }

    // Show the form for editing the specified resource
    public function edit(PaymentSetting $PaymentSetting)
    {
        return view('PaymentSettings.edit', compact('PaymentSetting')); // Adjust view name as necessary
    }

    // Update the specified resource in storage
    public function update(Request $request, PaymentSetting $PaymentSetting)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'deposit_option' => 'required|string|max:255',
            // Add more validation rules as necessary
        ]);

        $PaymentSetting->update($request->all()); // Adjust to match your fillable fields

        return redirect()->route('PaymentSettings.index')->with('success', 'PaymentSettingcurrency updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy(PaymentSetting $PaymentSetting)
    {
        $PaymentSetting->delete();

        return redirect()->route('PaymentSettings.index')->with('success', 'PaymentSettingcurrency deleted successfully.');
    }
}

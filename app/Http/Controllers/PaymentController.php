<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'mode_of_payment' => 'required|string|max:255',
            'proof_of_payment' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048', // Adjust file types and size as needed
            'amount' => 'required|numeric|min:0',
        ]);

        // Handle file upload
        $proofOfPaymentPath = $request->file('proof_of_payment')->store('proofs', 'public');

        // Create a new payment record
        Payment::create([
            'user_id' => 1,
            'unit_id' => $request->unit_id,
            'mode_of_payment' => $request->mode_of_payment,
            'proof_of_payment' => $proofOfPaymentPath,
            'amount' => $request->amount,
        ]);

        return redirect()->back()->with('success', 'Payment record created successfully.');
    }
}

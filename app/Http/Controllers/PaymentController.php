<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payment;
use App\Models\Contract;
use App\Models\UserRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $payments = Payment::all();
        $contracts = Contract::all(); // Adjust as needed
        return view('payments.dashboard',[
            'contracts' => $contracts,
            'payments' => $payments,
        ]);

    }
    public function paymentsIndex(){
        $contracts = Contract::all(); // Adjust as needed
        return view('payments.index',[
            'contracts' => $contracts
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $coaches = User::where('role', 'coach')->get();
        $idField = 'coach_id'; // Adjust this based on your actual requirements
        return view('payments.index', compact('coaches', 'idField'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function makePayment(Request $request, $contractId)
    {
        // Additional validation and error handling can be added
        $request->validate([
            'amount' => 'required|numeric',
            'reference' => 'required|string|max:255',
        ]);

        $payment = new Payment([
            'contract_id' => $contractId,
            'amount' => $request->input('amount'),
            'reference' => $request->input('reference'),
            'status' => $request->input('status', 'pending'), 
        ]);

        $payment->save();

        // You might want to update the contract status or other details here

        return redirect()->back()->with('success', 'Payment successful!');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

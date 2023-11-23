<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\UserRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $requests = UserRequest::all(); // Adjust as needed
        return view('payments.index',[
            'requests' => $requests
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'coach_id' => 'required|exists:users,id',
        'reference' => 'required|string',
        'amount' => 'required|numeric',
        'startdate' => 'required|date',
        'enddate' => 'required|date|after_or_equal:startdate',
    ]);

    // Create a new payment instance
    $paymentData = [
        'trainee_id' => $request->user()->id,  // Assuming you want to store the coach's ID here
        'coach_id' => $request->input('coach_id'), 
        'reference' => $request->input('reference'),
        'amount' => $request->input('amount'),
        'startdate' => $request->input('startdate'),
        'enddate' => $request->input('enddate'),
        'status' => 'Pending',
    ];

    // Save the payment to the database
    Payment::create($paymentData);

    // Redirect or perform any additional actions as needed
    return redirect()->route('payments.index')->with('success', 'Payment created successfully');
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

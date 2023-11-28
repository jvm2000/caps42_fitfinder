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
    // Get the logged-in user
        $user = Auth::user();

        // Determine the role of the user
        $role = $user->role; // Assuming you have a 'role' attribute in your User model

        // Fetch the data based on the user's role
        if ($role == 'coach') {
            $requests = Contract::where('coach_id', $user->id)->get();
            $idField = 'trainee_id';
        } else {
            $requests = Contract::where('trainee_id', $user->id)->get();
            $idField = 'coach_id';
        }

    return view('payments.index', compact('requests', 'idField'));
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
    public function store(Request $request)
    {
        $idField = $request->input('idField');

        $request->validate([
            $idField => 'required|exists:users,id',
            'reference' => 'required|string',
            'amount' => 'required|numeric',
            'startdate' => 'required|date',
            'enddate' => 'required|date|after_or_equal:startdate',
        ]);

        // Create a new payment instance
        $paymentData = [
            'trainee_id' => $request->input('idField'),
            'coach_id' => $request->user()->id,
            'reference' => $request->input('reference'),
            'amount' => $request->input('amount'),
            'startdate' => $request->input('startdate'),
            'enddate' => $request->input('enddate'),
            'status' => 'Pending',
        ];

        // Save the payment to the database
        Payment::create($paymentData);

        // Redirect or perform any additional actions as needed
        return redirect()->route('payments.index', ['user' => $request->user()->id])
            ->with('success', 'Payment created successfully');
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

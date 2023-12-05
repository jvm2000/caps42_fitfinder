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

    public function showContractForPayment(Contract $contract){
        return view('payments.create',['contract' => $contract]);
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
    public function store(Request $request, Contract $contract)
    {
        $form = $request->validate([
            'contract_id' => ['required'],
            'reference' => ['required'],
            'amount' => ['required'],
        ]);

        $contract->payment()->create($form);

        return redirect('payments/dashboard')->with('success', 'Payment successful!');
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

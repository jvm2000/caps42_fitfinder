<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransactionInfo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $transaction = $user->transaction()->with('user')->latest();

        return view('user.payment-profile', compact('Transactions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {
        $form = $request->validate([
            'first_name'=>['required','string'],
            'last_name'=>['required','string'],
            'mobile_number'=>['required','string'],
        ]);


        TransactionInfo::create(['user_id' => $user->id] + $form);

        return back()->with('success', 'Payment Account Completed');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // Get the currently authenticated user
        $form = $request->validate([
            'first_name'=>['nullable','string'],
            'last_name'=>['nullable','string'],
            'mobile_number'=>['nullable','string'],
        ]);

        $user->update($form);

        return back()->with('message', 'Payment Account Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransactionInfo $transaction)
    {
        $transaction->delete();

        return back()->with('message', 'Successfully Deleted Payment');
    }
}

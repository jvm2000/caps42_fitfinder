<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SendRequestController extends Controller
{
    public function sendRequest(Request $request)
    {
        if ($request->has('sendRequest')) {
            $traineeId = $request->input('trainee_id');
            $coachId = $request->input('coach_id');
            
            // Check if a request already exists
            // Check if a payment already exists
            $existingPayment = Payment::where('trainee_id', $traineeId)
            ->where('coach_id', $coachId)
            ->first();
    
            if ($existingPayment) {
                return "A request has already been sent to this user.";
            }

            DB::table('requests')->insert([
                'trainee_id' => $traineeId,
                'coach_id' => $coachId,
                'status' => 'Pending', // Set the initial status to "Pending"
            ]);
    
            return view('request.test', ['status' => 'Pending']); // You can adjust the status as needed
        } else {
            return "Something is wrong.";
        }   
    }
    public function dashboard()
    {
        $coachId = auth()->user()->id;

        // Fetch all requests for the coach
        $sentRequests = UserRequest::where('coach_id', $coachId)
            ->where('status', 'Pending')
            ->get();

        return view('coachdashboard.dashboard', ['sentRequests' => $sentRequests]);
    }

    public function approvePayment(Payment $payment)
{
    // Update the payment status to 'Approved'
    $payment->update(['status' => 'Approved']);

    // Find the associated request and update its status if it exists
    $userRequest = UserRequest::where('trainee_id', $payment->trainee_id)
        ->where('coach_id', $payment->coach_id)
        ->first();

    if ($userRequest) {
        $userRequest->update(['status' => 'Approved']);
    }

    return redirect()->route('coachdashboard.dashboard')->with('success', 'Payment approved successfully');
}

public function disapprovePayment(Payment $payment)
{
    // Update the payment status to 'Disapproved'
    $payment->update(['status' => 'Disapproved']);

    // Find the associated request and update its status if it exists
    $userRequest = UserRequest::where('trainee_id', $payment->trainee_id)
        ->where('coach_id', $payment->coach_id)
        ->first();

    if ($userRequest) {
        $userRequest->update(['status' => 'Disapproved']);
    }

    return redirect()->route('coachdashboard.dashboard')->with('success', 'Payment disapproved');
}
}

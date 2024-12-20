<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SendRequestController extends Controller
{
    public function sendRequest(Request $request)
    {
        if ($request->has('sendRequest')) {
            $traineeId = $request->input('trainee_id');
            $coachId = $request->input('coach_id');
            $programId = $request->input('program_id');
            $message = $request->input('message') ?? null;
            
            DB::table('requests')->insert([
                'trainee_id' => $traineeId,
                'coach_id' => $coachId,
                'program_id'=> $programId,
                'message'=> $message,
                'status' => 'Pending', // Set the initial status to "Pending"
            ]);

            return back()->with('message', 'Request sent successfully');
        } else {
            return "Something is wrong.";
        }
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
    public function viewDashboard()
    {
        $user = Auth::user();
        $requests = UserRequest::all();
        
        return view ('requestDashboard.coachDashboard');
    }
}

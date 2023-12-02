<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Module;
use App\Models\Payment;
use App\Models\Program;
use App\Mail\ReceiptMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;


class AdminController extends Controller
{

    public function traineesIndex(User $users)
    {
        $trainees = $users->where('role', 'Trainee')->latest()->get();
        
        return view('admin.trainees', compact('trainees'));
    }

    public function coachesIndex(User $users)
    {
        $coaches = $users->where('role', 'Coach')->latest()->get();
        
        return view('admin.coaches', compact('coaches'));
    }
    public function acceptPayment(Request $request, $paymentId)
{
    $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomLetters = '';
    
    for ($i = 0; $i < 3; $i++) {
        $randomLetters .= $letters[rand(0, strlen($letters) - 1)];
    }
    
    $randomNumbers = rand(1000, 9999);
    $referenceNumber = $randomLetters . $randomNumbers;

    $traineeEmail = $request->input('temail');
    $coachEmail = $request->input('cemail');
    $payment = Payment::findOrFail($paymentId);
    $payment->update(['status' => 'accepted']);

    Mail::to($traineeEmail)->send(new ReceiptMail($payment, $referenceNumber));
    Mail::to($coachEmail)->send(new ReceiptMail($payment, $referenceNumber));

    return redirect()->back()->with('success', 'Payment accepted!');
}


    public function paymentIndex(Payment $payments){
        $payments = Payment::all(); // Adjust as needed

        return view('admin.payments', compact('payments'));
    }

    public function enroll(Program $program)
    {
        // Add the authenticated user to the program
        auth()->user()->programs()->attach($program);

        return redirect()->route('programs.show', $program);
    }


    public function programsIndex(Program $programs)
    {
        $programs = Program::all(); // Adjust as needed

        return view('admin.programs', ['programs' => $programs]);
    }

    public function modulesIndex(Module $modules)
    {
        $modules = MOdule::all(); // Adjust as needed

        return view('admin.modules', ['modules' => $modules]);
    }

    public function suspendUser(Request $request, User $user)
    {
        $form = $request->validate([
            'status' =>['nullable'],
        ]);

        $user->update($form);

        return back()->with('message', 'Account suspended successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('message', 'Successfully deleted User');
    }
}

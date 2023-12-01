<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Module;
use App\Models\Payment;
use App\Models\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


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
    public function acceptPayment($paymentId)
    {
        $payment = Payment::findOrFail($paymentId);
        $payment->update(['status' => 'accepted']);

        // Additional logic, e.g., update contract status or perform other actions

        return redirect()->back()->with('success', 'Payment accepted!');
    }
    public function paymentIndex(){
        $pendingPayments = Payment::where('status', 'pending')->get();

        return view('admin.payments', compact('pendingPayments'));
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

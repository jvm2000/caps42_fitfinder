<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Module;
use App\Models\Payment;
use App\Models\Program;
use App\Models\Contract;
use App\Models\Enrollee;
use App\Mail\ReceiptMail;
use Illuminate\Http\Request;
use App\Models\TotalEarnings;
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
    $payment->contract()->update(['status' => 'accepted']);
    $payment->update(['FFreference' => $referenceNumber]);
    Mail::to($traineeEmail)->send(new ReceiptMail($payment, $referenceNumber));
    Mail::to($coachEmail)->send(new ReceiptMail($payment, $referenceNumber));

    return redirect()->back()->with('message', 'Payment Accepted Successfully');
    }


    public function paymentIndex(Payment $payments){
        $payments = Payment::all(); // Adjust as needed

        return view('admin.payments', compact('payments'));
    }

    public function enroll(Request $request, Program $program)
    {
        $form = $request->validate([
            'trainee_id' => ['required'],
        ]);

        $traineeId = $form['trainee_id'];

        $trainee = User::findOrFail($traineeId);
        
        $trainee->enrolledPrograms()->attach($program);

        return redirect()->back()->with('success', 'User Enrolled Successfully!');
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

    public function dashboardOverall(){
        $users = User::all();
        $coaches = User::where('role', 'Coach')->get();
        $trainees = User::where('role', 'Trainee')->get();
        $enrollees = Enrollee::all();
        $programs = Program::all();
        $earnings = TotalEarnings::all();
        $contracts = Contract::all();
        $payments = Payment::join('contracts', 'payments.contract_id', '=', 'contracts.id')
        ->join('programs', 'contracts.program_id', '=', 'programs.id')
        ->groupBy('contracts.program_id')
        ->selectRaw('contracts.program_id, programs.name as program_name, sum(payments.amount) as total_amount')
        ->get();
        $totalEarnings = TotalEarnings::all()->sum('earnings');
        $eachEarnings = Payment::pluck('amount');
        $eachEarned = $eachEarnings->toArray();
        $totalCommisions = TotalEarnings::pluck('earnings');
        $eachCommisioned = $totalCommisions->toArray();

        $totalPayments = $eachEarnings->sum();

        return view('admin.index', [
            'users' => $users,
            'coaches' => $coaches,
            'trainees' => $trainees,
            'enrollees' => $enrollees,
            'programs' => $programs,
            'earnings' => $earnings,
            'totalEarnings' => $totalEarnings,
            'contracts' => $contracts,
            'payments' => $payments,
            'eachEarned' => $eachEarned,
            'eachCommisioned' => $eachCommisioned,
            'totalPayments' => $totalPayments,
        ]);
    }
}

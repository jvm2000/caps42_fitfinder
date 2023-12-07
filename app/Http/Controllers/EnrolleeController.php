<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Module;
use App\Models\Program;
use App\Models\Enrollee;
use App\Models\Progress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EnrolleeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->user()->id;

        $enrolled = Enrollee::where('trainee_id', $userId)->get();

        return view('progress.main', compact('enrolled'));
    }
    public function showProgress(Enrollee $enrollee)
{
    $a = $enrollee->progress->count();
    $b = $enrollee->stats;
    $finished = 0;

    foreach ($enrollee->progress as $i) {
        if ($i->status === 'done') {
            $finished++;
        }
    }

    if ($a > 0) {
        $percentage = ($b / $a) * 100;
    } else {
        $percentage = 0;
    }

    if ($b == $a && !$enrollee->completion_email_sent) {
        $enrollee->completion = 'completed';
        $enrollee->completion_email_sent = true; // Set the flag to true
        $enrollee->save();
    
        // Get the current logged-in user's name and email
        $userName = Auth::user()->name; // Replace with the actual attribute containing the user's name
        $userEmail = Auth::user()->email;
    
        // Send email with the certificate template
        $subject = 'Congratulations on Completion';
        
        Mail::send('certificate', ['userName' => $userName, 'enrollee' => $enrollee], function ($message) use ($userEmail, $subject) {
            $message->to($userEmail)->subject($subject);
        });
    }
    
    return view('progress.module', [
        'finished' => $finished,
        'enrollee' => $enrollee,
        'percentage' => $percentage,
    ]);}
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $form = $request->validate([
            'program_id'=>['required'],
            'trainee_id'=>['required'],
            'coach_id'=>['required'],
        ]);

        $enrollee = Enrollee::create($form);

        $programs = Program::find($form['program_id']);
        
        foreach ($programs->modules as $module) {
            Progress::create([
                'module_id' => $module->id, // Assuming modules have an 'id' attribute
                'program_id' => $programs->id,
                'enrollee_id' => $enrollee->id,
                // Copy other attributes as needed
            ]);
        }
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
    public function update(Request $request, Progress $progress)
    {
        $id = $request->input('enrollee_id');
        $program = $request->input('program_id');
        $enrollee = Enrollee::find($id);
        // Increment the 'stats' column by 1
        $enrollee->increment('stats');
        $form = $request->validate([
            'status' => ['nullable'],
        ]);
        
        $progress->update($form);

        return redirect('/progress/show/' . $program)->with('message', 'Module successfully finished!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

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
        $enrollee->completion = 'submitted for evaluation';

        $enrollee->save();

        // $userName = Auth::user()->name;

        // $userEmail = Auth::user()->email;

        // $subject = 'Congratulations on Completion';
        
        // Mail::send('certificate', ['userName' => $userName, 'enrollee' => $enrollee], function ($message) use ($userEmail, $subject) {
        //     $message->to($userEmail)->subject($subject);
        // });
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
        
        $firstModule = true;

        foreach ($programs->modules as $module) {
            Progress::create([
                'module_id' => $module->id, // Assuming modules have an 'id' attribute
                'program_id' => $programs->id,
                'enrollee_id' => $enrollee->id,
                'next_stage' => $firstModule,
                // Copy other attributes as needed
            ]);

            $firstModule = false;
        }

        return redirect('/admin/payments')->with('message', 'Trainee Enrolled Successfully');
    }

    public function meetingLink(Request $request)
    {
        //
        $form = $request->validate([
            'meet_link'=>['required'],
        ]);

        Enrollee::create(['meet_link' => $form['meet_link']]);

        return redirect('/home')->with('message', 'Successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Progress $progress)
    {
        $enrolleeId = $request->input('enrollee_id');
        $programId = $request->input('program_id');
        $enrollee = Enrollee::find($enrolleeId);

        // Increment the 'stats' column by 1
        $enrollee->increment('stats');

        $form = $request->validate([
            'status' => ['nullable'],
        ]);

        // Update the current progress
        $progress->update($form);

        $nextProgress = Progress::where('enrollee_id', $enrolleeId)
            ->where('program_id', $programId)
            ->where('id', '>', $progress->id) // Ensure it's the next progress
            ->orderBy('id')
            ->first();

        if ($nextProgress) {
            $nextProgress->update(['next_stage' => true]);
        }

        return redirect('/progress/show/' . $programId)->with('message', 'Module successfully finished!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

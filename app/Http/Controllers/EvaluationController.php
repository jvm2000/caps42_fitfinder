<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Enrollee;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Enrollee $enrollee)
    {
        //
        $form = $request->validate([
            'meeting_link'=>['required','string'],
            'schedule'=>['required'],
            'time' => ['required','string'],
        ]);

        $enrollee->evaluation()->create($form);

        return redirect('/programs/list')->with('message', 'Evaluation created successfully!');
    }


    public function update(Request $request, Enrollee $enrollee)
    {
        $form = $request->validate([
            'completion'=>['required'],
        ]);

        $enrollee->update($form);

        return redirect('/programs/list')->with('message', 'Done Evaluating!');
    }
}

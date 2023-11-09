<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgramController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $programs = $user->programs()->with('user')->latest()->paginate(5);

        return view('programs.main', compact('programs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {
        $form = $request->validate([
            'name'=>['required','string'],
            'category'=>['required','string'],
            'summary'=>['required', 'min:6'],
            'status'=>['nullable'],
            'image' => ['nullable','image'],
        ]);

        $imagePath = request()->file('image')->store('programs','public');
        $form['image'] = $imagePath;

        $user->programs()->create($form);

        return redirect('/programs/list')->with('message', 'Program created successfully!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function archive(Request $request, Program $program)
    {
        $form = $request->validate([
            'status'=>['nullable']
        ]);
        
        $program->update($form);

        return redirect('/programs/list');
    }

    public function restore(Request $request, Program $program)
    {
        $form = $request->validate([
            'status'=>['nullable']
        ]);
        
        $program->update($form);

        return redirect('/programs/list')->with('message', 'Program restored successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProgramController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $programs = $user->programs()->latest()->paginate(5);

        return view('programs.main', compact('programs'));
    }

    public function showAllPrograms()
    {

        $user = Auth::user();

        $programs = $user->programs()->latest()->paginate(5);

        return view('programs.create', compact('programs'));
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
            'image' => ['nullable'],
            'no_of_trainees' => ['nullable'],
            'prerequisite_program_id' => 'nullable|exists:programs,id',
        ]);
        
        $form['is_prerequisite'] = $request->filled('is_prerequisite');

        if (request()->hasFile('image') && request()->file('image')->isValid()) {
            $imagePath = request()->file('image')->store('programs', 'public');
            $form['image'] = $imagePath;
        }
        
        $user->programs()->create($form);

        return redirect('/programs/list')->with('message', 'Program created successfully!');
    }

    public function show(Program $program){
        return view('programs.edit',['program' => $program]);
    }

    public function showProgram(Program $program){
    if($program->enrollees->count()>0){ 
        $no_enrollees= $program->enrollees->count();
        $finished = 0;
        foreach($program->enrollees as $i){
            if($i->completion === 'completed'){
                $finished++;
        }
        $percentage = ($finished / $no_enrollees)*100;
    }}
        $programWithModules = Program::with('modules')->find($program->id);
        if($program->enrollees->count()>0){ 
            return view('modules.main', [
                'program' => $programWithModules,
                'finished' => $finished,
                'percentage' => $percentage,
            ]);
        }
        else{
            return view('modules.main', [
                'program' => $programWithModules,
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function archive(Request $request, Program $program)
    {        
        if (Hash::check($request->input('password'),  auth()->user()->password)) {
            $form = $request->validate([
                'status' => ['nullable'],
            ]);
        
            $program->update($form);
        
            return redirect('/programs/list')->with('message', 'Successfully archived program');
        } else {
            return redirect('/programs/list')->with('message', 'Please type in the correct password.');
        }
        
        
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
    public function destroy(Request $request, Program $program)
    {
        if (Hash::check($request->input('password'),  auth()->user()->password)) {
            $program->delete();
            return back()->with('message', 'Successfully deleted program');
        } else {
            return back()->with('message', 'Please type in the correct password.');
        }
    }

    public function update(Request $request, Program $program)
    {
        $form = $request->validate([
            'name'=>['nullable','string'],
            'category'=>['nullable','string'],
            'summary'=>['nullable', 'min:6'],
            'status'=>['nullable'],
            'image' => ['nullable','image'],
        ]);
        if(request()->has('image')){
            $imagePath = request()->file('image')->store('programs','public');
        $form['image'] = $imagePath;
          }

        $program->update($form);

        return redirect('/programs/list')->with('message', 'Program updated successfully!');
    }


}

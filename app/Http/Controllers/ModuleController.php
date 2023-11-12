<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Module;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ModuleController extends Controller
{
    public function store(Request $request, Program $program)
    {
        $form = $request->validate([
            'name'=>['required','string'],
            'summary'=>['required','string'],
            'duration'=>['required'],
            'procedure' => ['required','string'],
            'set'=>['nullable'],
            'setcount'=>['nullable'],
            'rep'=>['nullable'],
            'repcount'=>['nullable'],
            'schedule'=>['required'],
        ]);

        // $imagePath = request()->file('procedure')->store('modules','public');
        // $form['procedure'] = $imagePath; 


        $program->modules()->create($form);

        return redirect('/programs/show/' . $program->id)->with('message', 'Module created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Module $modules){
        return view('modules.edit',['modules' => $modules]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Module $module)
    {
        $program = $module->program;

        return view('modules.edit', ['module' => $module, 'program' => $program]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Module $module)
    {
        $form = $request->validate([
            'name'=>['nullable','string'],
            'summary'=>['nullable','string'],
            'duration'=>['nullable'],
            'procedure' => ['nullable'], //need nullable in migration
            'set'=>['nullable'],
            'setcount'=>['nullable'],
            'rep'=>['nullable'],
            'repcount'=>['nullable'],
            'schedule'=>['nullable'],
            'program_id'=>['required']
        ]);

     

        $module->update($form);

        return redirect('/programs/show/' . $form['program_id'])->with('message', 'Module updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Module $module)
    {
        if (Hash::check($request->input('password'),  auth()->user()->password)) {
            $module->delete();
            return back()->with('message', 'Successfully deleted module');
        } else {
            return back()->with('message', 'Please type in the correct password.');
        }
    }
}

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
            'procedure'=>['required'],
            'sets' => ['required','string'],
            'reps'=>['nullable'],
            'rest_period'=>['nullable'],
            'difficulty'=>['nullable'],
            'notes'=>['nullable'],
            'video_url'=>['required'],
        ]);

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
            'name'=>['nullable'],
            'procedure'=>['nullable'],
            'sets' => ['nullable'],
            'reps'=>['nullable'],
            'rest_period'=>['nullable'],
            'difficulty'=>['nullable'],
            'notes'=>['nullable'],
            'video_url'=>['nullable'],
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

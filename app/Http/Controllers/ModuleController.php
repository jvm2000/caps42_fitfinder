<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Module;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ModuleController extends Controller
{
    public function store(Request $request, User $user)
    {
        $form = $request->validate([
            'name'=>['required','string'],
            'summary'=>['required', 'min:6'],
            'duration'=>['required'],
            'procedure' => ['required|file|mimes:pdf,doc,docx,jpeg,png,jpg,gif|max:2048'],
            'set'=>['nullable'],
            'setcount'=>['nullable'],
            'rep'=>['nullable'],
            'repcount'=>['nullable'],
            'schedule'=>['required'],
        ]);

        $imagePath = request()->file('procedure')->store('modules','public');
        $form['procedure'] = $imagePath; 


        $user->module()->create($form);

        return redirect('/module/list')->with('message', 'Module created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Module $module)
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
    public function update(Request $request, string $id)
    {
        $form = $request->validate([
            'name'=>['required','string'],
            'summary'=>['required', 'min:6'],
            'duration'=>['required'],
            'procedure' => ['required|file|mimes:pdf,doc,docx,jpeg,png,jpg,gif|max:2048'],
            'set'=>['nullable'],
            'setcount'=>['nullable'],
            'rep'=>['nullable'],
            'repcount'=>['nullable'],
            'schedule'=>['required'],
        ]);

        if(request()->has('procedure')){
            $filePath = request()->file('procedure')->update('modules','public');
            $form['procedure'] = $filePath;
          }

          

        $user->update($form);

        return back()->with('message', 'Module updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

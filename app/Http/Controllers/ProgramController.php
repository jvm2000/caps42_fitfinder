<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $programs = $user->programs()->with('user')->latest()->paginate(10);

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
            // 'image'=>['string', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);

        // $fileName = time() . '.' . $request->image->extension();

        // $request->image->storeAs('public/uploads/programs', $fileName);

        // $form['image'] = $fileName;

        Program::create(['user_id' => $user->id] + $form);

        return redirect('/programs/list')->with('message', 'User creation successfully!');
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

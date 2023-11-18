<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserRequest;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = UserRequest::all(); // Adjust as needed

        return view('request.testv2', ['requests' => $requests]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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

        $user->sendRequestToCoach()->create($form);

        return redirect('/programs/list')->with('message', 'Program created successfully!');
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

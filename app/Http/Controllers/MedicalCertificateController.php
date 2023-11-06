<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\MedCert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MedicalCertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $medcert = $user->medcert()->with('user')->latest();

        return view('user.profile', compact('medcert'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {
        $form = $request->validate([
            'description'=>['required','string','min:12'],
            'status'=>['required','string'],
            'started_fitness'=>['required'],
            'cert_file'=>['nullable'],
        ]);

        MedCert::create(['user_id' => $user->id] + $form);

        return back()->with('success', 'User Updated successfully');
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

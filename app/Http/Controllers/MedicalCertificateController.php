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

        return view('user.trainee', compact('medcert'));
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
            'cert_file' => ['nullable|file|mimes:pdf,doc,docx,jpeg,png,jpg,gif|max:2048'],
        ]);
        if($form['cert_file'] != null ){
            $filePath = request()->file('cert_file')->store('cert_file','public');
            $form['cert_file'] = $filePath;
          }

        MedCert::create(['user_id' => $user->id] + $form);

        return back()->with('success', 'User Updated successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MedCert $medcert)
    {
        // Get the currently authenticated user
        $form = $request->validate([
            'description'=>['nullable','string','min:12'],
            'status'=>['nullable','string'],
            'started_fitness'=>['nullable'],
            'cert_file' => ['nullable|file|mimes:pdf,doc,docx,jpeg,png,jpg,gif|max:2048'],
        ]);
        
        if(request()->has('cert_file')){
            $filePath = request()->file('cert_file')->update('cert_file','public');
            $form['cert_file'] = $filePath;
          }
        // Update the user's fields
        $medcert->update($form);

        return back()->with('success', 'Portfolio Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

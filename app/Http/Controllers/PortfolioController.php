<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $portfolio = $user->portfolio()->with('user')->latest();

        return view('user.coach', compact('portfolio'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {
        $form = $request->validate([
            'description'=>['required','string','min:12'],
            'recent_works'=>['required','string'],
            'hobbies'=>['required', 'min:6'],
            'form_document' =>['nullable','file'],
        ]);

        if (request()->has('form_document')) {
            $filePath = request()->file('form_document')->store('portfolio', 'public');
            $form['form_document'] = $filePath;
        }

        Portfolio::create(['user_id' => $user->id] + $form);

        return back()->with('success', 'User Updated successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        // Get the currently authenticated user
        $form = $request->validate([
            'description'=>['nullable','string','min:12'],
            'recent_works'=>['nullable','string'],
            'hobbies'=>['nullable', 'min:6'],
            'form_document' =>['nullable','file'],
        ]);
        
        if (request()->has('form_document')) {
            $filePath = request()->file('form_document')->store('portfolio', 'public');
            $form['form_document'] = $filePath;
        }

        $portfolio->update($form);

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

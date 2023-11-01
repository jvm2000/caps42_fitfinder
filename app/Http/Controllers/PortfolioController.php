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

        return view('user.profile', compact('portfolio'));
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
        ]);

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
        ]);
        
        // Update the user's fields
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

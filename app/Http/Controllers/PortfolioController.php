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
    public function index(Portfolio $portfolio, User $user)
    {
        return view('user.portfolio', compact('portfolio', 'user'));
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

        // $fileName = time().'.'.$request->file->extension();  
       
        // $request->file->move(public_path('uploads'), $fileName);
    
        Portfolio::create(['user_id' => $user->id] + $form);

        return back()->with('success', 'User Updated successfully');
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

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Module;


class AdminController extends Controller
{

    public function traineesIndex(User $users)
    {
        $trainees = $users->where('role', 'Trainee')->latest()->get();
        
        return view('admin.trainees', compact('trainees'));
    }

    public function coachesIndex(User $users)
    {
        $coaches = $users->where('role', 'Coach')->latest()->get();
        
        return view('admin.coaches', compact('coaches'));
    }



    public function programsIndex(Program $programs)
    {
        $programs = Program::all(); // Adjust as needed

        return view('admin.programs', ['programs' => $programs]);
    }

    public function modulesIndex(Module $modules)
    {
        $modules = MOdule::all(); // Adjust as needed

        return view('admin.modules', ['modules' => $modules]);
    }

    public function suspendUser(Request $request, User $user)
    {
        $form = $request->validate([
            'status' =>['nullable'],
        ]);

        $user->update($form);

        return back()->with('message', 'Account suspended successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('message', 'Successfully deleted User');
    }
}

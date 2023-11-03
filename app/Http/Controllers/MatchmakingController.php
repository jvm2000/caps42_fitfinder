<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MatchmakingController extends Controller
{

    public function index(Request $request)
    {
        $role = auth()->user()->role;
        $tag_id = auth()->user()->id;
        if ($role == "Trainee") {
            $tags = DB::table('users')->where('id', $tag_id)->value('tags');
            $matching = DB::table('users')
                ->where('role', 'coach') // Replace 'role' with the actual column name storing user roles
                ->where('id', '!=', $tag_id) // Exclude the trainee from the results
                ->where(function ($query) use ($tags) {
                    $query->whereRaw("FIND_IN_SET('$tags', tags) > 0");
                })
                ->get();
            
            return view('dashboard.main', [
                'matching' => $matching,
                'tag_id' => $tag_id,
            ]);
        }
        else{
            $tags = DB::table('users')->where('id', $tag_id)->value('tags');
            $matching = DB::table('users')
                ->where('role', 'trainee') // Replace 'role' with the actual column name storing user roles
                ->where('id', '!=', $tag_id) // Exclude the trainee from the results
                ->where(function ($query) use ($tags) {
                    $query->whereRaw("FIND_IN_SET('$tags', tags) > 0");
                })
                ->get();
            return view('dashboard.main', [
                'matching' => $matching,
                'tag_id' => $tag_id,
            ]);
           
        }
    }


    public function sendRequest(Request $request)
    {
        if ($request->has('sendRequest')) {
            $traineeId = $request->input('trainee_id');
            $coachId = $request->input('coach_id');
            
            // Check if a request already exists
            $existingRequest = DB::table('requests')
                ->where('trainee_id', $traineeId)
                ->where('coach_id', $coachId)
                ->first();
    
            if ($existingRequest) {
                return "A request has already been sent to this user.";
            }

            DB::table('requests')->insert([
                'trainee_id' => $traineeId,
                'coach_id' => $coachId,
            ]);
    
            return "Request sent successfully.";
        } else {
            return "Something is wrong.";
        }
    }

    public function show($id)
    {
        // Fetch the user's data using the $id parameter
        $user = User::find($id);
        // Check if the user was found
        if (!$user) {
            // You can handle the case where the user is not found, such as showing an error message or redirecting.
            return redirect()->route('notfound');
        }
        
        // Pass the user data to the view
        return view('viewprofile', ['user' => $user]);
    }
}

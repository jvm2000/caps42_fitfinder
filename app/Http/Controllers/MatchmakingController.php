<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Status;
use App\Models\UserRequest;
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
            $tagsJson = DB::table('users')->where('id', $tag_id)->value('tags');
            $tags = json_decode($tagsJson);
            $matching = DB::table('users')
                ->where('role', 'coach') 
                ->where('id', '!=', $tag_id)
                ->where(function ($query) use ($tags) {
                    foreach ($tags as $tag) {
                        $query->orWhereJsonContains('tags', $tag);
                    }
                })
                ->get();
            
            return view('dashboard.main', [
                'matching' => $matching,
                'tag_id' => $tag_id,
            ]);
        }
        else{
            $tagsJson = DB::table('users')->where('id', $tag_id)->value('tags');
            $tags = json_decode($tagsJson);
            $matching = DB::table('users')
                ->where('role', 'trainee') // Replace 'role' with the actual column name storing user roles
                ->where('id', '!=', $tag_id) // Exclude the trainee from the results
                ->where(function ($query) use ($tags) {
                    foreach ($tags as $tag) {
                        $query->orWhereJsonContains('tags', $tag);
                    }
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
                'status' => 'Pending', // Set the initial status to "Pending"
            ]);

            $status ='Pending';
    
            return view('request.test', ['status' => 'Pending']); // You can adjust the status as needed
        } else {
            return "Something is wrong.";
        }   
    }

    public function show($id)
    {
    // Fetch the user's data using the $id parameter
    $user = User::with('portfolio')->find($id);

    // Check if the user was found
    if (!$user) {
        // You can handle the case where the user is not found, such as showing an error message or redirecting.
        return redirect()->route('notfound');
    }

    // Pass the user data and related profile data to the view
    return view('request.profile', compact('user'));
    }
    
}
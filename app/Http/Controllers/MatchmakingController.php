<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MatchmakingController extends Controller
{
     
    public function show(Request $request)
{
    $role = auth()->user()->role;
    $t_id = auth()->user()->id;
    if($role == "Trainee"){
    // Retrieve the trainee's tags
    $traineeTags = DB::table('users')->where('id', $t_id)->value('tags');

    // Retrieve users who have the role "coach" and share common tags with the trainee
    $matchingTrainers = DB::table('users')
    

        ->where('role', 'coach') // Replace 'role' with the actual column name storing user roles
        ->where('id', '!=', $t_id) // Exclude the trainee from the results
        ->where(function ($query) use ($traineeTags) {
            $query->whereRaw("FIND_IN_SET('$traineeTags', tags) > 0");
        })
        ->get();


        return view('dashboard.tmain', [
       'matchingTrainers' => $matchingTrainers,
       't_id' => $t_id,
        ]);}
        else{
            $sample = "Sample";
            return view('dashboard.main', [
                'matchingTrainers' => $sample,
            ]);
        }
    }

    
    public function sendRequest(Request $request)
    {
    if ($request->has('sendRequest')) {
        $t_id = $request->input('trainee_id');
        $trainerId = $request->input('trainer_id');
        $requestDate = now();

        // Insert the request into the "requests" table directly
        DB::table('requests')->insert([
            'trainee_id' => $t_id,
            'trainer_id' => $trainerId,
            'request_date' => $requestDate,
        ]);

        return "REQUEST SENT SUCCESSFULLY";
    } else {
        return "SOMETHING IS WRONG";
    }
}
}

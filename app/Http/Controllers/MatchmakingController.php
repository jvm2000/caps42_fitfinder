<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MatchmakingController extends Controller
{
     public function index()
    {
        // Replace $traineeId with your desired trainee ID
        $traineeId = 1111;

        $traineeTags = DB::table('trainee')->where('trainee_id', $traineeId)->value('tags');

        return view('matchmaking', [
            'traineeTags' => $traineeTags,
            'traineeId' => $traineeId,
        ]);
    }
    public function show(Request $request)
    {
        $t_id = $request->input('trainee_id');
    
        
        $traineeTags = DB::table('trainee')->where('trainee_id', $t_id)->value('tags');
    
        $matchingTrainers = DB::table('trainer')
            ->whereRaw("FIND_IN_SET('$traineeTags', tags) > 0")
            ->get();
    
        return view('matchmaking-result', [
            't_id' => $t_id,
            'traineeTags' => $traineeTags,
            'matchingTrainers' => $matchingTrainers,
        ]);
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

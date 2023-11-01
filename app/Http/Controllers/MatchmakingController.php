<?php

namespace App\Http\Controllers;

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

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

    public function index(User $id)
    {
 
        $role = auth()->user()->role;
        $tag_id = auth()->user()->id;
        if ($role == "Trainee") {
            $tagsJson = DB::table('users')->where('id', $tag_id)->value('tags');
            $tags = json_decode($tagsJson);
        
            $matching = User::with('portfolio')
                ->where('role', 'coach') // Replace 'role' with the actual column name storing user roles
                ->where('id', '!=', $tag_id) // Exclude the trainee from the results
                ->where(function ($query) use ($tags) {
                    foreach ($tags as $tag) {
                        $query->orWhereJsonContains('tags', $tag);
                    }
                })
                ->get();
        
            return view('matchmake.list', [
                'matching' => $matching,
                'tag_id' => $tag_id,
            ]);
        }
        
        else {
            $tagsJson = DB::table('users')->where('id', $tag_id)->value('tags');
            $tags = json_decode($tagsJson);
        
            $matching = User::with('medcert')
                ->where('role', 'trainee') // Replace 'role' with the actual column name storing user roles
                ->where('id', '!=', $tag_id) // Exclude the trainee from the results
                ->where(function ($query) use ($tags) {
                    foreach ($tags as $tag) {
                        $query->orWhereJsonContains('tags', $tag);
                    }
                })
                ->get();
        
            return view('matchmake.list', [
                'matching' => $matching,
                'tag_id' => $tag_id,
            ]);
        }
    }

    public function show($id)
    {
        $role = auth()->user()->role;

        if ($role == "Coach") {
            $user = User::with('portfolio')->find($id);

            // Check if the user was found
            if (!$user) {
                return redirect()->route('notfound');
            }

            return view('request.profile', compact('user'));
        }
        else {
            $user = User::with('medcert')->find($id);

            // Check if the user was found
            if (!$user) {
                return redirect()->route('notfound');
            }

            return view('request.profile', compact('user'));
        }
    }
    
}
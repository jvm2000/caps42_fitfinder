<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Program;
use App\Models\Contract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContractController extends Controller
{
    //
    public function index(){

        $contract = Contract::all();
        $programs = Program::select('category')->get();
        $users =  User::where('role', 'trainee')->get();
        $address = $users->pluck('address')->toArray();
        $email = $users->pluck('email')->toArray();

        $tags = $users->pluck('tags')->map(function ($tags) {
            return is_array($tags) ? implode(', ', $tags) : $tags;
        })->toArray();
        
        $phone_number = $users->pluck('phone_number')->toArray();
        $trainees = User::where('role', 'trainee')->get();
        
        return view('contracts.index', [
            'contract' => $contract,
            'trainees' => $trainees,
            'address' =>  $address,
            'email' => $email,
            'phone_number' => $phone_number,
            'tags'=> $tags,
            'programs'=>$programs,
        ]);
    }
    
    public function store(Request $request){
        $this->validate($request, [
            'address'=> 'required'
        ]);
        
      

        $request->user()->contract()->create([
            'address' => $request->address,
           
        ]);
        return back();
        // Contract::create([
        //     'user_id' => auth()->id(),
        //     'address' => $request->address,
        // ]);
    }
    public function generateContract(){
        //
        $coach =  User::where('role', 'coach')->get();
        $first_name = $coach->pluck('first_name')->toArray();
        $address = $coach->pluck('address')->toArray();
        $city = $coach->pluck('city')->toArray();
        $province = $coach->pluck('province')->toArray();
        $zip_code = $coach->pluck('zip_code')->toArray();
        $phone_number = $coach->pluck('phone_number')->toArray();
        //
        
        return view('contracts.make',[
            'coach'=> $coach,
            'first_name' => $first_name,
            'address' => $address,
            'city' => $city,
            'province' => $province,
            'zip_code' => $zip_code,
            'phone_number' => $phone_number,
        ]);
    }
}

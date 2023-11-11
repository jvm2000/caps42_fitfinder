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
        $first_name = $users->pluck('first_name')->toArray();
        $last_name = $users->pluck('last_name')->toArray();
        $tags = $users->pluck('tags')->map(function ($tags) {
            return is_array($tags) ? implode(', ', $tags) : $tags;
        })->toArray();
        
        $phone_number = $users->pluck('phone_number')->toArray();
        $trainees = User::where('role', 'trainee')->get();
        
        return view('contracts.index', [
            'first_name'=> $first_name,
            'last_name'=> $last_name,
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
    public function generateContract(Request $request){
        //
        $coach =  User::where('role', 'coach')->get();
        $first_name = $coach->pluck('first_name')->toArray();
        $last_name = $coach->pluck('last_name')->toArray();
        $address = $coach->pluck('address')->toArray();
        $city = $coach->pluck('city')->toArray();
        $province = $coach->pluck('province')->toArray();
        $zip_code = $coach->pluck('zip_code')->toArray();
        $phone_number = $coach->pluck('phone_number')->toArray();
        //
        $traineeAddress = $request->input('traineeAddress');
        $traineeUsername = $request->input('traineeUsername');
        $traineeEmailAddress = $request->input('traineeEmailAddress');
        $traineePhoneNumber = $request->input('traineePhoneNumber');
        $programs = $request->input('programs');
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
          

        return view('contracts.make',[
            'endDate'=>$endDate,
            'startDate'=>$startDate,
            'programs'=>$programs,
            'traineePhoneNumber'=>$traineePhoneNumber ,
            'traineeEmailAddress'=>$traineeEmailAddress,
            'traineeUsername'=>$traineeUsername,
            'traineeAddress'=>$traineeAddress,
            'coach'=> $coach,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'address' => $address,
            'city' => $city,
            'province' => $province,
            'zip_code' => $zip_code,
            'phone_number' => $phone_number,
        ]);
    }
}

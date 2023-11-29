<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Program;
use App\Models\Contract;
use App\Models\UserRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContractController extends Controller
{
    //
    public function index(){
        
        $contracts = Contract::all();
        $requests = UserRequest::all(); // Adjust as needed
        $programs = Program::all();
        $currentDate = now();

        if ($requests->isEmpty()) {
            return view('/contracts/index', [
                'contracts' => $contracts,
                'requests' => $requests,
                'programs' => $programs,
                'currentDate' => $currentDate,
            ])->with('message', 'There are currently no trainees who have requested.');
        }  
    
        return view('contracts.create', [
            'contracts' => $contracts,
            'requests' => $requests,
            'programs' => $programs,
            'currentDate' => $currentDate,
          
        ]);

    }
    
    public function store(Request $request, User $user){
       
        $form = $request->validate([
            'traineeUsername' => 'required',
            'traineeAddress' => 'required',
            'traineeEmailAddress' => 'required|email',
            'traineePhoneNumber' => 'required',
            'programs' => 'required',
            'paymentType' => 'required',
            'startDate' => 'required|date',
            'endDate' => 'required|date|after_or_equal:startDate',
        ]);
    
        // Create a new contract associated with the specified user
        $contract = $user->contracts()->create($form);
    
        // Attach the selected program to the contract
        $contract->programs()->attach($request->input('programs'));

        // Redirect or perform any additional actions as needed
        return redirect('/contracts/dashboard')->with('message', 'Program created successfully!');
    }
    
}
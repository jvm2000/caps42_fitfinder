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
     
        $requests = UserRequest::all(); // Adjust as needed
        $programs = Program::all();
        $currentDate = now();
    
        
        return view('contracts.make', [
            'requests' => $requests,
            'programs' => $programs,
            'currentDate' => $currentDate
        ]);

    }
    public function showContracts(){
        $contracts = Contract::all();

        return view('contracts.dashboard', [
      
            'contracts' => $contracts
          
        ]);
    }

    public function store(Request $request){

        $request->validate([
            // Add your validation rules here
            'traineeUsername' => 'required',
            'traineeAddress' => 'required',
            'traineeEmailAddress' => 'required|email',
            'traineePhoneNumber' => 'required',
            'programs' => 'required',
            'paymentType' => 'required',
            'startDate' => 'required|date',
            'endDate' => 'required|date|after_or_equal:startDate',
        ]);
        $coach = auth()->user();
        // Create a new contract instance
        $contract = new Contract([
            'programs_id' => $request->input('programs'),
            'trainee_id' => $request->input('traineeUsername'),
            'coach_id' => $coach->id,
            'payment_type' => $request->input('paymentType'),
            'startdate' => $request->input('startDate'),
            'enddate' => $request->input('endDate'),
            'status' => 'Pending',
        ]); 
        // Save the contract to the database
        $contract->save();

        // Redirect or perform any additional actions as needed
        return redirect()->route('home.index')->with('success', 'Contract created successfully');
    }
    
}
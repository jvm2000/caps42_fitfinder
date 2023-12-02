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
    
    public function store(Request $request){
        $form = $request->validate([
            'program_id' => ['required'],  
            'trainee_id' => ['required'],  
            'coach_id' => ['required'],  
            'payment_type' => ['required'],
            'startdate' => ['required'],
            'enddate' => ['required'],
        ]);

        $signatureData = $request->input('signature');

        $contract = new Contract($form);

        $contract->signature = $signatureData;
        
        $contract->save();

        $requestid = $request->input('request_id');

        UserRequest::destroy($requestid);

        return redirect('/contracts/list')->with('message', 'Contract created successfully!');
    }

    public function showRequest(UserRequest $request)
    {
        return view('contracts.generate',['request' => $request]);
    }

    public function destroy(UserRequest $request)
    {
        $request->delete();

        return back()->with('message', 'Successfully Decline User');
    }
}
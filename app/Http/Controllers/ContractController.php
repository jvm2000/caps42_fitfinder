<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContractController extends Controller
{
    //
    public function index(){
        $contract = Contract::all();
        
        $address = User::where('role', 'trainee')->pluck('address');
        
        
        $trainees = User::where('role', 'trainee')->get();

        return view('contracts.index', [
            'contract' => $contract,
            'trainees' => $trainees,
            'address' =>  $address->toArray(),
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
}

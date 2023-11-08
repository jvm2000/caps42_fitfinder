<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContractController extends Controller
{
    //
    public function index(){
        $contract = Contract::get();
        return view('contracts.index',[
            'contract'=> $contract
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

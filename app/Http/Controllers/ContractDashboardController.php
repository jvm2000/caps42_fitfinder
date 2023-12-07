<?php

namespace App\Http\Controllers;

use view;
use App\Models\Program;
use App\Models\Contract;
use App\Models\UserRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ContractDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function listOfContracts()
    {
        $userId = auth()->user()->id;
        $role = auth()->user()->role;

        if ($role == "Trainee") {
            $contracts = Contract::where('trainee_id', $userId)->get();
        }
        else{
            $contracts = Contract::where('coach_id', $userId)->get();
        }

        return view('contracts.index', compact('contracts'));
    }

    public function contract(Request $request){
        $action = $request->input('action');
        if($action=='agree'){
            return view('payments.index');
        }
        elseif ($action == 'decline') {

        }

    }
    
    public function coachEarnings(){
    
        $userId = auth()->user()->id;
        
        $coachEarnings = Contract::where('coach_id', $userId)->sum('amount');

        return view('contracts.sample', [
            'coachEarnings' => $coachEarnings,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

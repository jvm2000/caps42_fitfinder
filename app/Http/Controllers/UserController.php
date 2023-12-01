<?php

namespace App\Http\Controllers;

use App\Models\UserRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
    public function approveRequest(UserRequest $request)
    {
        $request->update(['status' => 'Approved']);
        // You may perform additional actions as needed
        return redirect()->back()->with('success', 'Request approved successfully');
    }

    public function disapproveRequest(UserRequest $request)
    {
        $request->update(['status' => 'Disapproved']);
        // You may perform additional actions as needed
        return redirect()->back()->with('success', 'Request disapproved');
    }

}

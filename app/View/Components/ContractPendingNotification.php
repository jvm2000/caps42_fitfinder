<?php

namespace App\View\Components;

use Closure;
use App\Models\Contract;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class ContractPendingNotification extends Component
{
    /**
     * Create a new component instance.
     */
    public $requests;

    public function __construct()
    {
        $userId = auth()->user()->id;
        $role = auth()->user()->role;

        // Initialize $contracts to an empty array
        $contracts = [];

        if ($role == "Trainee") {
            // Fetch contracts with the status "pending"
            $contracts = Contract::where('trainee_id', $userId)
                ->where('status', 'pending')
                ->get();
        }

        // Assign $contracts to the public property $requests
        $this->requests = $contracts;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.contract-pending-notification');
    }
}
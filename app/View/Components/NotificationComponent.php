<?php

namespace App\View\Components;

use App\Models\UserRequest;
use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class NotificationComponent extends Component
{
    public $requests;

    public function __construct()
    {
        $this->requests = UserRequest::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.notification-component');
    }
}

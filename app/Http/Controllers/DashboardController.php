<?php

namespace App\Http\Controllers;

use App\Enums\TicketStatusEnum;
use App\Models\Ticket;
use App\Enums\UserRoleEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        // get users role

        $userRole = Auth::user()->role;
        if($userRole == UserRoleEnum::AGENT->value) {
            $tickets = Ticket::where('agent_id', Auth::user()->id)->get();
            $totalTickets = $tickets->count();
            $openTickets = $tickets->where('status', TicketStatusEnum::OPEN)->count();
            $closedTickets = $tickets->where('status', TicketStatusEnum::CLOSED)->count();
        } else {
            $tickets = $request->user()->tickets()->get();
            $totalTickets = $tickets->count();
            $openTickets = $tickets->where('status', TicketStatusEnum::OPEN)->count();
            $closedTickets = $tickets->where('status', TicketStatusEnum::CLOSED)->count();
        }
        return view('user.dashboard', compact('totalTickets', 'openTickets', 'closedTickets'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class AgentTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::where('agent_id', Auth::user()->id)->get();

        return view('user.tickets', compact('tickets'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticketId)
    {
        $ticket = Ticket::find($ticketId)->first();

        return view('user.ticket-detail', compact('ticket'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Enums\TicketStatusEnum;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tickets = $request->user()->tickets()
        ->with('comments')
        ->latest()
        ->paginate(10);
        return view('user.tickets', compact('tickets'));
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
        $request->user()->tickets()->create([
            'ticketId' => uniqid(),
            'subject' => $request->subject,
            'body' => $request->body,
            'attachment' => $request->attachment,
            'priority' => $request->priority,
            'status' => TicketStatusEnum::OPEN->value,
        ]);

        return back();
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

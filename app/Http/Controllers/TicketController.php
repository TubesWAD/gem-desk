<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicket;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Models\Ticket;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $tickets = Ticket::latest()->paginate(5);

        return view('tickets.index', compact('tickets'))
            ->with('i', (request()->input('page', 1)-1)*7);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request) : RedirectResponse
    {


        $ticket = new Ticket;

        $ticket->title = $request->title;
        $ticket->description = $request->description;
        $pathFile = $request->file('file')->store('files', 'public');
        $ticket->files =$pathFile;
        $ticket->status = "open";
        $ticket->is_resolved = 0;
        $ticket->ticket_type = $request->ticket_type;

        $ticket->save($request->validated());
        return redirect()->route('tickets.index');
//            -with('success', 'Ticket created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket) : View
    {
        return view('tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket) : View
    {
        return view('tickets.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket) : RedirectResponse
    {
        $ticket->title = $request->title;
        $ticket->description = $request->description;
        if ($request->hasFile('files')){
            if ($oldFile = $ticket->files){
                unlink(storage_path('app/files/').$oldFile);
            }
            $pathFile = $request->file('file')->store('files', 'public');
            $ticket->files =$pathFile;
        }
        $ticket->ticket_type = $request->ticket_type;

        $ticket->update($request->validated());

        return redirect()->route('tickets.index')
            -with('success', 'Ticket updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket): RedirectResponse
    {
        $oldFile = $ticket->files;
        unlink(storage_path('app/public/').$oldFile);
        $ticket -> delete();

        return redirect()->route('tickets.index')
            ->with('success', 'Tickets deleted successfully');
    }

    public function close(Ticket $ticket): RedirectResponse
    {;
        $ticket->status = "closed";
        $ticket->save();

        return redirect()->route('tickets.index');

    }

    public function reopen(Ticket $ticket): RedirectResponse
    {
        $ticket->status = "open";
        $ticket->save();

        return redirect()->route('tickets.index');

    }
}

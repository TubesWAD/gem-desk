<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicket;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:5',
            'files' => 'mimes:pdf,jpg,jpeg,png,doc,docx|max:2500'
        ]);

        $ticket = new Ticket;

        $ticket->title = $request->title;
        $ticket->description = $request->description;
        $pathFile = $request->file('file')->store('files');
        $ticket->files =$pathFile;
        $ticket->status = "open";
        $ticket->is_resolved = 0;
        $ticket->is_locked = 0;
        $ticket->assigned_to = 0;

        $ticket->save();
        return redirect()->route('tickets.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        return view('tickets.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {


        $request->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:5',
            'files' => 'mimes:pdf,jpg,jpeg,png,doc,docx|max:2500'
        ]);

        $ticket->title = $request->title;
        $ticket->description = $request->description;
        if ($request->hasFile('files')){
            if ($oldFile = $ticket->files){
                unlink(storage_path('app/files/').$oldFile);
            }
            $pathFile = $request->file('file')->store('files');
            $ticket->files =$pathFile;
        }

        $ticket->assigned_to = $request->assigned_to;

        $ticket->save();

        return redirect()->route('tickets.create');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }

    public function close(Request $request,Ticket $ticket)
    {
        $ticket = Ticket::find($request->id);
        $ticket->status = "closed";
        $ticket-save();

        return redirect()->route('tickets.create');

    }

    public function reopen(Request $request,Ticket $ticket)
    {
        $ticket = Ticket::find($request->id);
        $ticket->status = "reopen";
        $ticket-save();

        return redirect()->route('tickets.create');

    }
}

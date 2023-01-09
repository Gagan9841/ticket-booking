<?php

namespace App\Http\Controllers;

use App\Models\TicketRate;
use Illuminate\Http\Request;

class TicketRateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ticket_rate = TicketRate::latest()->paginate(10);
        // return $ticket_rate;
        return view('admin.ticketRate', compact('ticket_rate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.ticketRateCreate");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        TicketRate::create([
            "type" => $request->ticket_type,
            "rate" => $request->ticket_rate,
        ]);
        return redirect('/admin/ticket-rate')->with('success',"Ticket Added successfully.");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TicketRate  $ticketRate
     * @return \Illuminate\Http\Response
     */
    public function show(TicketRate $ticketRate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TicketRate  $ticketRate
     * @return \Illuminate\Http\Response
     */
    public function edit(TicketRate $rate)
    {
        // return $rate;
        return view('admin.ticketRateEdit', compact('rate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TicketRate  $ticketRate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TicketRate $rate)
    {
        // return $request;
        $rate->update([
            "type" => $request->ticket_type,
            "rate" => $request->ticket_rate,
        ]);
        return redirect('/admin/ticket-rate')->with('info',"Ticket Updated successfully.");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TicketRate  $ticketRate
     * @return \Illuminate\Http\Response
     */
    public function destroy(TicketRate $rate)
    {
        $rate->delete();
        return redirect()->back()->with('warning',"Ticket deleted successfully.");
    }

    public function userIndex(){
        $tickets = TicketRate::get();

        return view('ticket-rate', compact('tickets'));

    }

}

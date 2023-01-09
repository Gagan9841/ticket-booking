<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Category;
use App\Models\Movie;
use App\Models\Show;
use App\Models\TicketRate;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Show $show)
    {
        $tickets = Ticket::where('user_id',auth()->user()->id)->with(['movie','show','user'])->get();
        // return $tickets;
        // where('user_id',auth()->user()->id)
        $ticket_showtime = $tickets[0]->show_time;
        $show = Show::whereId($ticket_showtime)->get();
        $rate = TicketRate::get();
        // return $ticket_showtime;
        // return $ticket_showtime;
        // return $show;
        return view('tickets',compact(['tickets','show','rate']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Movie $movies)
    {
        $shows = Show::get(['id','show_time']);
        $rate = TicketRate::get();

        return view('movieBook', compact(['movies','shows','rate']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $total_price = $request->ticket_rate * $request->num_of_seat;
        // return $total_price;
        Ticket::create([
            "ticket_no" => $request->ticket_no,
            "user_id" => $request->user_name,
            "movie_id" => $request->movie_name,
            "seat_no" => json_encode($request->seat),
            "show_time" => $request->show_time,
            "total_price" => $request->ticket_rate*$request->num_of_seat,
        ]);
        return redirect('/home/tickets')->with('success',"Ticket Booked successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }


}

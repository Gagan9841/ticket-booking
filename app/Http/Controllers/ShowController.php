<?php

namespace App\Http\Controllers;

use App\Models\Show;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shows = Show::latest()->paginate(10);
        // return $shows;
        return view('admin.shows', compact('shows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.showCreate");
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

        request()->validate([
            "show_time" => "required",
        ]);

        Show::create([
            "show_time" => $request->show_time,
        ]);
        return redirect('/admin/shows')->with('success',"Show time Added successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function show(Show $show)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function edit(Show $show_time)
    {
        // return $show_time;
        return view("admin.showsEdit", compact('show_time'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Show $show_time)
    {
        // return $show_time;
        // return $request;
        request()->validate([
            "show_time" => "required",
        ]);
        $show_time->update([
            "show_time"=> $request->show_time,
        ]);

        return redirect('/admin/shows')->with('info',"Show time Updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function destroy(Show $show_time)
    {
        // return $show_time;

        $show_time->delete();
        return redirect()->back()->with('warning',"Show time deleted successfully.");
    }
}

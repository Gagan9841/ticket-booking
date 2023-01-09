<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use App\Models\Show;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::with(['category','show'])->latest()->paginate(10);
        // return $movies;
        return view("admin.movies", compact(
            'movies'
        ));
    }

    public function userIndex()
    {
        $movies = Movie::with(['category','show'])->latest()->paginate(10);
        // return $movies;
        return view("home", compact(
            'movies'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get(['id','name']);
        $shows = Show::get(['id','show_time']);

        // return $shows;
        return view("admin.moviesCreate", compact([
            'categories', 'shows'
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imageName = time().'.'.$request->movie_img->extension();
        $imagePath = "/image/movie/{$imageName}";
        // return $imagePath;
        $request->movie_img->move(public_path('/image/movie'),$imageName);
        Movie::create([
            "name" => $request->movie_name,
            "slug" => Str::slug($request->movie_name),
            "description" => $request->desc,
            "category_id" => $request->category_id,
            "show_id" => $request->showTime_id,
            "movie_img" => $imagePath,
            "status" => $request->movie_status,
        ]);
        return redirect('/admin/movies')->with('success',"Movie Added successfully.");


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        $movies = Movie::where('status', 'Now Showing')->with('category','show')->get();
        return view('nowShowing', compact('movies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        // return $movie;
        return view('admin.moviesEdit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        $movie->update([
            "name" => $request->movie_name,
            "slug" => Str::slug($request->movie_name),
            "description" => $request->desc,
            "category_id" => $request->category_id,
            "show_id" => $request->showTime_id,
            "status" => $request->movie_status,
            // "movie_img" => $imagePath,
        ]);
        return redirect('/admin/movies')->with('info',"Movie Updated successfully.");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
         $movie->delete();
        return redirect()->back()->with('warning',"Movie deleted successfully.");
    }

    public function ticketBook(Movie $movies)
    {
        // return $movies;
        // $shows = Show::get('id')->where('id',$movies->show_id);
        // return $shows;
        $shows = Show::where(['id','show_time']);
        return view('movieBook', compact(['movies']));
        // return view("movieBook", compact([
        //     'categories', 'shows'
        // ]));
    }
}

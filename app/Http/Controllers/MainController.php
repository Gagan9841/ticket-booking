<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use App\Models\Show;
use App\Models\Ticket;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $movies = Movie::with(['category','show'])->get();
        $status_count = Movie::where('status', 'Now Showing')->get();
        $ticket_sold = Ticket::count();
        // return $ticket_sold;
        // return $status_count;
        return view('admin.dashboard', compact('movies', 'status_count','ticket_sold'));
        // return count($movies);

    }
}


?>

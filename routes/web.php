<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TicketRateController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/home', [MovieController::class, 'userIndex']);
Route::get('/now-showing', [MovieController::class, 'show']);
Route::get('/home/ticket-rate', [TicketRateController::class, 'userIndex']);
    Route::get('/home/movie/{movies}/bookNow', [TicketController::class, 'create'])->name('ticket.book');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('admin')->group(function () {
    Route::get('/admin', [MainController::class,'index']);

    Route::get('/admin/dashboard', [MainController::class,'index']);

    Route::get('/admin/shows', [ShowController::class, 'index']);
    Route::get('/admin/shows/showCreate', [ShowController::class, 'create']);
    Route::post('/admin/shows/showAdd', [ShowController::class, 'store']);
    Route::get('/admin/shows/{show_time}/showEdit', [ShowController::class, 'edit'])->name('shows.edit');
    Route::patch('/admin/shows/{show_time}/showUpdate', [ShowController::class, 'update'])->name('shows.update');
    Route::delete('/admin/shows/{show_time}/showDelete', [ShowController::class, 'destroy'])->name('shows.delete');

    Route::get('/admin/category', [CategoryController::class, 'index']);
    Route::get('/admin/category/categoryCreate', [CategoryController::class, 'create']);
    Route::post('/admin/category/categoryAdd', [CategoryController::class, 'store']);
    Route::get('/admin/category/{category_name}/categoryEdit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::patch('/admin/category/{category_name}/categoryUpdate', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/admin/category/{category_name}/categoryDelete', [CategoryController::class, 'destroy'])->name('category.delete');

    Route::get('/admin/movies', [MovieController::class, 'index'])->name('admin.movies');
    Route::get('admin/movies/movieCreate', [MovieController::class, 'create'])->name('movie.create');
    Route::post('/admin/movies/movieAdd', [MovieController::class, 'store']);
    Route::get('/admin/movies/{movie}/movieEdit', [MovieController::class, 'edit'])->name('movies.edit');
    Route::patch('/admin/movies/{movie}/movieUpdate', [MovieController::class, 'update'])->name('movies.update');
    Route::delete('/admin/movies/{movie}/movieDelete', [MovieController::class, 'destroy'])->name('movies.delete');
    Route::delete('/admin/movies/{movie}/movieUpdate/deleteImage', [MovieController::class, 'destroyImage']);


    Route::get('/admin/ticket-rate', [TicketRateController::class, 'index']);
    Route::get('/admin/ticket-rate/rateCreate', [TicketRateController::class, 'create']);
    Route::post('/admin/ticket-rate/rateAdd', [TicketRateController::class, 'store']);
    Route::get('/admin/ticket-rate/{rate}/rateEdit', [TicketRateController::class, 'edit'])->name('rate.edit');
    Route::patch('/admin/ticket-rate/{rate}/rateUpdate', [TicketRateController::class, 'update'])->name('rate.update');
    Route::delete('/admin/ticket-rate/{rate}/rateDelete', [TicketRateController::class, 'destroy'])->name('rate.delete');




    Route::get('/admin/users', [ProfileController::class, 'index']);

});
    Route::middleware('user')->group(function () {
    Route::get('/home', [MovieController::class, 'userIndex']);
    Route::post('/home/movie/booked', [TicketController::class, 'store']);
    Route::get('/home/tickets', [TicketController::class, 'index']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';

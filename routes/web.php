<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShowController;
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
});
// Route::get('/home', function () {
//     return view('home');
// });
Route::get('/home', [MovieController::class, 'userIndex']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/admin/dahsboard', function () {
//     return view('admin.dashboard');
// })->name('admin')->middleware('admin');

Route::middleware('admin')->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

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


    Route::get('/admin/users', [ProfileController::class, 'index']);

});

Route::middleware('user')->group(function () {

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';

<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Movie;
use App\Models\Show;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $categories = Category::all();
        View::share('cat', $categories);

        $show = Show::all();
        View::share('shows', $show);

        $movie = Movie::with(['category','show']);
        View::share('movies', $movie);
    }
}

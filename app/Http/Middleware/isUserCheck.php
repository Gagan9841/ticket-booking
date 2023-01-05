<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isUserCheck
{

    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()!=null){
            if(auth()->user()->isAdmin==0||1){
                return $next($request);
            }
            return abort(401);
        }
        return redirect()->route('login');
    }
}

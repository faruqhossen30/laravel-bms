<?php

namespace App\Http\Middleware;

use Closure;
use Brian2694\Toastr\Facades\Toastr;

class Club
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->user()->is_club == 1 && auth()->user()->status == 'active'){
            return $next($request);
        }
        else{
        Toastr::error('Only Club can access!', 'Error');
         return redirect()->route('index');
        }
    }
}

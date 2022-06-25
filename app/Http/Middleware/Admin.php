<?php

namespace App\Http\Middleware;

use Closure;
use Brian2694\Toastr\Facades\Toastr;
class Admin
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
        if(auth()->user()->is_admin == 1 && auth()->user()->status == 'active'){
            return $next($request);
        }
        else{
        Toastr::error('Only admin can access!', 'Error');
       return redirect()->route('home');
        }
    }
}

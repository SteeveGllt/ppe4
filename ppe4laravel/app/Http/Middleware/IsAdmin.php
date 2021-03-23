<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsAdmin
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
       if(auth()->user()->isAdmin == 1)
        {    
            return $next($request);

        }
        $request->session()->flash('error', "Vous n'avez pas les droits d'accès à cette page");
        return back()->withInput();
    }
}

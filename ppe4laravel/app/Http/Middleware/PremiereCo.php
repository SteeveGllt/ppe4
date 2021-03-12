<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class PremiereCo
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
        if(Auth::user()->premiereCo==1)
        {
        return $next($request);
        }
        $request->session()->flash('success',"C'est votre première connexion ".Auth::user()->prenom." ".Auth::user()->nom.". Veuillez définir un nouveau mot de passe");
        return response()->view('auth\passwords\new');
        
     }
}

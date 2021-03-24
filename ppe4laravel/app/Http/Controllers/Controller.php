<?php

namespace App\Http\Controllers;
use App\Poste;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(){
        $nbValid = Poste::where('isValide', 0)->get();
        \View::share('nbValid',count($nbValid));
        
    }
    
}

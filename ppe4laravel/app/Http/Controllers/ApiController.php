<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poste;

class ApiController extends Controller
{
    public function listPoste()
    {
        $poste = Poste::with(['categorie', 'type'])->get();
        return response()->json($poste);
    }
}

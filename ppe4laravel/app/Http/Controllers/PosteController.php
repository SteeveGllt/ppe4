<?php

namespace App\Http\Controllers;

use App\Poste;
use App\Type;
use App\Categorie;
use Illuminate\Http\Request;

class PosteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tab = Poste::all();
        return view('accueil', compact('tab'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tab = Type::all();
        $categorie = Categorie::all();
        return view('PosteCreate', compact('tab', 'categorie'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $p = new Poste;
        $p->intitule = $request->input('intitule');
        $p->description = $request->input('description');
        $p->ville = $request->input('ville');
        $p->nomEntreprise = $request->input('nomEntreprise');
        $p->pdf = "pdf emploi";
        $p->isValide = 1;
        $p->type_id = 1;
        $p->categorie_id = 1;
        $p->user_id = Auth::user()->id;
        $p->save();
        return redirect('/');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Poste  $poste
     * @return \Illuminate\Http\Response
     */
    public function show(Poste $poste)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Poste  $poste
     * @return \Illuminate\Http\Response
     */
    public function edit(Poste $poste)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Poste  $poste
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poste $poste)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Poste  $poste
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poste $poste)
    {
        //
    }
}

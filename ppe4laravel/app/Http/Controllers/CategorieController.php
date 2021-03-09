<?php

namespace App\Http\Controllers;

use App\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $c= new Categorie;
        $tab=Categorie::all();
        return view ('CategorieListe',compact('tab'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CategorieCreate');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
        {
       
        $validatedData = $request->validate([ 

        'libelle' => 'required' //Le nom est obligatoire             

    ]); 
         
        $c = new Categorie;
        $c -> libelle = $request -> input('libelle');
        $c->save();
        $request->session()->flash('success','Catégorie créée');
        return redirect()->route('categorie.index');
        }
        

    /**
     * Display the specified resource.
     *
     * @param  \App\Categorie  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $c =Categorie::find($id); 
        return view('CategorieShow', compact('c'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categorie  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $c =Categorie::find($id);     
           return view ('CategorieEdit', compact('c'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categorie  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $c=Categorie::find($id);
        $c -> libelle = $request -> input('libelle');
        $c->save();
        return redirect()->route('categorie.index');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $categorie, Request $request)
    {  
        try
        {
            $c =Categorie::find($categorie->id); 
            $c->delete();
            $request->session()->flash('success','Catégorie supprimée');
            return redirect()->route('categorie.index');
        }
         catch(\PDOException $c) 
        {
           $request->session()->flash('error','La catégorie est utilisée dans un ou plusieurs postes');
           return redirect()->route('categorie.index'); 
        }
    }
}
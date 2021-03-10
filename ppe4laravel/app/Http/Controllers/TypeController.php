<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $tab = Type::all();
        return view('TypeListe', compact('tab'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('TypeCreate');
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
         
        $t = new Type;
        $t->libelle = $request -> input('libelle');
        $t->save();
        $request->session()->flash('success','Type créée');
         return redirect()->route('type.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $t=Type::find($id); 
        return view('TypeShow', compact('t'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $t =Type::find($id);     
        return view ('TypeEdit', compact('t'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $t=Type::find($id);
        $t -> libelle = $request -> input('libelle');
        $t->save();
        return redirect()->route('type.index');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type, Request $request)
    {
        try
        {
            $t =Type::find($type->id); 
            $t->delete();
            $request->session()->flash('success','Type supprimée');
            return redirect()->route('type.index');
        }
       catch(\PDOException $t) 
        {
            $request->session()->flash('error','Le type est utilisée dans un ou plusieurs postes');
            return redirect()->route('type.index');
        }
    }
}

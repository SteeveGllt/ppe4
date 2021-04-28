<?php

namespace App\Http\Controllers;

use App\Poste;
use App\Type;
use App\Categorie;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Validator;
use Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\DB;

class PosteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('premiereCo');
    }
    public function index()
    {
        $poste = Poste::where('isValide', 1)->get();
        return view('accueil', compact('poste'));
        
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
        
        $validatedData = $request->validate([
            'nomEntreprise' => 'required',
            'ville' => 'required',
            'intitule' => 'required',
            'description' => 'required',
            'categorie' => 'required',
            'type' => 'required',
            'profile_image' => 'mimes:pdf', // max 10000kb
        ]);

    // Tell the validator that this file should be an image
    /*$rules = array(
      'pdf' => 'mimes:pdf|max:10000' // max 10000kb
    );
     // Now pass the input and rules into the validator
     $validator = Validator::make($request->all());
    // Check to see if validation fails or passes
    if ($validator->fails())
    {
          // Redirect or return json to frontend with a helpful message to inform the user 
          // that the provided file was not an adequate type
         
          //return response()->json(['error' => $validator->errors()->getMessages()], 400);
          return redirect()->route('poste.create')->with('error', "Le format du fichier doit être en pdf.");

    } 
        else */ if($request->hasFile('profile_image'))
        {
            $filenamewithextension = $request->file('profile_image')->getClientOriginalName();

            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
      
            //get file extension
            $extension = $request->file('profile_image')->getClientOriginalExtension();
            $time = time();
            //filename to store
            $filenametostore = $filename.'_'.$time.'.'.$extension;

            $request->file('profile_image')->storeAs('public/profile_images', $filenametostore);

            //$path = Storage::putFile('public/profile_images', $request->file('profile_image'));
            //$path = $request->file('profile_image')->getClientOriginalName();


            $p = new Poste;
            $p->intitule = $request->input('intitule');
            $p->description = $request->input('description');
            $p->ville = $request->input('ville');
            $p->nomEntreprise = $request->input('nomEntreprise');
            $p->pdf = $filenametostore;
            $p->isValide = 0;
            $p->type_id = $request->input('type');
            $p->categorie_id = $request->input('categorie');
            $p->user_id = Auth::user()->id;
            $p->save();
      
            return redirect()->route('poste.index')->with('success', "Poste en attente.");
        }
        else
        {


            $p = new Poste;
            $p->intitule = $request->input('intitule');
            $p->description = $request->input('description');
            $p->ville = $request->input('ville');
            $p->nomEntreprise = $request->input('nomEntreprise');
            $p->pdf = "";
            $p->isValide = 0;
            $p->type_id = $request->input('type');
            $p->categorie_id = $request->input('categorie');
            $p->user_id = Auth::user()->id;
            $p->save();
      
            return redirect()->route('poste.index')->with('success', "Poste en attente.");
        }

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
        $p = Poste::find($poste->id);
        $tab = Type::all();
        $categorie = Categorie::all();
        return view('PosteEdit', compact('p', 'tab', 'categorie'));
    
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
        $validatedData = $request->validate([
            'nomEntreprise' => 'required',
            'ville' => 'required',
            'intitule' => 'required',
            'description' => 'required',
            'categorie' => 'required',
            'type' => 'required',
            'profile_image' => 'mimes:pdf', // max 10000kb
        ]);
    if($request->hasFile('profile_image'))
        {
            
            $p = Poste::find($poste->id);
            Storage::delete('public/profile_images/'.$p->pdf);
            
            $filenamewithextension = $request->file('profile_image')->getClientOriginalName();

            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
      
            //get file extension
            $extension = $request->file('profile_image')->getClientOriginalExtension();
            $time = time();
            //filename to store
            $filenametostore = $filename.'_'.$time.'.'.$extension;

            $request->file('profile_image')->storeAs('public/profile_images', $filenametostore);
            
        
        

        $p->intitule = $request->input('intitule');
        $p->description = $request->input('description');
        $p->nomEntreprise = $request->input('nomEntreprise');
        $p->pdf = $filenametostore;
        $p->ville = $request->input('ville');
        $p->type_id = $request->input('type');
        $p->categorie_id = $request->input('categorie');
        
        $p->save();
        return redirect()->route('poste.index')->with('success', "Poste modifié.");
        }
        else
        {
           
            $p = Poste::find($poste->id);
            $p->intitule = $request->input('intitule');
            $p->description = $request->input('description');
            $p->nomEntreprise = $request->input('nomEntreprise');
            $p->ville = $request->input('ville');
            $p->type_id = $request->input('type');
            $p->categorie_id = $request->input('categorie');
            $p->save();
            return redirect()->route('poste.index')->with('success', "Poste modifié.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Poste  $poste
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poste $poste)
    {
        $p = Poste::find($poste->id);
        Storage::delete('public/profile_images/'.$p->pdf);
        $p->delete($p);
        return redirect()->route('poste.index')->with('success', "Poste supprimé.");
    }

    public function validation()
    {
        $tab = Poste::where('isValide', 0)->get();
        return view('PosteValidation', compact('tab'));
    }

    public function editValid($id)
    {
        $p = Poste::find($id);
        $p->isValide = 1;
        $p->save();
        return redirect()->route('poste.validation')->with('success', "Poste accepté.");

    }

    public function postuler($id, Request $request)
    {
        try{
            $user = User::find(Auth::user()->id);
            $poste = Poste::find($id);
            $user->postesPostuler()->attach($poste);
            $request->session()->flash('success',"Vous êtes intéressé(e) par l'offre");
                return redirect()->route('poste.index');

        }
        catch(\PDOException $user)
        {
            if($user->getcode() == "23000")
            {
                $request->session()->flash('error',"Cette offre vous intéresse déjà");
                return redirect()->route('poste.index');
            }
            
        }


    }
    public function unPostuler($id, Request $request)
    {
  
            $user = User::find(Auth::user()->id);
            $poste = Poste::find($id);
            $user->postesPostuler()->detach($poste);
            $request->session()->flash('success',"Vous n'êtes plus intéressé(e) par l'offre");
                return redirect()->route('poste.index');

    }
    public function mesOffres()
    {
        $user = Auth::user();
        $test = $user->postesPostuler;
        return view('mesOffres', compact('test'));
        
    }
}

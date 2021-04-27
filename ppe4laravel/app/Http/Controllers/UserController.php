<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin');
        $this->middleware('premiereCo');
    }
    public function index()
    {
        $u= new User;
        $tab=User::all();
        return view ('UserListe',compact('tab'));
    }  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $user= new User;
       $user->nom=$request->input('name');
       $user->prenom=$request->input('prenom');
       $user->email = $request->input('email');
       $user->cp=$request->input('cp');
       $user->ville=$request->input('ville');
       $user->tel=$request->input('tel');
       $user->premiereCo=0;
       $user->cvConsultable=0;
       $characters = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
       for($i=0;$i<9;$i++)
       {
            $password .= ($i%2) ? strtoupper($characters[array_rand($characters)]) : $characters[array_rand($characters)];
       }
       $user->password=Hash::make($password);
       if($request->has('notifications'))
       {
           $user->notif=1;
           $user->save();
           $request->session()->flash('sucess',"L'utilisateur a bien été créé");
           return redirect('/');
           
       }
       else
       {
           $user->notif=0;
           $user->save();
           return redirect('/');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $u =User::find($id); 
        return view('UserShow', compact('u'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        
        return view('user\edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Request $request)
    {
        try 
        {
        $u =User::find($user->id); 
        $u->delete();
        $request->session()->flash('success','User supprimée');
        return redirect()->route('user.index');
        }
        catch(\PDOException $u)
        {
        $request->session()->flash('error',"L' utilisateur ne peut être supprimé, des messages ou postes lui sont attribués");
        return redirect()->route('user.index');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quizz;
use App\Question;

class QuizzController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('quizz');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getQuestionQuizz($id)
    {
        $quizz = Quizz::find($id);
        $questions = $quizz->questions;
        return response()->json($questions);
    }
    public function postAnswer($id,Request $request)
    {
        $reponse = $request->input('reponse');
        $question = Question::find($id);
        if($reponse == $question->reponse)
        {
            return response()->json([
                'success'=>'true',
            ]);
        }
        else
        {
             return response()->json([
                'success'=>'false',
            ]);
        }
        
    }
    
    public function getAllQuizz()
    {
        $quizz = quizz::with('questions')->get();
        
        return response()->json($quizz);
    }
}

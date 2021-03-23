<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function quizz()
    {
        return $this->belongsTo('App\Quizz');
    }
}

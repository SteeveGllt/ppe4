<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    public function postes()
    {
        return $this->hasMany('App\Poste');
    }
}

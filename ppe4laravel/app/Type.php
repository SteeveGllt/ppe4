<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function postes()
    {
        return $this->hasMany('App\Poste');
    }
}

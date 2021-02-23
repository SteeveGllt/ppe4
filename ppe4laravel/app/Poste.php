<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poste extends Model
{
    public function userProposer()
    {
        return $this->belongsTo('App\User');
    }
    public function userPostuler()
    {
        return $this->belongsToMany('App\User');
    }
    public function categorie()
    {
        return $this->belongsTo('App\Categorie');
    }
    public function type()
    {
        return $this->belongsTo('App\Type');
    }
}

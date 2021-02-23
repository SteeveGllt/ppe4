<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function userEnvoyer()
    {
        return $this->belongsTo('App\User');
    }
    public function userRecevoir()
    {
        return $this->belongsToMany ('App\User');
    }
}

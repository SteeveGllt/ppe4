<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    public function messagesEnvoyer()
    {
        return $this->hasMany('App\Message');
    }
     public function messagesRecevoir()
    {
        return $this->belongsToMany('App\Message');
    }
    public function postesProposer()
    {
        return $this->hasMany('App\Poste');
    }
    public function postesPostuler()
    {
        return $this->belongsTomany('App\Poste');
    }
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

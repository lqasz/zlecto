<?php

namespace Laraspace;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'imie', 'nazwisko', 'email', 'haslo', 'nr_telefonu'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'haslo', 'remember_token',
    ];


    public function isAdmin()
    {
        return ($this->czy_administrator == '1');
    }

    public static function login($request)
    {
        $remember = $request->remember;
        $email = $request->email;
        $haslo = $request->haslo;
        return (\Auth::attempt(['email' => $email, 'haslo' => $haslo], $remember));
    }
}

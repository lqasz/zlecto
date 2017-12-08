<?php

namespace Laraspace;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Webpatser\Uuid\Uuid;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'imie', 'nazwisko', 'email', 'nr_telefonu', 'haslo', 'facebook_id', 'google_id', 'twitter_id'
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
        $password = $request->password;
        return (\Auth::attempt(['email' => $email, 'password' => $password], $remember));
    }

    public static function register($request)
    {
        $this->id = Uuid::generate()->string;
        $this->imie = $request->imie;
        $this->nazwisko = $request->nazwisko;
        $this->email = $request->email;
        $this->nr_telefonu = $request->nr_telefonu;
        $this->haslo = bcrypt($request->haslo);
        $this->save();

        return true;
    }
}

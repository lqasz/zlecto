<?php

namespace Laraspace;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Password;
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
        'first_name', 'last_name', 'email', 'phone_number', 'password', 'facebook_id', 'google_id', 'twitter_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}

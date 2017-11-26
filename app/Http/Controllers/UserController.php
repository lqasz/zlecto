<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;
use App\User;
use Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeNewUser()
    {
        $validator = Validator::make(request()->all(), [
            'imie' => 'required|min:3',
            'nazwisko' => 'required|min:2',
            'email' => 'required|email',
            'nr_telefonu' => 'required|regex:/^\+?([0-9]{3})[- ]?([0-9]{3})[- ]?([0-9]{3})$/',
            'haslo' => 'required|min:8|same:ponownie_haslo',
        ]);

        if(!$validator->fails()) {
            $user = new User;
            $user->id = Uuid::generate()->string;
            $user->id_portfela = Uuid::generate()->string;
            $user->imie = "Jan";
            $user->nazwisko = "Kowalski";
            $user->email = request('email');
            $user->nr_telefonu = request('nr_telefonu');
            $user->haslo = request('haslo');
            $user->status_uzytkownika = 'nieaktywny';
            $user->save();
        } else {
            echo "błąd";
        }

     	return response('1', 200);
    }
}

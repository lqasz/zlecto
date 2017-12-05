<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Webpatser\Uuid\Uuid;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'imie' => 'required|string|max:255|min:3',
            'nazwisko' => 'required|string|max:255|min:2',
            'email' => 'required|string|email|max:255|unique:users',
            'nr_telefonu' => 'required|regex:/^\+?([0-9]{3})[- ]?([0-9]{3})[- ]?([0-9]{3})$/',
            'haslo' => 'required|string|min:8|same:ponownie_haslo',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = new User;
        $user->id = Uuid::generate()->string;
        $user->id_portfela = Uuid::generate()->string;
        $user->imie = $data['imie'];
        $user->nazwisko = $data['nazwisko'];
        $user->email = $data['email'];
        $user->nr_telefonu = $data['nr_telefonu'];
        $user->haslo = bcrypt($data['haslo']);
        $user->status_uzytkownika = 'nieaktywny';
        $user->save();

        return $user;
    }

    public function index()
    {
        return view('main');
    }
}

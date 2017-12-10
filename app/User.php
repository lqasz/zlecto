<?php

namespace Laraspace;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\Password;
use Illuminate\Mail\Message;
use DB, Hash, Mail;

class User extends Authenticatable
{

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

    public $timestamps = false;

    public function isAdmin()
    {
        return ($this->czy_administrator == 1);
    }

    public static function login($request)
    {
        $remember = $request->remember;
        $email = $request->email;
        $password = sha1($request->password);

        return (\Auth::attempt(['email' => $email, 'password' => $password], $remember));
    }

    public function register($request)
    {
        $completed_registration = false;
        $id_uzytkownika = Uuid::generate()->string;
        $id_portfela = Uuid::generate()->string;

        $this->id = $id_uzytkownika;
        $this->id_portfela = $id_portfela;
        $this->imie = $request->first_name;
        $this->nazwisko = $request->last_name;
        $this->email = $request->email;
        $this->data_dodania = date('Y-m-d H:i:s');
        $this->data_modyfikacji = date('Y-m-d H:i:s');
        $this->data_zmiany_hasla = date('Y-m-d H:i:s');
        $this->nr_telefonu = $request->phone_number;
        $this->password = Hash::make(sha1($request->password));

        if($this->save()) {
            $kod_weryfikacyjny = str_random(30);
            DB::table('user_registration')->insert([
                        'id_uzytkownika' => $id_uzytkownika,
                        'token' => $kod_weryfikacyjny,
                        'data_dodania' => date('Y-m-d H:i:s')
                    ]);

            DB::table('wallets')->insert([
                        'id_portfela' => $id_portfela,
                        'id_uzytkownika' => $id_uzytkownika,
                        'data_dodania' => date('Y-m-d H:i:s'),
                        'data_modyfikacji' => date('Y-m-d H:i:s'),
                        'czy_usunieto' => 0,
                        'stan_konta' => 0
                    ]);

            $temat_wiadomosci = "Prosimy o zweryfikowanie adresu email.";
            $email = $this->email;
            $imie_nazwisko = $this->imie ." ". $this->nazwisko;

            Mail::send('index.sessions.registration', [
                    'imie_nazwisko' => $imie_nazwisko, 
                    'kod_weryfikacyjny' => $kod_weryfikacyjny
                ], function($mail) use ($email, $imie_nazwisko, $temat_wiadomosci) {
                    $mail->from("zlec.to", getenv('MAIL_FROM_ADDRESS'));
                    $mail->to($email, $imie_nazwisko);
                    $mail->subject($temat_wiadomosci);
                }); 

            $completed_registration = true; 
        }

        return completed_registration;
    }
}

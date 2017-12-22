<?php

namespace Laraspace;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\Password;
use Illuminate\Mail\Message;
use DB, Hash, Mail;
use Laraspace\Wallet;
use Illuminate\Notifications\Notifiable;
use Laraspace\Mail\RegisterLink;

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
        $user_id = Uuid::generate()->string;
        $wallet_id = Uuid::generate()->string;

        $this->id = $user_id;
        $this->wallet_id = $wallet_id;
        $this->first_name = $request->first_name;
        $this->last_name = $request->last_name;
        $this->email = $request->email;
        $this->phone_number = $request->phone_number;
        $this->password = Hash::make(sha1($request->password));

        if($this->save()) {
            $token = str_random(30);
            $completed_registration = true;
            DB::table('user_registration')->insert([
                        'user_id' => $user_id,
                        'token' => $token,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);

            $wallet = new Wallet();
            $wallet->create($wallet_id, $user_id);

            $email = $this->email;
            $user_name = $this->first_name ." ". $this->last_name;

            Mail::to($email, $user_name)->send(new RegisterLink()); 
        }

        return completed_registration;
    }
}

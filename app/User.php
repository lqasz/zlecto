<?php

namespace Laraspace;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\Password;
use Illuminate\Mail\Message;
use DB, Hash, Mail;
use Laraspace\Wallet;

class User extends Authenticatable
{

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
            DB::table('user_registration')->insert([
                        'user_id' => $user_id,
                        'token' => $token,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);

            $wallet = new Wallet();
            $wallet->create($wallet_id, $user_id);

            $email = $this->email;
            $subject = "Prosimy o zweryfikowanie adresu email.";
            $user_name = $this->first_name ." ". $this->last_name;

            Mail::send('index.sessions.partials.regiser-link', [
                    'user_name' => $user_name, 
                    'token' => $token
                ], function($mail) use ($email, $user_name, $subject) {
                    $mail->from("no-replay@zlec.to", "zlec.to");
                    $mail->to($email, $user_name);
                    $mail->subject($subject);
                }); 

            $completed_registration = true; 
        }

        return completed_registration;
    }
}

<?php

namespace Laraspace\Http\Controllers;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Laraspace\Http\Requests;
use Webpatser\Uuid\Uuid;
use Illuminate\Mail\Message;
use DB, Hash, Mail;
use Laraspace\Wallet;
use Laraspace\User;
use Laraspace\Mail\RegisterLink;

class AuthController extends Controller
{
    public function authenticate(Requests\LoginRequest $request)
    {
        // grab credentials from the request
        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        return response()->json(compact('token'));
    }

    public function check()
    {

        try {
            JWTAuth::parseToken()->authenticate();
        } catch (JWTException $e) {
            return response(['authenticated' => false]);
        }

        return response(['authenticated' => true]);
    }

    public function logout()
    {

        try {
            $token = JWTAuth::getToken();

            if ($token) {
                JWTAuth::invalidate($token);
            }

        } catch (JWTException $e) {
            return response()->json($e->getMessage(), 401);
        }

        return response()->json(['message' => 'Log out success'], 200);
    }

    public function register(Requests\RegistrationRequest $request)
    {
        $user_id = Uuid::generate()->string;
        $wallet_id = Uuid::generate()->string;

        $user = new User();
        $user->id = $user_id;
        $user->wallet_id = $wallet_id;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->password = bcrypt($request->password);

        if($user->save()) {
            $token = str_random(30);
            DB::table('user_registration')->insert([
                        'user_id' => $user_id,
                        'token' => $token,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);

            $wallet = new Wallet();
            $wallet->create($wallet_id, $user_id);

            $email = $user->email;
            $user_name = $user->first_name ." ". $user->last_name;

            Mail::to($email, $user_name)->send(new RegisterLink($user->first_name, $token)); 

            return response()->json(['message' => 'Registered'], 200);
        }

        return response()->json(['message' => 'Couldn`t registered'], 500);
    }

    public function registerUser($token)
    {
        $message = "Nie znaleziono takiego użytkownika";
        $user_id = DB::table('user_registration')->where('token', $token)->value('user_id');


        if($user_id) {
            $user = User::where('id', $user_id)->first();
            $user->status = 'active';
            $user->save();

            DB::table('user_registration')->where('user_id', $user_id)->delete();
            $message = "Konto zostało aktywowane!";
        }

        return response()->json(['message' => $message], 200);
    }
}

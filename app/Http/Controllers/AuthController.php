<?php

namespace Laraspace\Http\Controllers;

use Auth;
use Laraspace\Http\Requests;
use Laraspace\User;
use Socialite, DB;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.sessions.login');
    }

    public function postLogin(Requests\LoginRequest $request)
    {
        if(User::login($request)) {
            flash()->success('Welcome to Laraspace.');
            return redirect()->to('/');
        }

        flash()->error('Invalid Login Credentials');
        return redirect()->back();
    }

    public function logOut()
    {
        Auth::logout();

        return redirect()->to('/login');
    }

    public function register()
    {
        return view('index.sessions.register-2');
    }

    public function postRegister(Requests\RegistrationRequest $request)
    {
        $user = new User();
        if ($user->register($request)) {
            flash()->success('Mail wysłany');
        } else {
            flash()->error('Mail nie wysłany');
        }

        return redirect()->route('home');
    }

    public function getRegister($token)
    {
        $user_id = DB::table('user_registration')->where('token', $token)->value('user_id');

        $user = User::where('id', $user_id)->first();
        $user->status = 'active';
        $user->save();

        Auth::login($user, true);

        flash()->success('Zalogowano');
        DB::table('user_registration')->where('user_id', $user_id)->delete();
        return redirect()->route('home');
    }

    /**
     * Redirect the user to the authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $provider_user = Socialite::driver($provider)->user();

        $user = $this->findUserByProviderOrCreate($provider, $provider_user);

        auth()->login($user);

        flash()->success('Welcome to Laraspace.');

        return redirect()->to('/admin');
    }

    private function findUserByProviderOrCreate($provider, $provider_user)
    {
        $user = User::where($provider . '_id', $provider_user->token)
            ->orWhere('email', $provider_user->email)
            ->first();


        if (!$user) {
            $user = User::create([
                'name' => $provider_user->name,
                'email' => $provider_user->email,
                $provider . '_id' => $provider_user->token
            ]);
        } else {
            // Update the token on each login request
            $user[$provider . '_id'] = $provider_user->token;
            $user->save();
        }

        return $user;
    }
}

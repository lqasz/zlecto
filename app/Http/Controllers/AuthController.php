<?php

namespace Laraspace\Http\Controllers;

use Auth;
use Laraspace\Http\Requests;
use Laraspace\User;
use Socialite;

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
        return view('index.sessions.registration');
    }

    public function postRegister(Requests\RegistrationRequest $request)
    {

        $user = new User();
        if ($user->register($request)) {
            flash()->success('Mail wysłany');
            return view('index.sessions.registration-notifi');
        }

        return redirect()->to('/');
    }

    public function getRegister($token)
    {
        return view('admin.sessions.forgot-password.reset')->with('token', $token);
    }

    public function postRegisterNewUser(Requests $request)
    {
        $user_id = DB::table('user_registration')->where('token', $request['token'])->value('user_id');

        $user = User::where('id', $user_id)->first();
        $user->status = 'active';
        $user->save();

        Auth::login($user, true);

        flash()->success('Zalogowano');
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

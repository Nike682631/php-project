<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use App\UserInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToGoogleProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $social_user = Socialite::driver('google')->user();
        $user = User::where(['email' => $social_user->getEmail()])->first();
        if ($user) {
            Auth::login($user);
            return redirect('/');
        } else {
            return $this->createUserSocial($social_user);
        }
    }

    public function redirectToLinkedInProvider()
    {
        return Socialite::driver('linkedin')->redirect();
    }

    public function handleLinkedInCallback()
    {
        $social_user = Socialite::driver('linkedin')->user();
        $user = User::where(['email' => $social_user->getEmail()])->first();
        if ($user) {
            Auth::login($user);
            return redirect('/');
        } else {
            return $this->createUserSocial($social_user);
        }
    }

    public function createUserSocial($social_user)
    {
        $user = User::create( [
			'name' => '',
			'email' => $social_user->getEmail(),
			'user_type' => 'none',
			'password' => Hash::make(Str::random(8)),
		] );
        $user->assignRole('free_trial');
        $userInfo = new UserInfo();
        $userInfo->person_full_name = $social_user->getName();
        $userInfo->company_name = "";
        $userInfo->registration_code = "";
        $userInfo->country = "AW";
        $userInfo->address  = "";
        $userInfo->employees_number = "1-10";
        $userInfo->save();
		$user->user_info_id = $userInfo->id;
		$user->save();
        Auth::login($user, $remember = true);
        return redirect()->route('register.step1');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    
    // Facebook Login
    public function loginUsingFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFromFacebook()
    {

        $user = Socialite::driver('facebook')->user();

        $this->_registerOrLoginUser($user);

        return redirect()->route('home');

    }

     // Google Login
     public function loginWithGoogle()
     {
         return Socialite::driver('google')->redirect();
     }
 
     public function callbackFromGoogle()
     {
 
         $user = Socialite::driver('google')->user();
 
         $this->_registerOrLoginUser($user);

        return redirect()->route('home');
 
     }
      // Github Login
    public function loginWithGitHub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callbackFromGitHub()
    {

        $user = Socialite::driver('github')->user();

        $this->_registerOrLoginUser($user);

        return redirect()->route('home');

    }

    protected function _registerOrLoginUser($data){
        $user = User::where('email','=',$data->email)->first();
        if(!$user){
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->avatar = $data->avatar;
            $user->save();

        }
        Auth::login($user);
    }



}

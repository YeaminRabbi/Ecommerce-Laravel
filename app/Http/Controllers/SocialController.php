<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Auth;
class SocialController extends Controller
{
    function loginwithGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    function GithubCallBack()
    {
        $user = Socialite::driver('github')->user();

        if(User::where('email',$user->getEmail())->exists())
        {
           $get_user = User::where('email',$user->getEmail())->first();
           Auth::guard()->login($get_user, true);
           return redirect()->to('/home');
 
        }
        else
        {
            $create_user = User::create([
                'name'=>$user->getName(),
                'email'=>$user->getEmail(),
                'provider'=>'github',
                'provider_id'=> $user->getId()
            ]);

            Auth::guard()->login($create_user, true);
            return redirect()->to('/home');
        }
      
    }



    function loginwithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    function GoogleCallBack()
    {
        $user = Socialite::driver('google')->user();

        if(User::where('email',$user->getEmail())->exists())
        {
           $get_user = User::where('email',$user->getEmail())->first();
           Auth::guard()->login($get_user, true);
           return redirect()->to('/home');
 
        }
        else
        {
            $create_user = User::create([
                'name'=>$user->getName(),
                'email'=>$user->getEmail(),
                'provider'=>'google',
                'provider_id'=> $user->getId()
            ]);

            Auth::guard()->login($create_user, true);
            return redirect()->to('/home');
        }
      
    }



    function loginwithFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    function FacebookCallBack()
    {
        $user = Socialite::driver('facebook')->user();

        if(User::where('email',$user->getEmail())->exists())
        {
           $get_user = User::where('email',$user->getEmail())->first();
           Auth::guard()->login($get_user, true);
           return redirect()->to('/home');
 
        }
        else
        {
            $create_user = User::create([
                'name'=>$user->getName(),
                'email'=>$user->getEmail(),
                'provider'=>'facebook',
                'provider_id'=> $user->getId()
            ]);

            Auth::guard()->login($create_user, true);
            return redirect()->to('/home');
        }
      
    }

    
}

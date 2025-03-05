<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class LoginWithGithub extends Controller
{
    //

    function loginWithGit(){
        return "Github Login";
    }

    function redirect(){
        return Socialite::driver('github')->redirect();

    }

    function callback () {
        $githubUser = Socialite::driver('github')->user();
//        dd($githubUser);
        $user = User::updateOrCreate([
            # github --> update token ==> the login
            'github_id' => $githubUser->id,

        ], // if user doesn't exist ==> create
            [
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'password'=> $githubUser->token,
            'github_token' => $githubUser->token,
            'github_refresh_token' => $githubUser->refreshToken,
            'image' => $githubUser->avatar
        ]);




        Auth::login($user);

        return redirect('/home');
    }
}

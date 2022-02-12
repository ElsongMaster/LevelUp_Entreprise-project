<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use Socialite;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    protected $providers = ["google"];
    public function loginRegister(){
        return view ("socialite.login-register");
    }

    public function redirect (Request $rq){
        $provider = $rq->provider;
        if(in_array($provider,$this->providers)){
            return Socialite::driver($provider)->redirect();
        }
    }
}

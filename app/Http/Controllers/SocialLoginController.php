<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\Commuter;

class SocialLoginController extends Controller
{
    //

    public function googleRedirect(Request $request) {

        return Socialite::driver('google')->redirect();
    }

    public function googleCallback(Request $request) {

        $userdata = Socialite::driver('google')->user(); 

        //check login 
        $user = Commuter::where('comm_id', $userdata->comm_id)->where('auth_type','google')->first();

        if($user)
        {
            Auth::login($user);
            return redirect('/bookings');
        }
        else
        {
             //do register
            $uuid = Str::uuid()->toString();
            $user = new Commuter();
            $user->comm_fname =$userdata->comm_fname;
            $user->comm_mail  =$userdata->comm_mail;
            $user->password = Hash::make($uuid.now());
            $user->auth_type ='google';
            $user->save();  
            Auth::login($user);
            return redirect('/bookings');
        }
       
    }
}

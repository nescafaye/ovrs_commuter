<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\Commuter;
use Illuminate\Http\File;

class SocialLoginController extends Controller
{
    //
//     function getSocialAvatar($file, $path){
//     $fileContents = file_get_contents($file);
//     return File::put(public_path() . $path . $user->getId() . ".jpg", $fileContents);
// }

    public function googleRedirect(Request $request) {

        return Socialite::driver('google')->redirect();
    }

    public function googleCallback(Request $request) {

        $userdata = Socialite::driver('google')->user();
        
        //dd($userdata); 

        /*
        function getAvatar($file, $path){
            $fileContents = file_get_contents($file);
            return Storage::put(public_path($path='public/images/') . $path . $userdata->id() . ".jpg", $fileContents);
        }
        */

       //check user if existing 
       $existingUser = Commuter::where('email', $userdata->email)->where('auth_type','google')->first();

       if($existingUser)
        {
            Auth::login($existingUser);
            return redirect('/transactions');
        }
        else
        {
            //register new user
            $uuid = Str::uuid()->toString();
            $newUser = new Commuter();
            $newUser->fname = $userdata->user['given_name'];
            $newUser->lname = $userdata->user['family_name'];
            $newUser->email = $userdata->email;
            $newUser->username = Str::Random(12);
            $newUser->password = Hash::make($uuid.now());
            //$newUser->profilePic = $userdata->user['picture'];
            //$newUser->profilePic = getAvatar($userdata->avatar,'path');
            $newUser->auth_type ='google';
            $newUser->save();

            Auth::login($newUser, true);
            return redirect('/transactions');
        }

    }

}

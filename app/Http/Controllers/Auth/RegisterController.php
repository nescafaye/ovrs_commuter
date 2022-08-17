<?php

namespace App\Http\Controllers\Auth;

use App\Models\Commuter;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::LOGIN;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'comm_fname' => ['required', 'string', 'max:255'],
            'comm_lname' => ['required', 'string', 'max:255'],
            'comm_un' => ['required', 'string', 'max:150'],
            'comm_mail' => ['required', 'string', 'email', 'max:255', 'unique:commuters'],
            'comm_pw' => ['required', 'string', Password::min(8)
                                                ->letters()
                                                ->mixedCase()
                                                ->numbers()
                                                ->symbols()
                                                ->uncompromised()],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Commuter
     */
    protected function create(array $data)
    {
        return Commuter::create([
            'comm_fname' => $data['comm_fname'],
            'comm_lname' => $data['comm_lname'],
            'comm_un' => $data['comm_un'],
            'comm_mail' => $data['comm_mail'],
            'comm_pw' => Hash::make($data['comm_pw']),
        ]);
    }
}

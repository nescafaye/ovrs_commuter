<?php

namespace App\Http\Controllers\Auth\Login;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController as DefaultLoginController;
use App\Providers\RouteServiceProvider;

use Illuminate\Http\Request;

class CommuterController extends DefaultLoginController
{
    //

    // protected $redirectTo = RouteServiceProvider::BOOKINGS;

    // public function __construct()
    // {
    //     $this->middleware('guest:commuters')->except('logout');
    // }
    // public function showLoginForm()
    // {
    //     return view('login');
    // }
    // public function username()
    // {
    //     return 'comm_un';
    // }
    // protected function guard()
    // {
    //     return Auth::guard('commuters');
    // }
}

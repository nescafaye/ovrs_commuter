<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commuter;

class SettingsController extends Controller
{
    //

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $commuters = Commuter::where('comm_id', auth()->id())->get();
        return view('settings', compact('commuters'));
    }
}

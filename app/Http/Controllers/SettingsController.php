<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commuter;
use Illuminate\Support\Facades\Hash;

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

    public function update(Request $request, Commuter $comm)
    {
        $all = $request->except('_token');
        $password = Hash::make($request['password']);
        $update = Commuter::where('comm_id', auth()->id())->update($all, $password);
        
        if  ($update)
                {
                    return redirect()->back()->with('status','Changes saved successfuly');
                }
        else
                {
                    return redirect()->back()->with('status','Changes failed to save');
                }
        }
}


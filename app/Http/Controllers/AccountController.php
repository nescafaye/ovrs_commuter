<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commuter;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
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
    public function index(Commuter $commuters)
    {   
        $commuters = Commuter::where('comm_id', auth()->id())->get();
        return view('accounts', compact('commuters'));
    }

    public function update(Request $request)
    {
        $all = $request->validate([
            'comm_fname' => 'required',
            'comm_lname' => 'required',
            'gender' => 'required',
            'comm_phone' => 'required',
        ]);


        $update = Commuter::where('comm_id', auth()->id())->update($all);
        
        if  ($update)
            {
                return redirect()->back()->with('status','Changes saved successfully!');
            }
        else
            {
                return redirect()->back()->with('status','Changes failed to save');
            }
        }
}

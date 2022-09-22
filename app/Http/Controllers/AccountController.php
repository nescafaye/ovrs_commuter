<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commuter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
        $phone = Commuter::where('comm_id', auth()->id())->value('phone');
        $mask = Str::mask($phone, '*', 2, 7);
        return view('accounts', compact('commuters', 'mask'));
    }

    public function update(Request $request)
    {
        $all = $request->validate([
            'fname' => 'string',
            'lname' => 'string',
            'gender' => 'in:Female,Male,Others',
            'phone' => 'min:11|nullable|numeric',
        ]);


        $update = Commuter::where('comm_id', auth()->id())->update($all);
        
        if  ($update)
            {
                return redirect()->back()->with('success','Changes has been saved successfully!');
            }
        else
            {
                return redirect()->back()->with('error','Changes failed to save');
            }
        }
}

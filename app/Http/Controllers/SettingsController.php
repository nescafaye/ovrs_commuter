<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commuter;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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

    public function update(Request $request)
    {
        $all = $request->validate([
            'email' => 'email',
            'username' => 'string',
            'profilePic' => 'image|nullable|mimes:png,jpg,jpeg,svg,jfif',
            'accName' => 'string|nullable',
            'accNumber' => 'min:11|nullable|numeric',
            'password'  => 'confirmed',
            'password_confirmation'
        ]);


        if ($image = $request->file('profilePic')) {   

            $profileImage = hash('md5', date('YmdHis')) . "." . $image->getClientOriginalExtension();
            $destinationPath = Storage::path('public/images/');   

            $image->move($destinationPath, $profileImage);
            $all['profilePic'] = "$profileImage";
            
        } else {

            unset($all['profilePic']);
        }

        // $product->update($input);
        
        $all['password'] = Hash::make(request()->password);
        $update = Commuter::where('comm_id', auth()->id())->update($all);
        
        if  ($update)
                {
                    return redirect()->back()->with('success','Changes has been saved successfully');
                }
        else
                {
                    return redirect()->back()->with('error','Changes failed to save');
                }
        }
}


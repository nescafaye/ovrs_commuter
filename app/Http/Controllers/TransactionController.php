<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Commuter;
use Nette\Utils\DateTime;
use Illuminate\Support\Carbon;

class TransactionController extends Controller
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

        $commuter_id = Commuter::where('comm_id', auth()->id())->value('comm_id');

        $transactions = Transaction::where('commuterId', $commuter_id)->get();
        $count = count($transactions); 

        $depDate = Transaction::all()->pluck('departureDate');
        $now = Carbon::now();

        // convert departure date from collection to array and from array to string
        $toArray = $depDate->toArray();
        $toString = implode(', ', $toArray);

        // format departure date and date today
        $formatDepDate = date('Y-m-d', strtotime($toString));
        $formatNow = date('Y-m-d', strtotime($now));
        
        $diff = Carbon::parse($formatDepDate)->diffInDays($formatNow);

        return view('transactions', compact('transactions', 'count', 'diff'));
    }
}

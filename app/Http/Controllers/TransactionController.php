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

        return view('transactions', compact('transactions', 'count'));
    }
}

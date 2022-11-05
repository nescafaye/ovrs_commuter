<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commuter;
use Symfony\Component\Console\Input\Input;

class PaymentController extends Controller
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

    public function index(Request $rq)
    {

        $commuter = Commuter::where('comm_id', auth()->id())->get();
    
        $query = $rq->all();
        $query['departureTime'] = date('h:i A', strtotime($query['departureTime']));
        $query['departureDate'] = date('D, M d', strtotime($query['departureDate']));
        $query['seatCode'] = implode(", ", $query['seatCode']);;


        $reservationFee = number_format((float) 8, 2, '.', ',');
        $taxFee = number_format((float) .50, 2, '.', ',');
        $total = number_format( (float) $query['fare'] * $query['passengers'] + $reservationFee + $taxFee, 2, '.', ',');

        return view('payment', compact('commuter', 'query', 'reservationFee', 'taxFee', 'total'));

    }
}

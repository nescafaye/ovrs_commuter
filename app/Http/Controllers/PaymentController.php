<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commuter;
use Illuminate\Support\Facades\Crypt;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

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

    public $total;

    public function index(Request $rq)
    {

        $commuter = Commuter::where('comm_id', auth()->id())->get();
    
        $query = $rq->all();
        $query['departureTime'] = date('h:i A', strtotime($query['departureTime']));
        $query['departureDate'] = date('D, M d', strtotime($query['departureDate']));
        $query['seatCode'] = implode(", ", $query['seatCode']);;
        $query['fare'] = Crypt::decrypt($query['fare']);


        $reservationFee = number_format((float) 8, 2, '.', ',');
        $taxFee = number_format((float) .50, 2, '.', ',');
        $total = number_format( (float) $query['fare'] * $query['passengers'] + $reservationFee + $taxFee, 2, '.', ',');

        return view('payment', compact('commuter', 'query', 'reservationFee', 'taxFee', 'total'));

    }

    public function createPayment(Request $rq) {

        $amount = (int) number_format($rq->totalAmount, 2, '', '');
        
        $response = Http::withHeaders([

            'accept' => 'application/json',
            'authorization' => 'Basic cGtfdGVzdF9YMlNmbTZKRW1GeFZYNXA4b0J4WUhqaUQ6',
            'content-type' => 'application/json',

        ])->post('https://api.paymongo.com/v1/sources' , [
            
                'data' => [
                    'attributes' => [
                        'amount' => $amount,
                        'redirect' => ['success' => 'http://127.0.0.1:8000/transactions',
                                        'failed' => 'http://127.0.0.1:8000/search/results?origin=Tuguegarao&destination=Alcala&departureDate=2022-10-11&returnDate=&noOfPassengers=2&_token=NtHupxZNgOf6rTln52kIdNUDImt4Vo1t2YCT6mKY'],
                        'billing' => ['name' => "Name",
                                    'phone' => "Phone",
                                    'email' => "email@gmail.com"],
                        'type' => 'gcash',
                        'currency' =>'PHP'
                    ]
                ]
            ]);

        $source = json_decode($response->body(), true);
        $redirect = $source['data']['attributes']['redirect']['checkout_url'];

        return redirect($redirect);
    }
}

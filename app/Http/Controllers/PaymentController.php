<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

use App\Models\Commuter;
use App\Models\Transaction;
use App\Models\Seat;

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
        $query['seatCode'] = implode(", ", $query['seatCode']);

        if ($query['returnDate'] !== null) {
            
            $query['returnDate'] = date('D, M d', strtotime($query['returnDate']));
        }


        $reservationFee = number_format((float) 8, 2, '.', ',');
        $taxFee = number_format((float) .50, 2, '.', ',');
        $total = number_format( (float) $query['fare'] * $query['passengers'] + $reservationFee + $taxFee, 2, '.', ',');

        return view('payment', compact('commuter', 'query', 'reservationFee', 'taxFee', 'total'));

    }

    public function createPayment(Request $rq) {

        $amount = (int) number_format($rq->totalAmount, 2, '', '');
        $fullName = $rq->fname[0] . ' ' . $rq->lname[0];
        $query = Crypt::encrypt($rq->all());
        
        $response = Http::withHeaders([

            'accept' => 'application/json',
            'authorization' => 'Basic cGtfdGVzdF9YMlNmbTZKRW1GeFZYNXA4b0J4WUhqaUQ6',
            'content-type' => 'application/json',

        ])->post('https://api.paymongo.com/v1/sources' , [
            
                'data' => [
                    'attributes' => [
                        'amount' => $amount,
                        'redirect' => ['success' => route('success', ['q' => $query]),
                                        'failed' => route('failed'),
                                    ],
                        'billing' => ['name' => $fullName,
                                    'phone' => $rq->contactNo,
                                    'email' => $rq->contactEmail],
                        'type' => 'gcash',
                        'currency' =>'PHP'
                    ]
                ]
            ]);

        $source = json_decode($response->body(), true);
        $redirect = $source['data']['attributes']['redirect']['checkout_url'];

        return redirect($redirect);
    }

    public function successPayment(Request $rq) {

        $query =  Crypt::decrypt($rq->q);
        $count = count($query['fname']);
        $random = random_int(000001, 999999);

        for ($i=0; $i < $count; $i++) { 
            
            $commuter[] = $query['fname'][$i] . ' ' . $query['lname'][$i]; 
        }

        $comm = implode(', ', $commuter);

        $query['departureDate'] = date('Y-m-d', strtotime($query['departureDate']));

        if ($query['returnDate'] !== null) {

            $query['returnDate'] = date('Y-m-d', strtotime($query['returnDate']));
        }

        $toArray = explode(',', $query['seatsTaken']);
        $getSeats = Seat::where('assignedVehicle',  $query['pNo'])->get(['seatCode']);

        foreach ($toArray as $seat) {
            
            $unavailable = $getSeats->where('seatCode', $toArray);

        }

        $commuter_id = Commuter::where('comm_id', auth()->id())->value('comm_id'); 

        Transaction::Create([
                            'transactionNo' => $random,
                            'commuterName' => $comm,
                            'commuterId' => $commuter_id,
                            'transactionType' => 'reserve', 
                            'contactEmail' => $query['contactEmail'],
                            'contactNo' => $query['contactNo'],
                            'seatsTaken' => $query['seatsTaken'],
                            'routeTaken' => $query['route'],
                            'totalAmount' => $query['totalAmount'],
                            'departureDate' => $query['departureDate'],
                            'returnDate' => $query['returnDate'],
                            'fare' => $query['fare'],
                            'paymentMethod' => $query['paymentMethod'],
                            'transactionTime' => Carbon::now()
                        ]);

        $transactionNo = Transaction::all()->value('transactionNo');

        return view('success', compact('transactionNo'));

    }

    public function failedPayment() {

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Pusher\Pusher;


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
        $query = $rq->all();
        $commuter = Commuter::where('comm_id', auth()->id())->get();

        if ($query['type'] == 'reserve') {

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

        else if ($query['type'] == 'rent') {

            $query['pickupTime'] = date('h:i A', strtotime($query['pickupTime']));
            $query['pickupDate'] = date('D, M d', strtotime($query['pickupDate']));

            if ($query['returnDate'] !== null) {
                
                $query['returnDate'] = date('D, M d', strtotime($query['returnDate']));
            }

            $reservationFee = number_format((float) 8, 2, '.', ',');
            $taxFee = number_format((float) .50, 2, '.', ',');
            $total = number_format( (float) $query['rentalPrice'] + $reservationFee + $taxFee, 2, '.', '');

            return view('payment', compact('query', 'commuter', 'reservationFee', 'taxFee', 'total'));
        }
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
                                        'failed' => route('transactions'),
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
        $trNo = str_pad($random, 6, '0', STR_PAD_LEFT);

        for ($i=0; $i < $count; $i++) { 
            
            $commuter[] = $query['fname'][$i] . ' ' . $query['lname'][$i]; 
        }

        $comm = implode(', ', $commuter);

        $query['departureDate'] = date('Y-m-d', strtotime($query['departureDate']));

        if ($query['returnDate'] !== null) {

            $query['returnDate'] = date('Y-m-d', strtotime($query['returnDate']));
        }

        $commuter_id = Commuter::where('comm_id', auth()->id())->value('comm_id'); 

        // if transaction type is reserve

        if ($query['type'] == 'reserve') {

            $toArray = explode(',', $query['seatsTaken']);
            $getSeats = Seat::where('assignedVehicle',  $query['pNo'])->get(['seatCode']);
    
            foreach ($toArray as $seat) {
                
                $unavailable = $getSeats->where('seatCode', $toArray);
            }

            Transaction::Create([
                'transactionNo' => $trNo,
                'commuterName' => $comm,
                'commuterId' => $commuter_id,
                'transactionType' => $query['type'], 
                'contactEmail' => $query['contactEmail'],
                'contactNo' => $query['contactNo'],
                'routeTaken' => $query['route'],
                'totalAmount' => $query['totalAmount'],
                'returnDate' => $query['returnDate'],
                'paymentMethod' => $query['paymentMethod'],
                'seatsTaken' => $query['seatsTaken'],
                'departureDate' => $query['departureDate'],
                'fare' => $query['fare'],
                'transactionTime' => Carbon::now(),
            ]);

            $data['title'] = 'A user reserved a seat';
            $data['content'] = $commuter[0] . ' ' . 'reserved seats' . ' ' . $query['seatsTaken'];
        }

        // if transaction type is rent

        else if ($query['type'] == 'rent') {

            $departTime = date('h:i:s', strtotime($query['pickupTime']));
            $departDate = $query['departureDate'] . ' ' . $departTime;

            Transaction::Create([
                'transactionNo' => $trNo,
                'commuterName' => $comm,
                'commuterId' => $commuter_id,
                'transactionType' => $query['type'], 
                'contactEmail' => $query['contactEmail'],
                'contactNo' => $query['contactNo'],
                'routeTaken' => $query['route'],
                'totalAmount' => $query['totalAmount'],
                'returnDate' => $query['returnDate'],
                'paymentMethod' => $query['paymentMethod'],
                'seatsTaken' => $query['vehicle'],
                'departureDate' => $departDate,
                'fare' => '0',
                'transactionTime' => Carbon::now()
            ]);

            $data['title'] = 'A user rented a van';
            $data['content'] = $comm . ' ' . 'rented' . ' ' . $query['vehicle'];

        }

        $transactionNo = Transaction::where('commuterId', $commuter_id)->latest('created_at')->value('transactionNo');

        // for notifications

        $data['time'] = Carbon::now()->format('M j Y g:i');

        $options = array(
            'cluster' => 'ap1',
            'encrypted' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $pusher->trigger('Notify', 'send-message', $data);

        return view('success', compact('transactionNo'));

    }

    public function failedPayment() {

    }
}

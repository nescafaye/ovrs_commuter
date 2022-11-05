<?php

namespace App\Http\Controllers;
use App\Models\Route;
use App\Models\RouteVehicle;
use Illuminate\Http\Request;
use App\Models\Seat;

class SearchController extends Controller
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
    public function index(Request $request)
    {
        
        $trips = Route::all();

        // dd($trips->trip_route()->orderBy('origin'));

        return view('search', compact('trips'));
    }

    public function query(Request $rq) {

        $trip = RouteVehicle::join('routes', 'routes.routeNo', '=', 'route_vehicle.routeNo')
                            ->get(['routes.origin', 'routes.destination', 'routes.routeTitle', 'route_vehicle.*']);

        if( $rq->origin && $rq->destination && $rq->departureDate){
            
            $result = $trip->where('origin', $rq->origin)
                            ->where('destination', $rq->destination)
                            ->where('departureDate', '==', $rq->departureDate);
                        // ->where('returnDate', '==', $rq->returnDate);
        }

        $plateNo = $result->value('plateNo');

        $getSeats = Seat::where('assignedVehicle', $plateNo)->get('isAvailable');
        $availableSeats = $getSeats->where('isAvailable', 1)->count();

        return view('search', compact('result','availableSeats'));

    }

    public function searchvan(Request $rq) {

        $trip = RouteVehicle::join('vehicles', 'vehicles.plateNo', '=', 'route_vehicle.plateNo')
                            ->join('routes', 'routes.routeNo', '=', 'route_vehicle.routeNo')
                            ->get(['routes.origin', 'routes.destination', 'routes.routeTitle', 'vehicles.*', 'route_vehicle.*']);

        if( $rq->origin && $rq->destination && $rq->departureDate){

            $vans = $trip->where('origin', $rq->origin)
                        ->where('destination', $rq->destination)
                        ->where('departureDate', '==', $rq->departureDate);

        }

        // $plateNo = $result->value('plateNo');

        // $vehicle = Vehicle::all();

        // $vans = $vehicle->where('plateNo', $plateNo);

        // dd(Vehicle::where('plateNo', $plateNo));

        return view('search', compact('vans'));
    }

    
}

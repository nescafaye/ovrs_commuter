<?php

namespace App\Http\Livewire\Modal;

use LivewireUI\Modal\ModalComponent;
use Illuminate\Http\Request;
use App\Models\RouteVehicle;
use App\Models\Seat;
use Illuminate\Support\Facades\URL;

class SelectSeat extends ModalComponent

{

    public $trip;
    public $vehicle;
    public $seat;
    public $query;
    public $returnDate;
    // public $rq;

    public function mount($id)
    {
        // get url query string param
        $parsedUrl = parse_url(URL::previous());
        parse_str($parsedUrl['query'], $this->query);

        $join = RouteVehicle::join('routes', 'routes.routeNo', '=', 'route_vehicle.routeNo')
        ->get(['routes.origin', 'routes.destination', 'routes.routeTitle', 'route_vehicle.*']);

        $get = $this->trip = $join->where('id' , $id);

        // get plateNo from join statement
        $plateNo = $this->vehicle = $get->value('plateNo');

        // get seats of the returned plateNo
        $this->seat = Seat::where('assignedVehicle', $plateNo)->pluck('seatCode');

        foreach ($this->trip as $tr) {

            if ($tr->returnDate == null) {
                $this->returnDate = "None";
            }

            else {
                $this->returnDate = $tr->returnDate;
            }
        }
    }

    public function render()
    {
        return view('livewire.modal.select-seat');
    }

    public static function closeModalOnEscape(): bool
    {
        return false;
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public static function modalMaxWidth(): string
    {
        return 'md';
    }
}

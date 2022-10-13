<?php

namespace App\Http\Livewire\Modal;

use LivewireUI\Modal\ModalComponent;
use App\Models\RouteVehicle;
use App\Models\Seat;

class SelectSeat extends ModalComponent

{

    public $trip;
    public $vehicle;
    public $seat;
    public $choose;

    public function mount($id)
    {
        $join = RouteVehicle::join('routes', 'routes.routeNo', '=', 'route_vehicle.routeNo')
        ->get(['routes.origin', 'routes.destination', 'routes.routeTitle', 'route_vehicle.*']);

        $get = $this->trip = $join->where('id' , $id);

        // get plateNo from join statement
        $plateNo = $this->vehicle = $get->value('plateNo');

        // get seats of the returned plateNo
        $this->seat = Seat::where('assignedVehicle', $plateNo)->pluck('seatCode');
        
    }

    public function render()
    {
        
        return view('livewire.modal.select-seat');
    }

    public function increment()
    {
        $this->choose++;
    }

    public static function closeModalOnEscape(): bool
    {
        return false;
    }

    public static function closeModalOnClickAway(): bool
    {
        return true;
    }

    public static function modalMaxWidth(): string
    {
        return 'sm';
    }
}

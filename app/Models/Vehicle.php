<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'vehicles';
    protected $primaryKey = 'id';
    

    protected $fillable = [
        'plateNo',
        'assignedDriver',
        'model',
        'rentalPrice',
        'brand',
        'color',
        'transmissionType',
        'amenities',
        'seatCapacity',
        'desc',
        'vanImages'
    ];

    /**
     * Get the driver assigned to the vehicle.
     */
    public function assignedDriver()
    {
        return $this->belongsTo(Driver::class, 'assignedDriver', 'dvr_id');
    }

    /**
     * Get the routes of the vehicle.
     */
    public function routes()
    {
        return $this->belongsToMany(Route::class, 'route_vehicle', 'plateNo', 'routeNo', 'plateNo', 'routeNo')->withPivot('fare', 'departureDate', 'departureTime', 'returnDate');
    }

    /**
     * Get the seats of the vehicle.
     */
    public function seats()
    {
        return $this->hasMany(Seat::class, 'assignedVehicle', 'plateNo');
    }

    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class RouteVehicle extends Pivot
{
    use HasFactory;

      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'route_vehicle';
    protected $primaryKey = 'id';

    protected $fillable = [
        'routeNo',
        'plateNo',
        'fare',
        'departureDate',
        'departureTime',
        'returnDate',

    ];
}

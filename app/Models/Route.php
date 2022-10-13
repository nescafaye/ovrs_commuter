<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'routes';
    protected $primaryKey = 'id';

    protected $fillable = [
        'routeNo',
        'routeTitle',
        'origin',
        'destination',
       
    ];

     /**
     * Get the corresponding vehicle of the route.
     */
    public function trips()
    {
        return $this->belongsToMany(Vehicle::class, 'route_vehicle', 'routeNo', 'plateNo', 'routeNo', 'plateNo')->withPivot('fare', 'departureDate', 'departureTime', 'returnDate');
    }
}

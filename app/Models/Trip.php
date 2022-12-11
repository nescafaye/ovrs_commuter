<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'vehicle_route';
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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'seats';
    protected $primaryKey = 'id';
    

    protected $fillable = [
        'seatCode',
        'assignedVehicle',
        'isAvailable', 
    ];
}

<?php

namespace App\Models;

// use App\Http\Middleware\Authenticate;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Foundation\Auth\User as Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Commuter extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'commuters';
    protected $primaryKey = 'comm_id';

    protected $fillable = [
        'comm_fname',
        'comm_lname',
        'comm_un',
        'comm_pw',
        'comm_mail',
        'comm_phone',
        'birthdate',
        'gender',
    ];

    protected $hidden = [
        'comm_pw',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

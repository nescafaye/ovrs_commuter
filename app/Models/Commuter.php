<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commuter extends Model
{
    use HasFactory;

    protected $fillable = [
        'comm_id',
        'comm_fname',
        'comm_un',
        'comm_pw',
        'comm_mail',
        'comm_phone',
        'birthdate',
        'gender'
    ];

    protected $hidden = [
        'comm_pw',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

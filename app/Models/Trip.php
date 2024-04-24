<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'booking_id',
        'driver_id',
        'tariff_id',
        'enquiry_id',
        'start_loc',
        'end_loc',
        'start_date',
        'end_date',
        'start_hr',
        'end_hr',
        'start_km',
        'end_km',
        'extra_km',
        'extra_charge',
        'min_charge',
        'waiting_charge',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];
}
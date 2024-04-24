<?php

namespace App\Models;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Premium extends Model
{
    use HasFactory;
    protected $table = 'premium';
    
    protected $dates = ['premium_start_date', 'premium_end_date'];

    public function getStatusAttribute()
    {
        if ($this->premium_end_date < Carbon::now()) {
            return 'Expired';
        }

        return 'Active';
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}

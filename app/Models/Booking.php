<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'bookings';
    protected $fillable = [
        'user_id',
        'user_name',
        'stade_id',
        'stade_name',
        'stade_image',
        'date',
        'checkin_time',
        'checkout_time',
        'totalprice',
        'quantity',
        'status',
        
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}



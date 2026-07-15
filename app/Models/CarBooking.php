<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CarBooking extends Model
{
    protected $fillable = [
    'user_id',
    'car_id',
    'motorcycle_id',
    'helicopter_tour_id',
    'service_type',
    'car_name',
    'car_category',
    'price',
    'total_amount',
    'customer_name',
    'customer_phone',
    'customer_email',
    'pickup_date',
    'return_date',
    'pickup_location',
    'note',
    'status',
    'booking_code',
    'payment_status',
    'is_read',
    'snap_token',
    'midtrans_order_id',
];

public function user(): BelongsTo
{
    return $this->belongsTo(User::class);
}

}


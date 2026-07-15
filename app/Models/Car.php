<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'category',
        'name',
        'price_per_day',
        'image',
        'tag',
        'passenger',
        'service',
        'purpose',
        'description',
        'is_active',
    ];
}
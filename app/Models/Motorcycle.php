<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motorcycle extends Model
{
    protected $fillable = [
        'category',
        'name',
        'price_per_day',
        'image',
        'tag',
        'cc',
        'fuel',
        'transmission',
        'description',
        'is_active',
    ];
}
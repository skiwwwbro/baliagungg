<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HelicopterTour extends Model
{
    protected $fillable = [
    'category',
    'package_name',
    'price',
    'image',
    'tag',
    'duration',
    'passenger',
    'route',
    'description',
    'is_active',
];
}

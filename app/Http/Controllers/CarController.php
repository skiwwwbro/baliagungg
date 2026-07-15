<?php

namespace App\Http\Controllers;

use App\Models\Car;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::where('is_active', true)
            ->latest()
            ->get();

        return view('cars', compact('cars'));
    }
}
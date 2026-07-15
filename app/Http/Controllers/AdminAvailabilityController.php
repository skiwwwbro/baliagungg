<?php

namespace App\Http\Controllers;

use App\Models\CarBooking;

class AdminAvailabilityController extends Controller
{
    public function index()
    {
        $carBookings = CarBooking::where('service_type', 'car')
            ->whereIn('status', ['pending', 'confirmed'])
            ->latest()
            ->get();

        $motorcycleBookings = CarBooking::where('service_type', 'motorcycle')
            ->whereIn('status', ['pending', 'confirmed'])
            ->latest()
            ->get();

        return view('admin.availability.index', compact(
            'carBookings',
            'motorcycleBookings'
        ));
    }
}
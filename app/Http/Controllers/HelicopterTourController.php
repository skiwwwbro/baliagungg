<?php

namespace App\Http\Controllers;

use App\Models\HelicopterTour;

class HelicopterTourController extends Controller
{
    public function index()
    {
        $tours = HelicopterTour::where('is_active', true)
            ->latest()
            ->get();

        return view('helicopter', compact('tours'));
    }
}
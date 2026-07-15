<?php

namespace App\Http\Controllers;

use App\Models\Motorcycle;

class MotorcycleController extends Controller
{
    public function index()
    {
        $motors = Motorcycle::where('is_active', true)
            ->latest()
            ->get();

        return view('motorcycle', compact('motors'));
    }
}
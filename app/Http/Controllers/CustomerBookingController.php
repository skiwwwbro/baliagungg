<?php

namespace App\Http\Controllers;

use App\Models\CarBooking;

class CustomerBookingController extends Controller
{
    public function index()
    {
        $bookings = CarBooking::where('customer_email', auth()->user()->email)
            ->latest()
            ->paginate(10);

        return view('customer.bookings', compact('bookings'));
    }

    public function show(CarBooking $booking)
    {

        
        abort_if($booking->customer_email !== auth()->user()->email, 403);

        return view('customer.booking-detail', compact('booking'));
    }
}
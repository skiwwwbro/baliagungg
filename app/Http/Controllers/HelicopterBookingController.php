<?php

namespace App\Http\Controllers;

use App\Models\CarBooking;
use App\Models\HelicopterTour;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class HelicopterBookingController extends Controller
{
    public function create(Request $request)
    {
        $tour = HelicopterTour::findOrFail($request->tour_id);

        return view('booking.helicopter', compact('tour'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tour_id' => 'required|exists:helicopter_tours,id',
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:50',
            'customer_email' => 'nullable|email',
            'pickup_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:pickup_date',
            'pickup_location' => 'required|string|max:255',
            'note' => 'nullable|string',
        ]);

        $tour = HelicopterTour::findOrFail($validated['tour_id']);

        $booking = CarBooking::create([
            'helicopter_tour_id' => $tour->id,
            'service_type' => 'helicopter',
            'car_name' => $tour->package_name,
            'car_category' => $tour->category,
            'price' => $tour->price,
            'total_amount' => $tour->price,
            'customer_name' => $validated['customer_name'],
            'customer_phone' => $validated['customer_phone'],
            'customer_email' => $validated['customer_email'],
            'pickup_date' => $validated['pickup_date'],
            'return_date' => $validated['return_date'],
            'pickup_location' => $validated['pickup_location'],
            'note' => $validated['note'] ?? null,
            'status' => 'pending',
            'payment_status' => 'unpaid',
            'is_read' => false,
        ]);

        $orderId = 'BAT-' . now()->format('Ymd') . '-' . str_pad($booking->id, 4, '0', STR_PAD_LEFT);

        $booking->update([
            'booking_code' => $orderId,
            'midtrans_order_id' => $orderId,
        ]);

        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $snapToken = Snap::getSnapToken([
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => (int) $booking->total_amount,
            ],
            'customer_details' => [
                'first_name' => $booking->customer_name,
                'email' => $booking->customer_email,
                'phone' => $booking->customer_phone,
            ],
            'item_details' => [[
                'id' => $booking->booking_code,
                'price' => (int) $booking->total_amount,
                'quantity' => 1,
                'name' => 'Helicopter Tour - ' . $booking->car_name,
            ]],
        ]);

        $booking->update([
            'snap_token' => $snapToken,
        ]);

        return response()->json([
            'success' => true,
            'snap_token' => $snapToken,
            'booking_code' => $booking->booking_code,
        ]);
    }
}
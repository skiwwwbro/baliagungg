<?php

namespace App\Http\Controllers;

use App\Models\CarBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminCarBookingController extends Controller
{
    public function index(Request $request)
    {
        if ($request->new) {
            CarBooking::where('is_read', false)->update([
                'is_read' => true,
            ]);
        }

        $bookings = CarBooking::query()
            ->when($request->search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('booking_code', 'like', "%{$search}%")
                        ->orWhere('customer_name', 'like', "%{$search}%")
                        ->orWhere('customer_email', 'like', "%{$search}%")
                        ->orWhere('customer_phone', 'like', "%{$search}%")
                        ->orWhere('car_name', 'like', "%{$search}%")
                        ->orWhere('service_type', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.carbooking.carbooking', compact('bookings'));
    }

    public function updatePaymentStatus(Request $request, CarBooking $booking)
    {
        $validated = $request->validate([
            'payment_status' => 'required|in:unpaid,pending,paid,failed',
        ]);

        $booking->update([
            'payment_status' => $validated['payment_status'],
        ]);

        return back()->with('success', 'Status pembayaran berhasil diubah.');
    }

    public function updateStatus(Request $request, CarBooking $booking)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled',
        ]);

        $booking->update([
            'status' => $validated['status'],
        ]);

        $message =
"Hello {$booking->customer_name},

Your booking status has been updated.

Vehicle:
{$booking->car_name}

Rental Date:
{$booking->pickup_date} - {$booking->return_date}

Status:
" . ucfirst($booking->status) . "

Thank you,
Bali Agung Trans";

        try {
            Http::withHeaders([
                'Authorization' => env('FONNTE_TOKEN'),
            ])->post('https://api.fonnte.com/send', [
                'target' => $booking->customer_phone,
                'message' => $message,
            ]);
        } catch (\Exception $e) {
            //
        }

        return back()->with('success', 'Status booking berhasil diubah.');
    }
}
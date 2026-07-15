<?php

namespace App\Http\Controllers;

use App\Models\CarBooking;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;

class CarPaymentController extends Controller
{
    public function show(CarBooking $booking)
{


    $this->authorize('view', $booking);

    Config::$serverKey = env('MIDTRANS_SERVER_KEY');
    Config::$isProduction = env('MIDTRANS_IS_PRODUCTION') === 'true';
    Config::$isSanitized = true;
    Config::$is3ds = true;

    if (!$booking->booking_code) {
    $booking->update([
        'booking_code' => 'BAT-' . now()->format('Ymd') . '-' . str_pad($booking->id, 4, '0', STR_PAD_LEFT),
    ]);

    $booking->refresh();
        }

        if (!$booking->total_amount || $booking->total_amount <= 0) {
            return back()->with('error', 'Total pembayaran belum tersedia. Silakan buat ulang booking.');
        }

    if (!$booking->snap_token) {
        $orderId = $booking->booking_code;

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $booking->total_amount,
            ],
            'customer_details' => [
                'first_name' => $booking->customer_name,
                'email' => $booking->customer_email,
                'phone' => $booking->customer_phone,
            ],
            'item_details' => [
                [
                    'id' => $booking->booking_code,
                    'price' => (int) $booking->total_amount,
                    'quantity' => 1,
                    'name' => 'Booking Full Payment - ' . $booking->car_name,
                ]
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        $booking->update([
            'snap_token' => $snapToken,
            'midtrans_order_id' => $orderId,
        ]);
    }

    return view('booking.payment', compact('booking'));
}

    public function notification(Request $request)
    {
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION') === 'true';

        $notif = new Notification();

        $signature = hash(
            'sha512',
            $notif->order_id .
            $notif->status_code .
            $notif->gross_amount .
            env('MIDTRANS_SERVER_KEY')
        );

        if ($signature !== $notif->signature_key) {
            return response()->json([
                'message' => 'Invalid Signature'
            ], 403);
        }

        $booking = CarBooking::where(
            'midtrans_order_id',
            $notif->order_id
        )->first();

        if (!$booking) {
            return response()->json([
                'message' => 'Booking not found'
            ], 404);
        }

        switch ($notif->transaction_status) {

            case 'capture':
            case 'settlement':

                $booking->update([
                    'payment_status' => 'paid',
                    'status' => 'confirmed',
                ]);

                break;

            case 'pending':

                $booking->update([
                    'payment_status' => 'pending',
                ]);

                break;

            case 'deny':
            case 'cancel':
            case 'expire':

                $booking->update([
                    'payment_status' => 'failed',
                ]);

                break;
        }

        return response()->json([
            'message' => 'OK'
        ]);
    }
}
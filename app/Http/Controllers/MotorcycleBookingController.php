<?php

namespace App\Http\Controllers;

use App\Models\CarBooking;
use App\Models\Motorcycle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class MotorcycleBookingController extends Controller
{
    public function create(Request $request)
    {
        $motor = Motorcycle::findOrFail($request->motorcycle_id);

        return view('booking.motorcycle', compact('motor'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'motorcycle_id'      => 'required|exists:motorcycles,id',
            'customer_name'      => 'required|string|max:255',
            'customer_phone'     => 'required|string|max:50',
            'customer_email'     => 'nullable|email|max:255',
            'pickup_date'        => 'required|date|after_or_equal:today',
            'return_date'        => 'required|date|after_or_equal:pickup_date',
            'pickup_location'    => 'required|string|max:255',
            'note'               => 'nullable|string|max:1000',
        ]);

        $motor = Motorcycle::findOrFail($validated['motorcycle_id']);

        /*
        |--------------------------------------------------------------------------
        | CHECK AVAILABILITY
        |--------------------------------------------------------------------------
        */

        $exists = CarBooking::where('service_type', 'motorcycle')
            ->where('motorcycle_id', $motor->id)
            ->whereIn('status', [
                'pending',
                'confirmed',
                'completed'
            ])
            ->where(function ($query) use ($validated) {

                $query
                    ->whereBetween(
                        'pickup_date',
                        [
                            $validated['pickup_date'],
                            $validated['return_date']
                        ]
                    )

                    ->orWhereBetween(
                        'return_date',
                        [
                            $validated['pickup_date'],
                            $validated['return_date']
                        ]
                    )

                    ->orWhere(function ($q) use ($validated) {

                        $q->where('pickup_date', '<=', $validated['pickup_date'])
                            ->where('return_date', '>=', $validated['return_date']);

                    });

            })

            ->exists();

        if ($exists) {

            return response()->json([
                'success' => false,
                'message' => 'Motorcycle has already been booked for the selected dates.'
            ],422);

        }

        /*
        |--------------------------------------------------------------------------
        | TOTAL DAYS
        |--------------------------------------------------------------------------
        */

        $pickup = Carbon::parse($validated['pickup_date']);
        $return = Carbon::parse($validated['return_date']);

        $days = max($pickup->diffInDays($return),1);

        $total = $motor->price_per_day * $days;

        /*
        |--------------------------------------------------------------------------
        | CREATE BOOKING
        |--------------------------------------------------------------------------
        */

        $booking = CarBooking::create([

            'service_type'      => 'motorcycle',

            'motorcycle_id'     => $motor->id,

            'car_name'          => $motor->name,
            'car_category'      => $motor->category,

            'price'             => $motor->price_per_day,

            'total_amount'      => $total,

            'customer_name'     => $validated['customer_name'],
            'customer_phone'    => $validated['customer_phone'],
            'customer_email'    => $validated['customer_email'],

            'pickup_date'       => $validated['pickup_date'],
            'return_date'       => $validated['return_date'],
            'pickup_location'   => $validated['pickup_location'],
            'note'              => $validated['note'],

            'status'            => 'pending',
            'payment_status'    => 'unpaid',
            'is_read'           => false,

        ]);

        /*
        |--------------------------------------------------------------------------
        | BOOKING CODE
        |--------------------------------------------------------------------------
        */

        $bookingCode =

            'MTR-' .

            now()->format('Ymd') .

            '-' .

            str_pad($booking->id,5,'0',STR_PAD_LEFT);

        $booking->update([

            'booking_code'      => $bookingCode,
            'midtrans_order_id' => $bookingCode,

        ]);

        /*
        |--------------------------------------------------------------------------
        | MIDTRANS
        |--------------------------------------------------------------------------
        */

        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION',false);
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $snapToken = Snap::getSnapToken([

            'transaction_details'=>[

                'order_id'=>$bookingCode,

                'gross_amount'=>(int)$booking->total_amount,

            ],

            'customer_details'=>[

                'first_name'=>$booking->customer_name,

                'email'=>$booking->customer_email,

                'phone'=>$booking->customer_phone,

            ],

            'item_details'=>[

                [

                    'id'=>$bookingCode,

                    'price'=>(int)$booking->total_amount,

                    'quantity'=>1,

                    'name'=>'Motorcycle Rental - '.$motor->name,

                ]

            ]

        ]);

        $booking->update([

            'snap_token'=>$snapToken

        ]);

        return response()->json([

            'success'=>true,

            'booking_code'=>$bookingCode,

            'snap_token'=>$snapToken,

        ]);

    }
}
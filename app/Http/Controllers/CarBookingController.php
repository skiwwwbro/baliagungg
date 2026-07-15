<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarBooking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Midtrans\Config;
use Midtrans\Snap;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;


class CarBookingController extends Controller
{
    public function create(Request $request)
    {
        $car = Car::findOrFail($request->car_id);

        return view('booking.car', [
            'car' => $car,
            'car_name' => $car->name,
            'car_category' => $car->category,
            'price' => $car->price_per_day,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'car_id' => 'required|exists:cars,id',

            'car_name' => 'required|string',
            'car_category' => 'nullable|string',
            'price' => 'nullable|string',

            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:50',
            'customer_email' => 'nullable|email',

            'pickup_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:pickup_date',
            'pickup_location' => 'required|string|max:255',
            'note' => 'nullable|string',
        ]);

        $car = Car::findOrFail($validated['car_id']);

        $conflictBooking = CarBooking::where('car_id', $validated['car_id'])
            ->whereIn('status', ['pending', 'confirmed', 'completed'])
            ->where(function ($query) use ($validated) {
                $query->whereBetween('pickup_date', [
                    $validated['pickup_date'],
                    $validated['return_date']
                ])
                ->orWhereBetween('return_date', [
                    $validated['pickup_date'],
                    $validated['return_date']
                ])
                ->orWhere(function ($query) use ($validated) {
                    $query->where('pickup_date', '<=', $validated['pickup_date'])
                        ->where('return_date', '>=', $validated['return_date']);
                });
            })
            ->exists();

        if ($conflictBooking) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Mobil ini sudah dibooking pada tanggal tersebut. Silakan pilih tanggal lain.',
                ], 422);
            }

            return back()
                ->withErrors([
                    'pickup_date' => 'Mobil ini sudah dibooking pada tanggal tersebut. Silakan pilih tanggal lain.',
                ])
                ->withInput();
        }

        if (auth()->check()) {
            $validated['user_id'] = auth()->id();

            $validated['customer_name'] = auth()->user()->name;
            $validated['customer_email'] = auth()->user()->email;
            $validated['customer_phone'] = auth()->user()->phone ?? $validated['customer_phone'];
        }

        $startDate = Carbon::parse($validated['pickup_date']);
        $returnDate = Carbon::parse($validated['return_date']);

        $totalDays = max($startDate->diffInDays($returnDate), 1);

        $validated['service_type'] = 'car';
        $validated['car_name'] = $car->name;
        $validated['car_category'] = $car->category;
        $validated['price'] = $car->price_per_day;
        $validated['total_amount'] = $car->price_per_day * $totalDays;
        $validated['status'] = 'pending';
        $validated['payment_status'] = 'unpaid';
        $validated['is_read'] = false;

        $booking = CarBooking::create($validated);

        $orderId = 'BAT-' . now()->format('Ymd') . '-' . Str::upper(Str::random(6));

        $booking->update([
            'booking_code' => $orderId,
            'midtrans_order_id' => $orderId,
        ]);

        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => (int) $booking->total_amount,
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
                    'name' => 'Car Rental - ' . $booking->car_name,
                ]
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        $booking->update([
            'snap_token' => $snapToken,
        ]);

        $customerMessage =
"Hello {$booking->customer_name},

Thank you for your booking request with Bali Agung Trans.

Vehicle:
{$booking->car_name}

Rental Date:
{$booking->pickup_date} - {$booking->return_date}

Total:
Rp " . number_format($booking->total_amount, 0, ',', '.') . "

Pickup Location:
{$booking->pickup_location}

Status:
Pending Payment

Regards,
Bali Agung Trans";

        $adminMessage =
"New Car Booking

Customer:
{$booking->customer_name}

WhatsApp:
{$booking->customer_phone}

Vehicle:
{$booking->car_name}

Rental Date:
{$booking->pickup_date} - {$booking->return_date}

Total:
Rp " . number_format($booking->total_amount, 0, ',', '.') . "

Pickup Location:
{$booking->pickup_location}

Note:
" . ($booking->note ?? '-') . "

Status:
Pending";

        try {
            Http::withHeaders([
                'Authorization' => env('FONNTE_TOKEN'),
            ])->post('https://api.fonnte.com/send', [
                'target' => $booking->customer_phone,
                'message' => $customerMessage,
            ]);

            Http::withHeaders([
                'Authorization' => env('FONNTE_TOKEN'),
            ])->post('https://api.fonnte.com/send', [
                'target' => env('ADMIN_WHATSAPP'),
                'message' => $adminMessage,
            ]);
        } catch (\Exception $e) {
                Log::error('Fonnte Error', [
                    'message' => $e->getMessage(),
                ]);
            }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'snap_token' => $snapToken,
                'booking_code' => $booking->booking_code,
            ]);
        }

        return redirect()->route('cars.payment', $booking);
    }
}
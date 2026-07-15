@extends('layouts.app')

@section('content')

<section class="min-h-screen bg-[#F5F1EB] px-5 py-24">

    <div class="mx-auto max-w-[900px]">

        <div class="mb-8 flex items-center justify-between">

            <div>
                <p class="mb-3 text-[10px] font-semibold uppercase tracking-[0.28em] text-[#B07A45]">
                    Booking Detail
                </p>

                <h1 class="font-serif text-[42px] leading-[0.95] text-[#1A1A1A]">
                    {{ $booking->booking_code }}
                </h1>
            </div>

            <a href="{{ route('customer.bookings') }}"
               class="rounded-full bg-[#171717] px-6 py-3 text-xs font-semibold text-white">
                Back
            </a>

        </div>

        <div class="rounded-[32px] bg-white p-8 shadow-lg">

            <div class="grid gap-6 md:grid-cols-2">

                <div>
                    <p class="text-xs uppercase tracking-[0.15em] text-[#8C7B62]">
                        Vehicle
                    </p>

                    <h3 class="mt-2 text-2xl font-semibold">
                        {{ $booking->car_name }}
                    </h3>

                    <p class="mt-2 text-[#6B6B6B] capitalize">
                        {{ $booking->car_category }}
                    </p>
                </div>

                <div>
                    <p class="text-xs uppercase tracking-[0.15em] text-[#8C7B62]">
                        Total Payment
                    </p>

                    <h3 class="mt-2 text-2xl font-semibold">
                        Rp {{ number_format($booking->total_amount ?? 0,0,',','.') }}
                    </h3>
                </div>

                <div>
                    <p class="text-xs uppercase tracking-[0.15em] text-[#8C7B62]">
                        Rental Date
                    </p>

                    <p class="mt-2">
                        {{ $booking->pickup_date }}
                        -
                        {{ $booking->return_date }}
                    </p>
                </div>

                <div>
                    <p class="text-xs uppercase tracking-[0.15em] text-[#8C7B62]">
                        Pickup Location
                    </p>

                    <p class="mt-2">
                        {{ $booking->pickup_location }}
                    </p>
                </div>

                <div>
                    <p class="text-xs uppercase tracking-[0.15em] text-[#8C7B62]">
                        Booking Status
                    </p>

                    <p class="mt-2 capitalize">
                        {{ $booking->status }}
                    </p>
                </div>

                <div>
                    <p class="text-xs uppercase tracking-[0.15em] text-[#8C7B62]">
                        Payment Status
                    </p>

                    <p class="mt-2 capitalize">
                        {{ $booking->payment_status }}
                    </p>
                </div>

            </div>

            @if($booking->note)

                <div class="mt-8 border-t border-black/10 pt-6">

                    <p class="text-xs uppercase tracking-[0.15em] text-[#8C7B62]">
                        Notes
                    </p>

                    <p class="mt-3 text-[#6B6B6B]">
                        {{ $booking->note }}
                    </p>

                </div>

            @endif

        </div>

    </div>

</section>

@endsection
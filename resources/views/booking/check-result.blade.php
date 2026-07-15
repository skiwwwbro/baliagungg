@extends('layouts.app')

@section('content')

<section class="flex min-h-screen items-center justify-center bg-[#F5F1EB] px-5">

    <div class="w-full max-w-[560px] rounded-[34px] bg-white p-8 shadow-lg">

        @if ($booking)

            <p class="mb-4 text-[10px] font-semibold uppercase tracking-[0.28em] text-[#B07A45]">
                Booking Found
            </p>

            <h1 class="font-serif text-[42px] text-[#1A1A1A]">
                {{ $booking->booking_code }}
            </h1>

            <div class="mt-6 space-y-3 text-sm text-[#1A1A1A]">
                <p><strong>Vehicle:</strong> {{ $booking->car_name }}</p>
                <p><strong>Date:</strong> {{ $booking->pickup_date }} - {{ $booking->return_date }}</p>
                <p><strong>Booking Status:</strong> {{ ucfirst($booking->status) }}</p>
                <p><strong>Payment Status:</strong> {{ ucfirst($booking->payment_status) }}</p>
            </div>

        @else

            <h1 class="font-serif text-[42px] text-[#1A1A1A]">
                Booking Not Found
            </h1>

            <p class="mt-4 text-sm text-[#6B6B6B]">
                Please check your booking code and email.
            </p>

        @endif

    </div>

</section>

@endsection
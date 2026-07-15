@extends('admin.layout')

@section('admin-title', 'Fleet Availability')

@section('admin-content')

<section class="min-h-screen bg-[#F4F4F1] text-[#171717]">

    @php
        $calendarDays = collect(range(0, 29))->map(fn ($day) => now()->startOfDay()->addDays($day));
        $allBookings = $carBookings->merge($motorcycleBookings);
    @endphp

    <div class="mb-8">
        <p class="text-sm text-[#777]">Fleet Schedule</p>
        <h1 class="mt-2 text-[42px] font-semibold tracking-[-0.05em] sm:text-[56px]">
            Availability Calendar
        </h1>
        <p class="mt-3 text-sm text-[#777]">
            Booked vehicles for the next 14 days.
        </p>
    </div>

    <div class="overflow-hidden rounded-[34px] bg-white shadow-[0_18px_55px_rgba(0,0,0,0.05)]">
        <div class="overflow-x-auto">

            <div class="grid min-w-[1100px]" style="grid-template-columns: 220px repeat(30, minmax(86px, 1fr));">

                <div class="border-b border-r border-black/10 bg-[#171717] px-5 py-4 text-sm font-semibold text-white">
                    Vehicle
                </div>

                @foreach ($calendarDays as $day)
                    <div class="border-b border-r border-black/10 bg-[#171717] px-3 py-4 text-center text-white">
                        <p class="text-xs text-white/60">{{ $day->format('D') }}</p>
                        <p class="text-sm font-semibold">{{ $day->format('d M') }}</p>
                    </div>
                @endforeach

                @forelse ($allBookings as $booking)

                    <div class="border-b border-r border-black/10 px-5 py-4">
                        <p class="font-semibold">{{ $booking->car_name }}</p>
                        <p class="mt-1 text-xs capitalize text-[#777]">
                            {{ $booking->service_type ?? 'car' }}
                        </p>
                        <p class="mt-1 text-xs text-[#777]">
                            {{ $booking->customer_name }}
                        </p>
                    </div>

                    @foreach ($calendarDays as $day)
                        @php
                            $isBooked = $day->between(
                                \Carbon\Carbon::parse($booking->pickup_date)->startOfDay(),
                                \Carbon\Carbon::parse($booking->return_date)->startOfDay()
                            );
                        @endphp

                        <div class="border-b border-r border-black/10 px-2 py-4 text-center">
                            @if ($isBooked)
                                <span class="inline-flex rounded-full px-3 py-1 text-[11px] font-semibold
                                    @if (($booking->service_type ?? 'car') === 'car') bg-blue-100 text-blue-800
                                    @elseif (($booking->service_type ?? '') === 'motorcycle') bg-orange-100 text-orange-800
                                    @else bg-neutral-100 text-neutral-700
                                    @endif">
                                    Booked
                                </span>
                            @else
                                <span class="text-xs text-[#BBB]">—</span>
                            @endif
                        </div>
                    @endforeach

                @empty

                    <div class="col-span-15 px-6 py-16 text-center text-sm text-[#777]">
                        Belum ada kendaraan yang sedang dibooking.
                    </div>

                @endforelse

            </div>

        </div>
    </div>

</section>

@endsection
@extends('admin.layout')

@section('admin-title', 'Owner Dashboard')

@section('admin-content')

<section class="min-h-screen bg-[#F4F4F1] text-[#171717]">

    <div class="grid gap-6 xl:grid-cols-[1.15fr_0.85fr]">

        <div class="space-y-6">

            <div class="grid gap-4 sm:grid-cols-3">

                <div class="rounded-[28px] bg-white p-6 shadow-[0_18px_55px_rgba(0,0,0,0.05)]">
                    <p class="text-sm text-[#777]">Today Revenue</p>
                    <h3 class="mt-5 text-[24px] font-semibold tracking-[-0.04em] text-[#0D3B44]">
                        Rp {{ number_format($todayRevenue, 0, ',', '.') }}
                    </h3>
                    <p class="mt-2 text-xs text-[#777]">Revenue today</p>
                </div>

                <div class="rounded-[28px] bg-white p-6 shadow-[0_18px_55px_rgba(0,0,0,0.05)]">
                    <p class="text-sm text-[#777]">This Month</p>
                    <h3 class="mt-5 text-[24px] font-semibold tracking-[-0.04em] text-[#0D3B44]">
                        Rp {{ number_format($monthRevenue, 0, ',', '.') }}
                    </h3>
                    <p class="mt-2 text-xs text-[#777]">Monthly revenue</p>
                </div>

                <div class="rounded-[28px] bg-[#0D3B44] p-6 text-white shadow-[0_18px_55px_rgba(13,59,68,0.16)]">
                    <p class="text-sm text-white/60">This Year</p>
                    <h3 class="mt-5 text-[24px] font-semibold tracking-[-0.04em]">
                        Rp {{ number_format($yearRevenue, 0, ',', '.') }}
                    </h3>
                    <p class="mt-2 text-xs text-white/50">Yearly revenue</p>
                </div>

            </div>

            <div class="rounded-[34px] bg-white p-6 shadow-[0_18px_55px_rgba(0,0,0,0.05)] sm:p-7">
                <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm text-[#777]">Analytics</p>
                        <h2 class="mt-1 text-[28px] font-semibold tracking-[-0.04em]">
                            Booking Trend
                        </h2>
                    </div>

                    <a href="{{ route('admin.carbooking.index') }}"
                       class="w-fit rounded-full bg-[#F4F4F1] px-5 py-2.5 text-xs font-semibold">
                        View Bookings
                    </a>
                </div>

                <div class="h-[320px]">
                    <canvas id="bookingTrendChart"></canvas>
                </div>
            </div>

            <div class="grid gap-4 md:grid-cols-3">

                <div class="rounded-[30px] bg-white p-6 shadow-[0_18px_55px_rgba(0,0,0,0.05)]">
                    <div class="mb-5 flex items-center justify-between">
                        <div>
                            <p class="text-sm text-[#777]">Top Vehicle</p>
                            <h3 class="mt-1 text-xl font-semibold">Cars</h3>
                        </div>
                        <span class="rounded-2xl bg-[#F4F4F1] px-3 py-2 text-sm">↗</span>
                    </div>

                    <div class="space-y-3">
                        @forelse ($topVehicles as $item)
                            <div class="flex items-center justify-between gap-3 rounded-2xl bg-[#F8F8F5] px-4 py-3">
                                <p class="truncate text-sm font-semibold">{{ $item->car_name }}</p>
                                <span class="rounded-full bg-white px-3 py-1 text-xs font-bold">
                                    {{ $item->total }}
                                </span>
                            </div>
                        @empty
                            <p class="text-sm text-[#777]">No car booking data.</p>
                        @endforelse
                    </div>
                </div>

                <div class="rounded-[30px] bg-white p-6 shadow-[0_18px_55px_rgba(0,0,0,0.05)]">
                    <div class="mb-5 flex items-center justify-between">
                        <div>
                            <p class="text-sm text-[#777]">Top Motorcycle</p>
                            <h3 class="mt-1 text-xl font-semibold">Motorcycles</h3>
                        </div>
                        <span class="rounded-2xl bg-[#F4F4F1] px-3 py-2 text-sm">◆</span>
                    </div>

                    <div class="space-y-3">
                        @forelse ($topMotorcycles as $item)
                            <div class="flex items-center justify-between gap-3 rounded-2xl bg-[#F8F8F5] px-4 py-3">
                                <p class="truncate text-sm font-semibold">{{ $item->car_name }}</p>
                                <span class="rounded-full bg-white px-3 py-1 text-xs font-bold">
                                    {{ $item->total }}
                                </span>
                            </div>
                        @empty
                            <p class="text-sm text-[#777]">No motorcycle booking data.</p>
                        @endforelse
                    </div>
                </div>

                <div class="rounded-[30px] bg-white p-6 shadow-[0_18px_55px_rgba(0,0,0,0.05)]">
                    <div class="mb-5 flex items-center justify-between">
                        <div>
                            <p class="text-sm text-[#777]">Top Tour</p>
                            <h3 class="mt-1 text-xl font-semibold">Helicopter</h3>
                        </div>
                        <span class="rounded-2xl bg-[#F4F4F1] px-3 py-2 text-sm">✦</span>
                    </div>

                    <div class="space-y-3">
                        @forelse ($topTours as $item)
                            <div class="flex items-center justify-between gap-3 rounded-2xl bg-[#F8F8F5] px-4 py-3">
                                <p class="truncate text-sm font-semibold">{{ $item->car_name }}</p>
                                <span class="rounded-full bg-white px-3 py-1 text-xs font-bold">
                                    {{ $item->total }}
                                </span>
                            </div>
                        @empty
                            <p class="text-sm text-[#777]">No helicopter booking data.</p>
                        @endforelse
                    </div>
                </div>

            </div>

            <div class="rounded-[34px] bg-white p-6 shadow-[0_18px_55px_rgba(0,0,0,0.05)] sm:p-7">
                <div class="mb-6 flex items-center justify-between">
                    <div>
                        <p class="text-sm text-[#777]">Latest</p>
                        <h2 class="mt-1 text-[28px] font-semibold tracking-[-0.04em]">
                            Recent Bookings
                        </h2>
                    </div>

                    <a href="{{ route('admin.carbooking.index') }}"
                       class="rounded-full bg-[#F4F4F1] px-5 py-2.5 text-xs font-semibold">
                        View All
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full min-w-[760px] text-left text-sm">
                        <thead>
                            <tr class="text-[#777]">
                                <th class="px-4 py-3 font-medium">Customer</th>
                                <th class="px-4 py-3 font-medium">Service</th>
                                <th class="px-4 py-3 font-medium">Item</th>
                                <th class="px-4 py-3 font-medium">Status</th>
                                <th class="px-4 py-3 text-right font-medium">Total</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-black/5">
                            @forelse ($latestBookings as $booking)
                                <tr class="hover:bg-[#FAFAF7]">
                                    <td class="px-4 py-4">
                                        <p class="font-semibold">{{ $booking->customer_name }}</p>
                                        <p class="mt-1 text-xs text-[#777]">{{ $booking->customer_email ?? '-' }}</p>
                                    </td>

                                    <td class="px-4 py-4 capitalize">
                                        {{ $booking->service_type ?? 'car' }}
                                    </td>

                                    <td class="px-4 py-4">
                                        {{ $booking->car_name }}
                                    </td>

                                    <td class="px-4 py-4">
                                        <span class="rounded-full px-3 py-1 text-xs font-semibold capitalize
                                            @if ($booking->status === 'confirmed') bg-green-100 text-green-700
                                            @elseif ($booking->status === 'completed') bg-blue-100 text-blue-700
                                            @elseif ($booking->status === 'cancelled') bg-red-100 text-red-700
                                            @else bg-yellow-100 text-yellow-700
                                            @endif">
                                            {{ $booking->status }}
                                        </span>
                                    </td>

                                    <td class="px-4 py-4 text-right font-semibold">
                                        Rp {{ number_format($booking->total_amount ?? 0, 0, ',', '.') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-4 py-10 text-center text-[#777]">
                                        Belum ada booking terbaru.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <div class="space-y-6">

            <div class="rounded-[34px] bg-white p-6 shadow-[0_18px_55px_rgba(0,0,0,0.05)] sm:p-7">
                <p class="text-sm text-[#777]">Booking Summary</p>

                <div class="mt-6 grid gap-4 sm:grid-cols-2 xl:grid-cols-1">
                    <div class="rounded-[24px] bg-[#F8F8F5] p-5">
                        <p class="text-sm text-[#777]">Total Bookings</p>
                        <h3 class="mt-3 text-[36px] font-semibold tracking-[-0.05em]">
                            {{ $totalBookings }}
                        </h3>
                    </div>

                    <div class="rounded-[24px] bg-green-50 p-5">
                        <p class="text-sm text-green-700">Confirmed</p>
                        <h3 class="mt-3 text-[36px] font-semibold tracking-[-0.05em] text-green-900">
                            {{ $confirmedBookings }}
                        </h3>
                    </div>

                    <div class="rounded-[24px] bg-yellow-50 p-5">
                        <p class="text-sm text-yellow-700">Pending</p>
                        <h3 class="mt-3 text-[36px] font-semibold tracking-[-0.05em] text-yellow-900">
                            {{ $pendingBookings }}
                        </h3>
                    </div>

                    <div class="rounded-[24px] bg-red-50 p-5">
                        <p class="text-sm text-red-700">Cancelled</p>
                        <h3 class="mt-3 text-[36px] font-semibold tracking-[-0.05em] text-red-900">
                            {{ $cancelledBookings }}
                        </h3>
                    </div>
                </div>
            </div>

            <div class="rounded-[34px] bg-[#0D3B44] p-6 text-white shadow-[0_18px_55px_rgba(13,59,68,0.16)] sm:p-7">
                <p class="text-sm text-white/60">Fleet Inventory</p>

                <div class="mt-6 space-y-4">
                    <a href="{{ route('admin.cars.index') }}" class="flex items-center justify-between rounded-2xl bg-white/10 px-5 py-4">
                        <span>Cars</span>
                        <strong>{{ $totalCars }}</strong>
                    </a>

                    <a href="{{ route('admin.motorcycles.index') }}" class="flex items-center justify-between rounded-2xl bg-white/10 px-5 py-4">
                        <span>Motorcycles</span>
                        <strong>{{ $totalMotorcycles }}</strong>
                    </a>

                    <a href="{{ route('admin.helicopter-tours.index') }}" class="flex items-center justify-between rounded-2xl bg-white/10 px-5 py-4">
                        <span>Helicopter Tours</span>
                        <strong>{{ $totalHelicopterTours }}</strong>
                    </a>
                </div>
            </div>

            <div class="rounded-[34px] bg-white p-6 shadow-[0_18px_55px_rgba(0,0,0,0.05)] sm:p-7">
                <p class="text-sm text-[#777]">Quick Actions</p>

                <div class="mt-5 space-y-3">
                    <a href="{{ route('admin.cars.create') }}"
                       class="flex items-center justify-between rounded-2xl bg-[#F4F4F1] px-5 py-4 text-sm font-semibold">
                        <span>Add Car</span>
                        <span>+</span>
                    </a>

                    <a href="{{ route('admin.motorcycles.create') }}"
                       class="flex items-center justify-between rounded-2xl bg-[#F4F4F1] px-5 py-4 text-sm font-semibold">
                        <span>Add Motorcycle</span>
                        <span>+</span>
                    </a>

                    <a href="{{ route('admin.helicopter-tours.create') }}"
                       class="flex items-center justify-between rounded-2xl bg-[#F4F4F1] px-5 py-4 text-sm font-semibold">
                        <span>Add Heli Tour</span>
                        <span>+</span>
                    </a>

                    <a href="{{ route('admin.revenue.index') }}"
                       class="flex items-center justify-between rounded-2xl bg-[#0D3B44] px-5 py-4 text-sm font-semibold text-white">
                        <span>Revenue Report</span>
                        <span>→</span>
                    </a>
                </div>
            </div>

        </div>

    </div>

</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const bookingTrendCtx = document.getElementById('bookingTrendChart');

if (bookingTrendCtx) {
    new Chart(bookingTrendCtx, {
        type: 'line',
        data: {
            labels: @json($bookingTrendLabels),
            datasets: [{
                label: 'Bookings',
                data: @json($bookingTrendData),
                tension: 0.42,
                fill: true,
                borderWidth: 3,
                pointRadius: 4,
                pointHoverRadius: 6,
                borderColor: '#0D3B44',
                backgroundColor: 'rgba(13, 59, 68, 0.10)',
                pointBackgroundColor: '#0D3B44',
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
                intersect: false,
                mode: 'index',
            },
            plugins: {
                legend: {
                    display: false,
                },
                tooltip: {
                    backgroundColor: '#171717',
                    titleColor: '#ffffff',
                    bodyColor: '#ffffff',
                    padding: 14,
                    cornerRadius: 14,
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false,
                    },
                    ticks: {
                        color: '#777',
                    }
                },
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0,0,0,0.06)',
                    },
                    ticks: {
                        color: '#777',
                        precision: 0,
                    }
                }
            }
        }
    });
}
</script>

@endsection
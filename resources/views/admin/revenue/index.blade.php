@extends('admin.layout')

@section('admin-title', 'Revenue Report')

@section('admin-content')

<section class="min-h-screen bg-[#F4F4F1] text-[#171717]">

    <div class="mb-8">
        <p class="text-sm text-[#777]">Financial Overview</p>
        <h1 class="mt-2 text-[42px] font-semibold tracking-[-0.05em] sm:text-[56px]">
            Revenue Report
        </h1>
    </div>

    <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">

        <div class="rounded-[30px] bg-[#171717] p-6 text-white shadow-[0_18px_55px_rgba(0,0,0,0.08)]">
            <p class="text-sm text-white/55">Total Revenue</p>
            <h3 class="mt-5 text-[30px] font-semibold tracking-[-0.05em]">
                Rp {{ number_format($totalRevenue, 0, ',', '.') }}
            </h3>
            <p class="mt-2 text-sm text-white/50">all paid bookings</p>
        </div>

        <div class="rounded-[30px] bg-white p-6 shadow-[0_18px_55px_rgba(0,0,0,0.05)]">
            <p class="text-sm text-[#777]">This Month</p>
            <h3 class="mt-5 text-[30px] font-semibold tracking-[-0.05em]">
                Rp {{ number_format($monthRevenue, 0, ',', '.') }}
            </h3>
            <p class="mt-2 text-sm text-[#777]">paid bookings this month</p>
        </div>

        <div class="rounded-[30px] bg-white p-6 shadow-[0_18px_55px_rgba(0,0,0,0.05)]">
            <p class="text-sm text-[#777]">Paid Bookings</p>
            <h3 class="mt-5 text-[40px] font-semibold tracking-[-0.06em]">
                {{ $paidBookings }}
            </h3>
            <p class="mt-2 text-sm text-[#777]">completed payments</p>
        </div>

        <div class="rounded-[30px] bg-white p-6 shadow-[0_18px_55px_rgba(0,0,0,0.05)]">
            <p class="text-sm text-[#777]">Unpaid Bookings</p>
            <h3 class="mt-5 text-[40px] font-semibold tracking-[-0.06em]">
                {{ $unpaidBookings }}
            </h3>
            <p class="mt-2 text-sm text-[#777]">waiting for payment</p>
        </div>

    </div>

    <div class="mt-6 overflow-hidden rounded-[34px] bg-white shadow-[0_18px_55px_rgba(0,0,0,0.05)]">

        <div class="flex flex-col gap-3 border-b border-black/5 p-6 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-[#777]">Transactions</p>
                <h2 class="mt-1 text-[28px] font-semibold tracking-[-0.04em]">
                    Latest Paid Bookings
                </h2>
            </div>

            <a href="{{ route('admin.carbooking.index') }}"
               class="inline-flex rounded-full bg-[#171717] px-5 py-3 text-sm font-semibold text-white">
                View All Bookings
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[950px] text-left">
                <thead class="bg-[#FAFAF8]">
                    <tr>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-[0.12em] text-[#777]">Booking</th>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-[0.12em] text-[#777]">Customer</th>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-[0.12em] text-[#777]">Vehicle</th>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-[0.12em] text-[#777]">Date</th>
                        <th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-[0.12em] text-[#777]">Amount</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-black/5">
                    @forelse ($latestPaidBookings as $booking)
                        <tr class="hover:bg-[#FAFAF8]">
                            <td class="px-6 py-5">
                                <p class="font-semibold text-[#171717]">
                                    {{ $booking->booking_code ?? 'No Code' }}
                                </p>
                                <p class="mt-1 text-xs capitalize text-green-700">
                                    {{ $booking->payment_status }}
                                </p>
                            </td>

                            <td class="px-6 py-5">
                                <p class="font-semibold text-[#171717]">
                                    {{ $booking->customer_name }}
                                </p>
                                <p class="mt-1 text-xs text-[#777]">
                                    {{ $booking->customer_email ?? '-' }}
                                </p>
                            </td>

                            <td class="px-6 py-5">
                                <p class="font-semibold text-[#171717]">
                                    {{ $booking->car_name }}
                                </p>
                                <p class="mt-1 text-xs capitalize text-[#777]">
                                    {{ $booking->service_type ?? 'car' }}
                                </p>
                            </td>

                            <td class="px-6 py-5 text-sm text-[#777]">
                                {{ $booking->pickup_date }} - {{ $booking->return_date }}
                            </td>

                            <td class="px-6 py-5 text-right font-semibold text-[#171717]">
                                Rp {{ number_format($booking->total_amount ?? 0, 0, ',', '.') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center">
                                <p class="font-semibold text-[#171717]">Belum ada transaksi paid</p>
                                <p class="mt-2 text-sm text-[#777]">
                                    Booking yang sudah paid akan muncul di sini.
                                </p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-6">
            {{ $latestPaidBookings->links() }}
        </div>

    </div>

</section>

@endsection
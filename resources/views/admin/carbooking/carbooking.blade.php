@extends('admin.layout')

@section('admin-title', 'All Bookings')

@section('admin-content')

<section class="min-h-screen bg-[#F5F1EB] px-5 py-12 sm:px-6 lg:px-10">

    <div class="mx-auto max-w-[1480px]">

        <div class="mb-10 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="mb-3 text-[10px] font-semibold uppercase tracking-[0.28em] text-[#0D3B44]">
                    Admin Panel
                </p>

                <h1 class="font-serif text-[42px] leading-[0.95] text-[#1A1A1A] sm:text-[56px]">
                    All Bookings
                </h1>

                <p class="mt-3 text-sm text-[#6B6B6B]">
                    Cars, Motorcycles and Helicopter Tour Orders
                </p>
            </div>

            <a href="{{ route('admin.dashboard') }}"
               class="inline-flex items-center justify-center rounded-full bg-[#1A1A1A] px-6 py-3 text-[11px] font-bold uppercase tracking-[0.08em] text-white">
                Back To Dashboard
            </a>
        </div>

        @if (session('success'))
            <div class="mb-6 rounded-2xl bg-green-100 px-5 py-4 text-sm text-green-800">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-hidden rounded-[30px] bg-white shadow-[0_18px_55px_rgba(0,0,0,0.06)]">
            <div class="overflow-x-auto">

                <table class="w-full min-w-[1250px] text-left text-sm">

                    <thead class="bg-[#1A1A1A] text-white">
                        <tr>
                            <th class="px-5 py-4">Customer</th>
                            <th class="px-5 py-4">Service</th>
                            <th class="px-5 py-4">Item</th>
                            <th class="px-5 py-4">Rental Date</th>
                            <th class="px-5 py-4">Booking Status</th>
                            <th class="px-5 py-4">Payment</th>
                            <th class="px-5 py-4">Action</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-black/10">

                        @forelse ($bookings as $booking)

                            <tr class="align-top">

                                <td class="px-5 py-5">
                                    <p class="font-semibold text-[#1A1A1A]">
                                        {{ $booking->customer_name }}
                                    </p>

                                    <p class="mt-1 text-xs text-[#6B6B6B]">
                                        {{ $booking->customer_email ?? '-' }}
                                    </p>

                                    <p class="mt-2 text-[11px] font-semibold text-[#0D3B44]">
                                        {{ $booking->booking_code ?? 'No Code' }}
                                    </p>
                                </td>

                                <td class="px-5 py-5">
                                    <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold capitalize
                                        @if (($booking->service_type ?? 'car') === 'car') bg-blue-100 text-blue-800
                                        @elseif (($booking->service_type ?? '') === 'motorcycle') bg-orange-100 text-orange-800
                                        @elseif (($booking->service_type ?? '') === 'helicopter') bg-purple-100 text-purple-800
                                        @else bg-neutral-100 text-neutral-700
                                        @endif">
                                        {{ $booking->service_type ?? 'car' }}
                                    </span>
                                </td>

                                <td class="px-5 py-5">
                                    <p class="font-semibold text-[#1A1A1A]">
                                        {{ $booking->car_name }}
                                    </p>

                                    <p class="mt-1 text-xs capitalize text-[#6B6B6B]">
                                        {{ $booking->car_category ?? '-' }}
                                    </p>

                                    <p class="mt-1 text-xs font-semibold text-[#0D3B44]">
                                        Rp {{ number_format($booking->total_amount ?? 0, 0, ',', '.') }}
                                    </p>
                                </td>

                                <td class="px-5 py-5">
                                    <p class="text-[#1A1A1A]">
                                        {{ $booking->pickup_date }}
                                    </p>

                                    <p class="mt-1 text-xs text-[#6B6B6B]">
                                        to {{ $booking->return_date }}
                                    </p>
                                </td>

                                <td class="px-5 py-5">
                                    <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold capitalize
                                        @if ($booking->status === 'confirmed') bg-green-100 text-green-800
                                        @elseif ($booking->status === 'completed') bg-blue-100 text-blue-800
                                        @elseif ($booking->status === 'cancelled') bg-red-100 text-red-800
                                        @else bg-yellow-100 text-yellow-800
                                        @endif">
                                        {{ $booking->status }}
                                    </span>

                                    <form method="POST"
                                          action="{{ route('admin.carbooking.status', $booking) }}"
                                          class="mt-3 flex gap-2">
                                        @csrf
                                        @method('PATCH')

                                        <select name="status"
                                                class="rounded-xl border border-black/10 bg-[#F8F3EC] px-3 py-2 text-xs outline-none">
                                            <option value="pending" {{ $booking->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="confirmed" {{ $booking->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                            <option value="completed" {{ $booking->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                            <option value="cancelled" {{ $booking->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        </select>

                                        <button type="submit"
                                                class="rounded-xl bg-[#1A1A1A] px-4 py-2 text-xs font-semibold text-white">
                                            Save
                                        </button>
                                    </form>
                                </td>

                                <td class="px-5 py-5">
                                    <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold capitalize
                                        @if (($booking->payment_status ?? 'unpaid') === 'paid') bg-green-100 text-green-800
                                        @elseif (($booking->payment_status ?? 'unpaid') === 'pending') bg-yellow-100 text-yellow-800
                                        @elseif (($booking->payment_status ?? 'unpaid') === 'failed') bg-red-100 text-red-800
                                        @else bg-neutral-100 text-neutral-700
                                        @endif">
                                        {{ $booking->payment_status ?? 'unpaid' }}
                                    </span>

                                    <form method="POST"
                                          action="{{ route('admin.carbooking.payment', $booking) }}"
                                          class="mt-3 flex gap-2">
                                        @csrf
                                        @method('PATCH')

                                        <select name="payment_status"
                                                class="rounded-xl border border-black/10 bg-[#F8F3EC] px-3 py-2 text-xs outline-none">
                                            <option value="unpaid" {{ ($booking->payment_status ?? 'unpaid') === 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                                            <option value="pending" {{ ($booking->payment_status ?? 'unpaid') === 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="paid" {{ ($booking->payment_status ?? 'unpaid') === 'paid' ? 'selected' : '' }}>Paid</option>
                                            <option value="failed" {{ ($booking->payment_status ?? 'unpaid') === 'failed' ? 'selected' : '' }}>Failed</option>
                                        </select>

                                        <button type="submit"
                                                class="rounded-xl bg-[#1A1A1A] px-4 py-2 text-xs font-semibold text-white">
                                            Save
                                        </button>
                                    </form>
                                </td>

                                <td class="px-5 py-5">
                                    <div class="flex flex-col gap-2">

                                        @php
                                        $drawerBooking = [
                                            'code' => $booking->booking_code ?? '-',
                                            'customer' => $booking->customer_name ?? '-',
                                            'email' => $booking->customer_email ?? '-',
                                            'phone' => $booking->customer_phone ?? '-',
                                            'service' => $booking->service_type ?? 'car',
                                            'vehicle' => $booking->car_name ?? '-',
                                            'category' => $booking->car_category ?? '-',
                                            'pickup_date' => $booking->pickup_date ?? '-',
                                            'return_date' => $booking->return_date ?? '-',
                                            'pickup_location' => $booking->pickup_location ?? '-',
                                            'status' => $booking->status ?? '-',
                                            'payment' => $booking->payment_status ?? 'unpaid',
                                            'note' => $booking->note ?? '-',
                                            'total' => 'Rp ' . number_format($booking->total_amount ?? 0, 0, ',', '.'),
                                            'whatsapp' => preg_replace('/[^0-9]/', '', $booking->customer_phone ?? ''),
                                            'invoice_url' => (($booking->payment_status ?? 'unpaid') === 'paid') ? route('invoice.download', $booking) : '',
                                        ];
                                    @endphp

                                    <button
                                        type="button"
                                        class="view-booking-btn inline-flex items-center justify-center rounded-xl border border-black/10 px-4 py-2 text-xs font-semibold text-[#1A1A1A] transition hover:bg-[#F5F1EB]"
                                        data-booking='@json($drawerBooking)'>
                                        View Detail
                                    </button>

                                        @if (($booking->payment_status ?? 'unpaid') === 'paid')
                                            <a href="{{ route('invoice.download', $booking) }}"
                                               class="inline-flex items-center justify-center rounded-xl bg-[#1A1A1A] px-4 py-2 text-xs font-semibold text-white">
                                                Invoice
                                            </a>
                                        @else
                                            <a href="{{ route('cars.payment', $booking) }}"
                                               class="inline-flex items-center justify-center rounded-xl bg-[#0D3B44] px-4 py-2 text-xs font-semibold text-white">
                                                Payment Link
                                            </a>
                                        @endif

                                    </div>
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="7" class="px-5 py-10 text-center text-[#6B6B6B]">
                                    Belum ada booking customer.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>
        </div>

        <div class="mt-6">
            {{ $bookings->links() }}
        </div>

    </div>

</section>

{{-- DRAWER OVERLAY --}}
<div id="drawerOverlay"
     onclick="closeBookingDrawer()"
     class="fixed inset-0 z-[998] hidden bg-black/40 backdrop-blur-sm">
</div>

{{-- BOOKING DETAIL DRAWER --}}
<div id="bookingDrawer"
     class="fixed right-0 top-0 z-[999] hidden h-screen w-full translate-x-full overflow-y-auto bg-white shadow-[0_30px_80px_rgba(0,0,0,0.18)] transition-transform duration-300 ease-out md:max-w-[560px] lg:max-w-[640px]">

    <div class="sticky top-0 z-10 border-b border-black/10 bg-white/95 p-6 backdrop-blur-md">

        <div class="flex items-center justify-between gap-4">

            <div>
                <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#0D3B44]">
                    Booking Detail
                </p>

                <h3 class="mt-1 text-2xl font-semibold tracking-[-0.04em] text-[#171717]">
                    Order Information
                </h3>
            </div>

            <button onclick="closeBookingDrawer()"
                    class="flex h-10 w-10 items-center justify-center rounded-full bg-[#F5F1EB] text-[#171717]">
                ✕
            </button>

        </div>

    </div>

    <div class="p-6">

        <div class="rounded-[28px] bg-[#0D3B44] p-5 text-white">
            <p class="text-xs text-white/55">Booking Code</p>
            <h4 id="drawer_code" class="mt-2 text-xl font-semibold">-</h4>

            <div class="mt-5 flex flex-wrap gap-2">
                <span id="drawer_status_badge" class="rounded-full bg-white/15 px-3 py-1 text-xs font-semibold capitalize">-</span>
                <span id="drawer_payment_badge" class="rounded-full bg-white/15 px-3 py-1 text-xs font-semibold capitalize">-</span>
            </div>
        </div>

        <div class="mt-6 grid gap-4 sm:grid-cols-2">

            <div class="rounded-[24px] bg-[#F8F8F5] p-5">
                <p class="text-xs font-semibold uppercase tracking-[0.16em] text-[#777]">Customer</p>
                <h4 id="drawer_customer" class="mt-2 font-semibold text-[#171717]">-</h4>
                <p id="drawer_email" class="mt-1 text-sm text-[#777]">-</p>
                <p id="drawer_phone" class="mt-1 text-sm font-semibold text-[#0D3B44]">-</p>
            </div>

            <div class="rounded-[24px] bg-[#F8F8F5] p-5">
                <p class="text-xs font-semibold uppercase tracking-[0.16em] text-[#777]">Service</p>
                <h4 id="drawer_vehicle" class="mt-2 font-semibold text-[#171717]">-</h4>
                <p id="drawer_service" class="mt-1 text-sm capitalize text-[#777]">-</p>
                <p id="drawer_category" class="mt-1 text-sm capitalize text-[#777]">-</p>
            </div>

            <div class="rounded-[24px] bg-[#F8F8F5] p-5">
                <p class="text-xs font-semibold uppercase tracking-[0.16em] text-[#777]">Schedule</p>
                <h4 id="drawer_date" class="mt-2 font-semibold text-[#171717]">-</h4>
            </div>

            <div class="rounded-[24px] bg-[#F8F8F5] p-5">
                <p class="text-xs font-semibold uppercase tracking-[0.16em] text-[#777]">Total Payment</p>
                <h4 id="drawer_total" class="mt-2 text-2xl font-semibold text-[#171717]">-</h4>
            </div>

        </div>

        <div class="mt-4 space-y-4">

            <div class="rounded-[24px] bg-[#F8F8F5] p-5">
                <p class="text-xs font-semibold uppercase tracking-[0.16em] text-[#777]">Pickup Location</p>
                <h4 id="drawer_pickup" class="mt-2 text-sm font-semibold leading-relaxed text-[#171717]">-</h4>
            </div>

            <div class="rounded-[24px] bg-[#F8F8F5] p-5">
                <p class="text-xs font-semibold uppercase tracking-[0.16em] text-[#777]">Customer Note</p>
                <p id="drawer_note" class="mt-2 text-sm leading-relaxed text-[#555]">-</p>
            </div>

        </div>

        <div class="mt-6 grid gap-3 sm:grid-cols-2">

            <a id="drawer_whatsapp"
               target="_blank"
               class="rounded-2xl bg-[#25D366] px-5 py-4 text-center text-sm font-semibold text-white">
                WhatsApp Customer
            </a>

            <a id="drawer_invoice"
               href="#"
               class="hidden rounded-2xl bg-[#171717] px-5 py-4 text-center text-sm font-semibold text-white">
                Download Invoice
            </a>

        </div>

    </div>

</div>

<script>
document.querySelectorAll('.view-booking-btn').forEach(function (button) {
    button.addEventListener('click', function () {
        const booking = JSON.parse(this.dataset.booking);

        document.getElementById('drawer_code').innerText = booking.code ?? '-';
        document.getElementById('drawer_customer').innerText = booking.customer ?? '-';
        document.getElementById('drawer_email').innerText = booking.email ?? '-';
        document.getElementById('drawer_phone').innerText = booking.phone ?? '-';
        document.getElementById('drawer_service').innerText = booking.service ?? '-';
        document.getElementById('drawer_vehicle').innerText = booking.vehicle ?? '-';
        document.getElementById('drawer_category').innerText = booking.category ?? '-';
        document.getElementById('drawer_date').innerText = (booking.pickup_date ?? '-') + ' → ' + (booking.return_date ?? '-');
        document.getElementById('drawer_pickup').innerText = booking.pickup_location ?? '-';
        document.getElementById('drawer_note').innerText = booking.note ?? '-';
        document.getElementById('drawer_total').innerText = booking.total ?? '-';

        document.getElementById('drawer_status_badge').innerText = booking.status ?? '-';
        document.getElementById('drawer_payment_badge').innerText = booking.payment ?? '-';

        document.getElementById('drawer_whatsapp').href = 'https://wa.me/' + (booking.whatsapp ?? '');

        const invoiceButton = document.getElementById('drawer_invoice');

        if (booking.invoice_url) {
            invoiceButton.href = booking.invoice_url;
            invoiceButton.classList.remove('hidden');
        } else {
            invoiceButton.classList.add('hidden');
        }

        openBookingDrawer();
    });
});

function openBookingDrawer() {
    const overlay = document.getElementById('drawerOverlay');
    const drawer = document.getElementById('bookingDrawer');

    overlay.classList.remove('hidden');
    drawer.classList.remove('hidden');

    setTimeout(function () {
        drawer.classList.remove('translate-x-full');
    }, 10);

    document.body.classList.add('overflow-hidden');
}

function closeBookingDrawer() {
    const overlay = document.getElementById('drawerOverlay');
    const drawer = document.getElementById('bookingDrawer');

    drawer.classList.add('translate-x-full');

    setTimeout(function () {
        drawer.classList.add('hidden');
        overlay.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }, 300);
}
</script>

@endsection
@extends('layouts.app')

@section('content')

<section class="min-h-screen bg-[#F5F1EB] px-5 py-24 sm:px-6 lg:px-10">

    <div class="mx-auto max-w-[1120px]">

        <div class="relative mb-10 overflow-hidden rounded-[42px] bg-[#10251B] p-7 text-white shadow-[0_24px_80px_rgba(0,0,0,0.16)] sm:p-10">
            <div class="absolute -right-20 -top-24 h-64 w-64 rounded-full bg-emerald-400/15 blur-3xl"></div>
            <div class="absolute -bottom-24 left-1/3 h-64 w-64 rounded-full bg-emerald-400/10 blur-3xl"></div>

            <div class="relative z-10 flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <p class="mb-4 text-[10px] font-semibold uppercase tracking-[0.28em] text-[#D6B37A]">
                        Customer Trip
                    </p>

                    <h1 class="font-serif text-[44px] leading-[0.9] tracking-[-0.04em] sm:text-[64px]">
                        My Bookings
                    </h1>

                    <p class="mt-5 max-w-[560px] text-sm leading-relaxed text-white/65">
                        Review your upcoming rides, payment progress, invoices, and booking details.
                    </p>
                </div>

                <a href="{{ route('home') }}"
                   class="inline-flex w-fit items-center justify-center rounded-full bg-white px-6 py-3 text-[11px] font-bold uppercase tracking-[0.08em] text-[#10251B] transition hover:bg-[#D6B37A]">
                    Back To Home
                </a>
            </div>
        </div>

        <div class="space-y-6">

            @forelse ($bookings as $booking)

                <article class="group relative overflow-hidden rounded-[40px] bg-white shadow-[0_22px_70px_rgba(0,0,0,0.07)] transition duration-300 hover:-translate-y-1 hover:shadow-[0_32px_90px_rgba(0,0,0,0.12)]">

                    <div class="absolute right-0 top-0 h-full w-[180px] bg-gradient-to-l from-[#F8F3EC] to-transparent"></div>

                    <div class="relative grid lg:grid-cols-[1fr_260px]">

                        <div class="p-6 sm:p-8">

                            <div class="flex flex-col gap-5 sm:flex-row sm:items-start sm:justify-between">

                                <div>
                                    <div class="mb-4 flex flex-wrap items-center gap-2">
                                        <span class="rounded-full bg-[#10251B] px-3 py-1 text-[10px] font-bold uppercase tracking-[0.14em] text-white">
                                            {{ $booking->booking_code ?? '-' }}
                                        </span>

                                        <span class="rounded-full px-3 py-1 text-[10px] font-bold uppercase tracking-[0.14em]
                                            @if (($booking->service_type ?? 'car') === 'car') bg-blue-100 text-blue-800
                                            @elseif (($booking->service_type ?? '') === 'motorcycle') bg-orange-100 text-orange-800
                                            @elseif (($booking->service_type ?? '') === 'helicopter') bg-purple-100 text-purple-800
                                            @else bg-neutral-100 text-neutral-700
                                            @endif">
                                            {{ $booking->service_type ?? 'car' }}
                                        </span>
                                    </div>

                                    <h2 class="font-serif text-[34px] leading-[0.95] tracking-[-0.04em] text-[#1A1A1A] sm:text-[44px]">
                                        {{ $booking->car_name }}
                                    </h2>

                                    <p class="mt-3 text-sm capitalize text-[#6B6B6B]">
                                        {{ $booking->car_category ?? '-' }}
                                    </p>
                                </div>

                                <div class="w-fit rounded-[26px] bg-[#F5F1EB] px-5 py-4">
                                    <p class="text-[10px] font-bold uppercase tracking-[0.16em] text-[#8C7B62]">
                                        Total
                                    </p>

                                    <p class="mt-1 text-2xl font-semibold text-[#1A1A1A]">
                                        Rp {{ number_format($booking->total_amount ?? 0, 0, ',', '.') }}
                                    </p>
                                </div>

                            </div>

                            <div class="mt-8 grid gap-4 md:grid-cols-[1fr_1fr_0.9fr]">

                                <div class="rounded-[28px] bg-[#FAF7F1] p-5">
                                    <p class="text-[10px] font-bold uppercase tracking-[0.16em] text-[#8C7B62]">
                                        Schedule
                                    </p>

                                    <div class="mt-4 flex items-start gap-3">
                                        <div class="mt-1 flex flex-col items-center">
                                            <span class="h-3 w-3 rounded-full bg-[#10251B]"></span>
                                            <span class="h-8 w-px bg-black/15"></span>
                                            <span class="h-3 w-3 rounded-full bg-[#D6B37A]"></span>
                                        </div>

                                        <div class="space-y-3">
                                            <div>
                                                <p class="text-xs text-[#8C7B62]">Start</p>
                                                <p class="text-sm font-semibold text-[#1A1A1A]">{{ $booking->pickup_date }}</p>
                                            </div>

                                            <div>
                                                <p class="text-xs text-[#8C7B62]">End</p>
                                                <p class="text-sm font-semibold text-[#1A1A1A]">{{ $booking->return_date }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="rounded-[28px] bg-[#FAF7F1] p-5">
                                    <p class="text-[10px] font-bold uppercase tracking-[0.16em] text-[#8C7B62]">
                                        Pickup Point
                                    </p>

                                    <p class="mt-4 text-sm font-semibold leading-relaxed text-[#1A1A1A]">
                                        {{ $booking->pickup_location }}
                                    </p>

                                    @if ($booking->note)
                                        <p class="mt-3 text-xs leading-relaxed text-[#6B6B6B]">
                                            {{ $booking->note }}
                                        </p>
                                    @endif
                                </div>

                                <div class="rounded-[28px] bg-[#FAF7F1] p-5">
                                    <p class="text-[10px] font-bold uppercase tracking-[0.16em] text-[#8C7B62]">
                                        Progress
                                    </p>

                                    <div class="mt-4 space-y-2">
                                        <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold capitalize
                                            @if ($booking->status === 'confirmed') bg-green-100 text-green-800
                                            @elseif ($booking->status === 'completed') bg-blue-100 text-blue-800
                                            @elseif ($booking->status === 'cancelled') bg-red-100 text-red-800
                                            @else bg-yellow-100 text-yellow-800
                                            @endif">
                                            {{ $booking->status }}
                                        </span>

                                        <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold capitalize
                                            @if (($booking->payment_status ?? 'unpaid') === 'paid') bg-green-100 text-green-800
                                            @elseif (($booking->payment_status ?? 'unpaid') === 'pending') bg-yellow-100 text-yellow-800
                                            @else bg-red-100 text-red-800
                                            @endif">
                                            {{ $booking->payment_status ?? 'unpaid' }}
                                        </span>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <aside class="relative flex flex-col justify-center gap-3 border-t border-black/10 bg-[#10251B] p-6 text-white lg:border-l lg:border-t-0">

                            <div class="mb-2">
                                <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#D6B37A]">
                                    Manage
                                </p>
                                <p class="mt-2 text-sm text-white/60">
                                    View booking details or continue payment.
                                </p>
                            </div>

                            <a href="{{ route('customer.bookings.show', $booking) }}"
                               class="inline-flex items-center justify-center rounded-full bg-white px-6 py-3 text-[11px] font-bold uppercase tracking-[0.08em] text-[#10251B] transition hover:bg-[#D6B37A]">
                                Booking Detail
                            </a>

                            @if (($booking->payment_status ?? 'unpaid') === 'paid')

                                <a href="{{ route('invoice.download', $booking) }}"
                                   class="inline-flex items-center justify-center rounded-full border border-white/15 px-6 py-3 text-[11px] font-bold uppercase tracking-[0.08em] text-white transition hover:bg-white hover:text-[#10251B]">
                                    Download Invoice
                                </a>

                            @else

                                <button
                                    type="button"
                                    onclick="payBooking('{{ $booking->snap_token }}')"
                                    class="inline-flex items-center justify-center rounded-full bg-[#D6B37A] px-6 py-3 text-[11px] font-bold uppercase tracking-[0.08em] text-[#10251B] transition hover:bg-white">
                                    Pay Now
                                </button>

                            @endif

                        </aside>

                    </div>

                </article>

            @empty

                <div class="rounded-[40px] bg-white px-6 py-16 text-center shadow-[0_22px_70px_rgba(0,0,0,0.07)]">
                    <h2 class="font-serif text-[42px] text-[#1A1A1A]">
                        No Bookings Yet
                    </h2>

                    <p class="mt-3 text-sm text-[#6B6B6B]">
                        Your booking history will appear here.
                    </p>
                </div>

            @endforelse

        </div>

        <div class="mt-8">
            {{ $bookings->links() }}
        </div>

    </div>

</section>

<script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

<script>
function payBooking(token)
{
    if (!token) {
        alert('Payment token not found.');
        return;
    }

    snap.pay(token, {
        onSuccess: function () {
            window.location.reload();
        },
        onPending: function () {
            window.location.reload();
        },
        onError: function () {
            alert('Payment failed.');
        }
    });
}
</script>

@endsection
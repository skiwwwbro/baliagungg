@extends('layouts.app')

@section('content')

<section class="flex min-h-screen items-center justify-center bg-[#F5F1EB] px-5 py-20">

    <div class="w-full max-w-[560px] rounded-[34px] bg-white p-8 shadow-[0_18px_55px_rgba(0,0,0,0.08)]">

        <p class="mb-4 text-[10px] font-semibold uppercase tracking-[0.28em] text-[#B07A45]">
            Payment
        </p>

        <h1 class="font-serif text-[42px] leading-[0.95] text-[#1A1A1A]">
            Complete Your Booking
        </h1>

        <div class="mt-8 rounded-2xl bg-[#F5F1EB] p-5">
            <p class="text-sm text-[#8C7B62]">Booking Code</p>
            <h2 class="mt-1 text-xl font-semibold text-[#1A1A1A]">
                {{ $booking->booking_code }}
            </h2>

            <p class="mt-4 text-sm text-[#8C7B62]">Vehicle</p>
            <p class="font-semibold text-[#1A1A1A]">
                {{ $booking->car_name }}
            </p>

            <p class="mt-4 text-sm text-[#8C7B62]">Total Payment</p>
            <p class="text-2xl font-semibold text-[#1A1A1A]">
                $ {{ number_format($booking->total_amount, 0, ',', '.') }}
            </p>
        </div>

        <button
            id="pay-button"
            class="mt-6 w-full rounded-full bg-[#1A1A1A] px-7 py-4 text-[11px] font-bold uppercase tracking-[0.08em] text-white transition hover:bg-[#B07A45]">
            Pay Now
        </button>

    </div>

</section>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

<script>
document.getElementById('pay-button').addEventListener('click', function () {
    snap.pay('{{ $booking->snap_token }}');
});
</script>

@endsection
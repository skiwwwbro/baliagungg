@extends('layouts.app')

@section('content')

<section class="flex min-h-screen items-center justify-center bg-[#F5F1EB] px-5">

    <form method="POST" action="{{ route('booking.check.submit') }}"
          class="w-full max-w-[460px] rounded-[34px] bg-white p-8 shadow-lg">
        @csrf

        <p class="mb-4 text-[10px] font-semibold uppercase tracking-[0.28em] text-[#B07A45]">
            Check Booking
        </p>

        <h1 class="mb-8 font-serif text-[42px] text-[#1A1A1A]">
            Booking Status
        </h1>

        <input
            name="booking_code"
            placeholder="Booking Code"
            required
            class="mb-4 w-full rounded-2xl border border-black/10 bg-[#F8F3EC] px-5 py-4 text-sm outline-none">

        <input
            name="customer_email"
            type="email"
            placeholder="Email"
            required
            class="mb-6 w-full rounded-2xl border border-black/10 bg-[#F8F3EC] px-5 py-4 text-sm outline-none">

        <button class="w-full rounded-full bg-[#1A1A1A] px-7 py-4 text-[11px] font-bold uppercase tracking-[0.08em] text-white">
            Check Booking
        </button>

    </form>

</section>

@endsection
@extends('layouts.app')

@section('content')

@include('sections.navbar')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@25.3.0/build/css/intlTelInput.css">

<style>
    .iti {
        width: 100%;
    }

    .iti input {
        width: 100%;
        border-radius: 1rem;
        border: 1px solid rgba(0, 0, 0, 0.1);
        background: #F8F3EC;
        padding: 1rem 1.25rem;
        font-size: 0.875rem;
        color: #1A1A1A;
        outline: none;
    }

    .iti input:focus {
        border-color: #B07A45;
    }
</style>

<section class="min-h-screen bg-[#F5F1EB] pb-20 pt-32">

```
<div class="mx-auto max-w-[900px] px-5 sm:px-6 lg:px-10">

    <div class="mb-10">
        <p class="mb-4 text-[10px] font-semibold uppercase tracking-[0.28em] text-[#B07A45]">
            Helicopter Booking
        </p>

        <h1 class="font-serif text-[42px] leading-[0.95] text-[#1A1A1A] sm:text-[56px]">
            Reserve Your Flight
        </h1>
    </div>

    @if ($errors->any())
        <div class="mb-6 rounded-2xl bg-red-100 px-5 py-4 text-sm text-red-800">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="helicopterBookingForm"
          method="POST"
          action="{{ route('helicopter.booking.store') }}"
          class="rounded-[34px] bg-white p-6 shadow-lg sm:p-8">

        @csrf

        <input type="hidden" name="tour_id" value="{{ $tour->id }}">
        <input type="hidden" name="customer_phone" id="customer_phone_hidden">

        <div class="mb-8 rounded-2xl bg-[#F5F1EB] p-5">

            <p class="text-sm text-[#8C7B62]">
                Selected Tour
            </p>

            <h2 class="mt-1 text-2xl font-semibold text-[#1A1A1A]">
                {{ $tour->package_name }}
            </h2>

            <p class="mt-2 text-sm text-[#6B6B6B]">
                {{ $tour->duration }}
                •
                {{ $tour->passenger }}
                •
                {{ $tour->route }}
            </p>

            <p class="mt-2 text-sm text-[#6B6B6B]">
                From ${{ number_format($tour->price) }}
            </p>

        </div>

        <div class="grid gap-4 sm:grid-cols-2">

            <div>
                <label class="mb-2 block text-[10px] font-bold uppercase tracking-[0.18em] text-[#8C7B62]">
                    Full Name
                </label>

                <input
                    name="customer_name"
                    required
                    value="{{ old('customer_name', auth()->user()->name ?? '') }}"
                    placeholder="Your full name"
                    class="w-full rounded-2xl border border-black/10 bg-[#F8F3EC] px-5 py-4 text-sm text-[#1A1A1A] outline-none placeholder:text-[#8C7B62] focus:border-[#B07A45]">
            </div>

            <div>
                <label class="mb-2 block text-[10px] font-bold uppercase tracking-[0.18em] text-[#8C7B62]">
                    WhatsApp Number
                </label>

                <input
                    id="phone"
                    type="tel"
                    required
                    placeholder="812 xxxx xxxx">
            </div>

        </div>

        <div class="mt-4">
            <label class="mb-2 block text-[10px] font-bold uppercase tracking-[0.18em] text-[#8C7B62]">
                Email Address
            </label>

            <input
                name="customer_email"
                type="email"
                value="{{ old('customer_email', auth()->user()->email ?? '') }}"
                placeholder="your@email.com"
                class="w-full rounded-2xl border border-black/10 bg-[#F8F3EC] px-5 py-4 text-sm text-[#1A1A1A] outline-none placeholder:text-[#8C7B62] focus:border-[#B07A45]">
        </div>

        <div class="mt-4 grid gap-4 sm:grid-cols-2">

            <div>
                <label class="mb-2 block text-[10px] font-bold uppercase tracking-[0.18em] text-[#8C7B62]">
                    Flight Date
                </label>

                <input
                    name="pickup_date"
                    type="date"
                    required
                    value="{{ old('pickup_date') }}"
                    class="w-full rounded-2xl border border-black/10 bg-[#F8F3EC] px-5 py-4 text-sm text-[#1A1A1A] outline-none focus:border-[#B07A45]">
            </div>

            <div>
                <label class="mb-2 block text-[10px] font-bold uppercase tracking-[0.18em] text-[#8C7B62]">
                    Return Date
                </label>

                <input
                    name="return_date"
                    type="date"
                    required
                    value="{{ old('return_date') }}"
                    class="w-full rounded-2xl border border-black/10 bg-[#F8F3EC] px-5 py-4 text-sm text-[#1A1A1A] outline-none focus:border-[#B07A45]">
            </div>

        </div>

        <div class="mt-4">
            <label class="mb-2 block text-[10px] font-bold uppercase tracking-[0.18em] text-[#8C7B62]">
                Pickup Location
            </label>

            <input
                name="pickup_location"
                required
                value="{{ old('pickup_location') }}"
                placeholder="Hotel, villa, airport, or address"
                class="w-full rounded-2xl border border-black/10 bg-[#F8F3EC] px-5 py-4 text-sm text-[#1A1A1A] outline-none placeholder:text-[#8C7B62] focus:border-[#B07A45]">
        </div>

        <div class="mt-4">
            <label class="mb-2 block text-[10px] font-bold uppercase tracking-[0.18em] text-[#8C7B62]">
                Additional Note
            </label>

            <textarea
                name="note"
                rows="5"
                placeholder="Preferred flight time, special request, or note..."
                class="w-full rounded-2xl border border-black/10 bg-[#F8F3EC] px-5 py-4 text-sm text-[#1A1A1A] outline-none placeholder:text-[#8C7B62] focus:border-[#B07A45]">{{ old('note') }}</textarea>
        </div>

        <button
            type="submit"
            class="mt-6 inline-flex w-full items-center justify-center rounded-full bg-[#1A1A1A] px-7 py-4 text-[11px] font-bold uppercase tracking-[0.08em] text-white transition duration-300 hover:bg-[#B07A45] sm:w-auto">
            Continue To Payment
            <span class="ml-3">→</span>
        </button>

    </form>

</div>
```

</section>

<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@25.3.0/build/js/intlTelInput.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@25.3.0/build/js/utils.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const phoneInput = document.querySelector('#phone');
    const hiddenPhone = document.querySelector('#customer_phone_hidden');
    const form = document.querySelector('#helicopterBookingForm');

    const iti = window.intlTelInput(phoneInput, {
        initialCountry: 'id',
        separateDialCode: true,
        preferredCountries: ['id', 'au', 'sg', 'my', 'us', 'gb'],
        nationalMode: false,
        utilsScript: 'https://cdn.jsdelivr.net/npm/intl-tel-input@25.3.0/build/js/utils.js'
    });

    form.addEventListener('submit', function () {

        const number = iti.getNumber();

        if (number) {
            hiddenPhone.value = number;
        } else {
            hiddenPhone.value = phoneInput.value;
        }

    });

});
</script>

@endsection

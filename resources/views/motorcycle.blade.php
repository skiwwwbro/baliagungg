@extends('layouts.app')

@section('title','Motorcycle Rental Bali | Bali Agung Trans')

@section('description',
'Affordable motorcycle rental in Bali. Automatic and manual scooters available.')

@section('content')

<div class="mx-auto w-full max-w-[1680px] overflow-hidden bg-[#F5F1EB]">

@include('sections.navbar')

<section class="relative min-h-[100svh] overflow-hidden bg-[#071008] text-white">

    <img
        src="{{ asset('images/motorhero.jpg') }}"
        class="absolute inset-0 h-full w-full object-cover object-center"
        alt="Motorcycle Rental Bali"
    >

    <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/60 to-black/25"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-transparent to-black/25"></div>

    <div class="relative z-10 mx-auto flex min-h-[100svh] max-w-[1480px] items-center px-5 pb-28 pt-32 sm:px-6 sm:pb-32 lg:px-10">

        <div class="max-w-[860px]">

            <p class="mb-5 text-[10px] font-semibold uppercase tracking-[0.24em] text-[#D6B37A] sm:text-[12px] sm:tracking-[0.28em]">
                Premium Motorcycle Rental Bali
            </p>

            <h1 class="font-serif text-[clamp(46px,7vw,104px)] leading-[0.9] tracking-[-0.05em]">
                Ride Bali
                <span class="block italic text-[#E1B979]">
                    With Style
                </span>
            </h1>

            <p class="mt-7 max-w-[560px] text-[15px] leading-relaxed text-white/70 sm:text-[17px]">
                Choose your perfect ride from premium scooters, sport bikes,
                and Harley-Davidson motorcycles for an unforgettable Bali journey.
            </p>

            <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                <a href="https://wa.me/6281242709627"
                   target="_blank"
                   class="inline-flex w-full items-center justify-center gap-3 rounded-[10px] border border-white/20 bg-white/5 px-8 py-4 text-[11px] font-semibold uppercase tracking-[0.08em] text-white backdrop-blur-md duration-300 hover:border-[#25D366] hover:bg-[#25D366] sm:w-auto">
                    Chat On WhatsApp
                </a>
            </div>

        </div>

    </div>

    <svg
        class="absolute -bottom-1 left-0 h-[70px] w-full sm:h-[90px] lg:h-[120px]"
        viewBox="0 0 1440 120"
        preserveAspectRatio="none"
        xmlns="http://www.w3.org/2000/svg">

        <path
            d="M0 70C180 105 300 105 460 78C650 45 820 35 1000 62C1180 90 1300 95 1440 65L1440 120L0 120Z"
            fill="#F5F1EB"/>
    </svg>

</section>



<section id="motor-options" class="bg-[#F5F1EB] py-16 sm:py-20 lg:py-28">

    <div class="mx-auto max-w-[1480px] px-5 sm:px-6 lg:px-10">

        <div class="mb-10 flex flex-col gap-7 sm:mb-12 lg:mb-14 lg:flex-row lg:items-end lg:justify-between">

            <div>
                <p class="mb-4 text-[10px] font-semibold uppercase tracking-[0.24em] text-[#B07A45] sm:tracking-[0.28em]">
                    Motorcycle Options
                </p>

                <h2 class="font-serif text-[38px] leading-[0.95] tracking-[-0.04em] text-[#1A1A1A] sm:text-[50px] lg:text-[64px]">
                    Choose Your
                    <br>
                    Riding Character
                </h2>
            </div>

            <p class="max-w-[520px] text-sm leading-relaxed text-[#6B6B6B]">
                Select the ride that matches your Bali journey — from smooth premium scooters,
                sport performance, to iconic Harley-Davidson cruisers.
            </p>

        </div>

        {{-- TYPE FILTER --}}
        <div class="mb-10 overflow-x-auto border-b border-black/10 pb-5 sm:mb-12">
            <div class="flex min-w-max items-center gap-3">

                <button
                    type="button"
                    data-filter="all"
                    class="motor-filter active-filter rounded-full bg-[#1A1A1A] px-5 py-3 text-[10px] font-semibold uppercase tracking-[0.14em] text-white transition duration-300 sm:px-6 sm:text-[11px] sm:tracking-[0.16em]">
                    All
                </button>

                <button
                    type="button"
                    data-filter="scooter"
                    class="motor-filter rounded-full border border-black/10 px-5 py-3 text-[10px] font-semibold uppercase tracking-[0.14em] text-[#1A1A1A] transition duration-300 hover:bg-[#1A1A1A] hover:text-white sm:px-6 sm:text-[11px] sm:tracking-[0.16em]">
                    Scooter
                </button>

                <button
                    type="button"
                    data-filter="sport"
                    class="motor-filter rounded-full border border-black/10 px-5 py-3 text-[10px] font-semibold uppercase tracking-[0.14em] text-[#1A1A1A] transition duration-300 hover:bg-[#1A1A1A] hover:text-white sm:px-6 sm:text-[11px] sm:tracking-[0.16em]">
                    Sport
                </button>

                <button
                    type="button"
                    data-filter="harley"
                    class="motor-filter rounded-full border border-black/10 px-5 py-3 text-[10px] font-semibold uppercase tracking-[0.14em] text-[#1A1A1A] transition duration-300 hover:bg-[#1A1A1A] hover:text-white sm:px-6 sm:text-[11px] sm:tracking-[0.16em]">
                    Harley
                </button>

            </div>
        </div>


        {{-- MOTOR CARDS --}}
        <div id="motorGrid" class="grid gap-5 sm:gap-6 md:grid-cols-2 xl:grid-cols-3">

            @foreach ($motors as $motor)

                <div
                    data-category="{{ $motor->category }}"
                    class="motor-card group overflow-hidden rounded-[28px] bg-white shadow-[0_18px_55px_rgba(0,0,0,0.07)] transition duration-500 hover:-translate-y-2 hover:shadow-[0_30px_90px_rgba(0,0,0,0.14)] sm:rounded-[34px]">

                    <div class="relative flex h-[230px] items-center justify-center bg-[#EEE6DA] p-6 sm:h-[260px] sm:p-8 lg:h-[280px]">

                        <img
                            src="{{ asset('storage/' . $motor->image) }}"
                            class="max-h-[185px] w-full object-contain transition duration-700 group-hover:scale-105 sm:max-h-[215px]"
                            alt="{{ $motor->name }}"
                        >

                        <div class="absolute left-4 top-4 rounded-full bg-white/85 px-3 py-1 text-[8px] font-bold uppercase tracking-[0.14em] text-[#8C5D22] backdrop-blur sm:left-5 sm:top-5 sm:text-[9px]">
                            {{ $motor->tag }}
                        </div>

                        <div class="absolute bottom-4 right-4 rounded-full bg-[#1A1A1A] px-3 py-2 text-[10px] font-semibold text-white sm:bottom-5 sm:right-5 sm:px-4 sm:text-[11px]">
                            From ${{ $motor->price_per_day }} / Day
                        </div>

                    </div>

                    <div class="p-5 sm:p-7">

                        <div class="mb-6">
                            <p class="mb-2 text-[10px] font-bold uppercase tracking-[0.2em] text-[#B07A45]">
                                {{ ucfirst($motor->category) }}
                            </p>

                            <h3 class="text-[21px] font-semibold leading-tight text-[#1A1A1A] sm:text-[24px]">
                                {{ $motor->name }}
                            </h3>

                            <p class="mt-4 text-sm leading-relaxed text-[#6B6B6B]">
                                {{ $motor->description }}
                            </p>
                        </div>

                        <div class="mb-7 border-y border-black/10 py-5">
                            <div class="grid grid-cols-3 gap-3 text-center sm:gap-4">

                                <div>
                                    <p class="mb-1 text-[9px] uppercase tracking-[0.14em] text-[#8C7B62] sm:text-[10px]">
                                        CC
                                    </p>
                                    <p class="text-[12px] font-semibold text-[#1A1A1A] sm:text-sm">
                                        {{ $motor->cc }}
                                    </p>
                                </div>

                                <div>
                                    <p class="mb-1 text-[9px] uppercase tracking-[0.14em] text-[#8C7B62] sm:text-[10px]">
                                        Fuel
                                    </p>
                                    <p class="text-[12px] font-semibold text-[#1A1A1A] sm:text-sm">
                                        {{ $motor->fuel }}
                                    </p>
                                </div>

                                <div>
                                    <p class="mb-1 text-[9px] uppercase tracking-[0.14em] text-[#8C7B62] sm:text-[10px]">
                                        Type
                                    </p>
                                    <p class="text-[12px] font-semibold text-[#1A1A1A] sm:text-sm">
                                        {{ $motor->transmission }}
                                    </p>
                                </div>

                            </div>
                        </div>

                        @guest
                        <button
                            type="button"
                            onclick="showLoginRequired()"
                            class="inline-flex w-full items-center justify-center gap-3 rounded-full bg-[#1A1A1A] px-6 py-3.5 text-[11px] font-bold uppercase tracking-[0.08em] text-white transition duration-300 hover:bg-[#B07A45] hover:scale-[1.02]">

                            <span>Book This Car</span>

                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 5l7 7-7 7"/>

                            </svg>

                        </button>
                        @endguest


                        @auth
<button
    type="button"
    onclick="openMotorcycleBookingModal(
        '{{ $motor->id }}',
        '{{ addslashes($motor->name) }}',
        '{{ addslashes($motor->category) }}',
        '{{ $motor->price_per_day }}'
    )"
    class="inline-flex w-full items-center justify-center gap-3 rounded-full bg-[#1A1A1A] px-6 py-3.5 text-[11px] font-bold uppercase tracking-[0.08em] text-white transition duration-300 hover:bg-[#B07A45] hover:scale-[1.02]">

    <span>Book This Motorcycle</span>

    <svg xmlns="http://www.w3.org/2000/svg"
        class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor">

        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M9 5l7 7-7 7"/>

    </svg>

</button>
@endauth


                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>

<section class="relative overflow-hidden bg-[#071008] py-16 text-white sm:py-20 lg:py-28">

    <img
        src="{{ asset('images/benefit.jpg') }}"
        class="absolute inset-0 h-full w-full object-cover grayscale-[20%]"
        alt="Motorcycle Benefit"
    >

    <div class="absolute inset-0 bg-[#071008]/55"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-[#071008]/65 via-[#071008]/45 to-[#071008]/65"></div>

    <div class="relative z-10 mx-auto max-w-[1480px] px-5 sm:px-6 lg:px-10">

        <div class="mx-auto mb-10 max-w-[780px] text-center sm:mb-14">

            <p class="mb-5 text-[10px] font-semibold uppercase tracking-[0.28em] text-[#C8A46A]">
                Premium Benefits
            </p>

            <h2 class="font-serif text-[38px] leading-[0.95] tracking-[-0.04em] sm:text-[52px] lg:text-[68px]">
                More Than Just
                <br>
                Motorcycle Rental
            </h2>

            <p class="mx-auto mt-6 max-w-[560px] text-sm leading-relaxed text-white/60 sm:text-[15px]">
                A smoother riding experience with personal service, reliable vehicles,
                and flexible support throughout your journey in Bali.
            </p>

        </div>

        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">

            @foreach ([
                [
                    'number' => '01',
                    'title' => 'Free Hotel Delivery',
                    'desc' => 'Your motorcycle can be delivered directly to your hotel, villa, airport, or selected location.'
                ],
                [
                    'number' => '02',
                    'title' => 'Curated Collection',
                    'desc' => 'Choose from premium scooters, sport bikes, and Harley-Davidson motorcycles.'
                ],
                [
                    'number' => '03',
                    'title' => 'Personal Assistance',
                    'desc' => 'Our team is ready to assist with booking details, delivery time, and rental support.'
                ],
                [
                    'number' => '04',
                    'title' => 'Ready To Ride',
                    'desc' => 'Every motorcycle is checked, cleaned, and prepared before being delivered to you.'
                ],
            ] as $benefit)

                <div class="group relative min-h-[240px] overflow-hidden border border-white/12 bg-white/[0.04] p-6 backdrop-blur-sm transition duration-500 hover:bg-white/[0.07] sm:min-h-[280px] sm:p-7 lg:min-h-[300px]">

                    <div class="mb-8 flex items-start justify-between sm:mb-10">

                        <span class="font-serif text-[52px] leading-none text-white/35 transition duration-500 group-hover:text-white/45 sm:text-[64px]">
                            {{ $benefit['number'] }}
                        </span>

                        <span class="mt-5 h-px w-10 bg-white/25 transition duration-500 group-hover:w-16 sm:w-12"></span>

                    </div>

                    <div>
                        <h3 class="mb-4 max-w-[220px] text-[19px] font-semibold leading-tight text-white sm:text-[21px]">
                            {{ $benefit['title'] }}
                        </h3>

                        <p class="max-w-[260px] text-sm leading-relaxed text-white/60">
                            {{ $benefit['desc'] }}
                        </p>
                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>

</div>

@include('sections.footer')

<script>
document.addEventListener('DOMContentLoaded', function () {
    const filterButtons = document.querySelectorAll('.motor-filter');
    const motorCards = document.querySelectorAll('.motor-card');

    window.showLoginRequired = function () {

    const toast = document.getElementById('loginRequiredToast');

    toast.classList.remove('translate-x-[120%]');
    toast.classList.add('translate-x-0');

    setTimeout(() => {

        toast.classList.remove('translate-x-0');
        toast.classList.add('translate-x-[120%]');

    }, 2200);

    setTimeout(() => {

        const authModal = document.getElementById('authModal');

        authModal.classList.remove('hidden');
        authModal.classList.add('flex');

    }, 2000);

}

    filterButtons.forEach(button => {
        button.addEventListener('click', function () {
            const filter = this.dataset.filter;

            filterButtons.forEach(btn => {
                btn.classList.remove('active-filter', 'bg-[#1A1A1A]', 'text-white');
                btn.classList.add('border', 'border-black/10', 'text-[#1A1A1A]');
            });

            this.classList.add('active-filter', 'bg-[#1A1A1A]', 'text-white');
            this.classList.remove('border', 'border-black/10', 'text-[#1A1A1A]');

            motorCards.forEach(card => {
                const category = card.dataset.category;

                if (filter === 'all' || category === filter) {
                    card.classList.remove('hidden');
                    setTimeout(() => {
                        card.classList.remove('opacity-0', 'translate-y-4');
                    }, 20);
                } else {
                    card.classList.add('opacity-0', 'translate-y-4');
                    setTimeout(() => {
                        card.classList.add('hidden');
                    }, 200);
                }
            });
        });
    });
});
</script>

@include('booking.motorcycle-modal')

<script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

@endsection
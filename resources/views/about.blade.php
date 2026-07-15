@extends('layouts.app')

@section('content')

@include('sections.navbar')

<section class="relative min-h-[100svh] overflow-hidden bg-[#071008] text-white">

    <img
        src="{{ asset('images/about-hero.jpg') }}"
        class="absolute inset-0 h-full w-full object-cover object-center"
        alt="About Bali Agung Trans"
    >

    <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/55 to-black/20"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/20"></div>

    <div class="relative z-10 mx-auto flex min-h-[100svh] max-w-[1480px] items-center px-5 pb-28 pt-32 sm:px-6 lg:px-10">

        <div class="max-w-[900px]">

            <p class="mb-5 text-[10px] font-semibold uppercase tracking-[0.28em] text-[#D6B37A] sm:text-[12px]">
                About Bali Agung Trans
            </p>

            <h1 class="font-serif text-[clamp(46px,7vw,110px)] leading-[0.88] tracking-[-0.05em]">
                Your Journey
                <span class="block italic text-[#E1B979]">
                    Our Priority
                </span>
            </h1>

            <p class="mt-7 max-w-[580px] text-[15px] leading-relaxed text-white/70 sm:text-[17px]">
                Bali Agung Trans is built to provide premium transport experiences
                across Bali through motorcycles, luxury cars, helicopter tours,
                and personalized travel services.
            </p>

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

<div class="mx-auto w-full max-w-[1680px] overflow-hidden bg-[#F5F1EB]">

<section class="bg-[#F5F1EB] py-16 sm:py-20 lg:py-28">

    <div class="mx-auto max-w-[1480px] px-5 sm:px-6 lg:px-10">

        <div class="grid gap-12 lg:grid-cols-[0.85fr_1.15fr] lg:items-center">

            <div>
                <p class="mb-4 text-[10px] font-semibold uppercase tracking-[0.28em] text-[#B07A45]">
                    Who We Are
                </p>

                <h2 class="font-serif text-[38px] leading-[0.95] tracking-[-0.04em] text-[#1A1A1A] sm:text-[52px] lg:text-[64px]">
                    Premium Transport
                    <br>
                    For Every Bali Story
                </h2>
            </div>

            <div class="space-y-5 text-sm leading-relaxed text-[#6B6B6B] sm:text-[15px]">
                <p>
                    We provide curated transport services for travelers who want more than just
                    getting from one place to another. Every ride is prepared with comfort,
                    reliability, and personal service in mind.
                </p>

                <p>
                    From daily scooter rentals to luxury cars, VIP transfers, wedding transport,
                    and helicopter experiences, Bali Agung Trans is designed to make your journey
                    across Bali smoother, safer, and more memorable.
                </p>
            </div>

        </div>

    </div>

</section>

<section class="bg-[#F5F1EB] pb-16 sm:pb-20 lg:pb-28">

    <div class="mx-auto max-w-[1480px] px-5 sm:px-6 lg:px-10">

        <div class="grid gap-5 md:grid-cols-3">

            @foreach ([
                [
                    'number' => '01',
                    'title' => 'Comfort',
                    'desc' => 'Every vehicle and service is prepared to make your Bali trip easier and more enjoyable.'
                ],
                [
                    'number' => '02',
                    'title' => 'Reliability',
                    'desc' => 'Clear booking, timely delivery, and responsive communication throughout your journey.'
                ],
                [
                    'number' => '03',
                    'title' => 'Experience',
                    'desc' => 'We focus on creating a premium travel feeling, not just providing transportation.'
                ],
            ] as $value)

                <div class="border-y border-black/10 py-8 md:border-y-0 md:border-l md:px-8">
                    <span class="font-serif text-[56px] leading-none text-black/10">
                        {{ $value['number'] }}
                    </span>

                    <h3 class="mt-8 text-[22px] font-semibold text-[#1A1A1A]">
                        {{ $value['title'] }}
                    </h3>

                    <p class="mt-4 max-w-[280px] text-sm leading-relaxed text-[#6B6B6B]">
                        {{ $value['desc'] }}
                    </p>
                </div>

            @endforeach

        </div>

    </div>

</section>

<section class="relative overflow-hidden bg-[#071008] py-16 text-white sm:py-20 lg:py-28">

    <img
        src="{{ asset('images/about-story.jpg') }}"
        class="absolute inset-0 h-full w-full object-cover grayscale-[10%]"
        alt="Bali Agung Story"
    >

    <div class="absolute inset-0 bg-[#071008]/65"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-[#071008]/80 via-[#071008]/50 to-[#071008]/80"></div>

    <div class="relative z-10 mx-auto max-w-[1480px] px-5 sm:px-6 lg:px-10">

        <div class="grid gap-12 lg:grid-cols-[0.75fr_1.25fr] lg:items-end">

            <div>
                <p class="mb-5 text-[10px] font-semibold uppercase tracking-[0.28em] text-[#C8A46A]">
                    Our Philosophy
                </p>

                <h2 class="font-serif text-[38px] leading-[0.95] tracking-[-0.04em] sm:text-[52px] lg:text-[68px]">
                    Travel Should Feel
                    <br>
                    Effortless
                </h2>
            </div>

            <div class="grid gap-6 sm:grid-cols-2">

                @foreach ([
                    [
                        'title' => 'Personal Arrangement',
                        'desc' => 'We help arrange your ride based on your schedule, destination, and travel style.'
                    ],
                    [
                        'title' => 'Selected Fleet',
                        'desc' => 'Our fleet is chosen to support different needs, from casual rides to luxury experiences.'
                    ],
                    [
                        'title' => 'Local Understanding',
                        'desc' => 'We understand Bali routes, travel timing, and what guests need during their trip.'
                    ],
                    [
                        'title' => 'Premium Simplicity',
                        'desc' => 'Simple booking, clear communication, and transport prepared with attention to detail.'
                    ],
                ] as $item)

                    <div class="border-t border-white/12 pt-6">
                        <h3 class="mb-3 text-[20px] font-semibold text-white">
                            {{ $item['title'] }}
                        </h3>

                        <p class="text-sm leading-relaxed text-white/58">
                            {{ $item['desc'] }}
                        </p>
                    </div>

                @endforeach

            </div>

        </div>

    </div>

</section>

<section class="bg-[#F5F1EB] py-16 sm:py-20 lg:py-28">

    <div class="mx-auto max-w-[1480px] px-5 sm:px-6 lg:px-10">

        <div class="mb-12 text-center">

            <p class="mb-4 text-[10px] font-semibold uppercase tracking-[0.28em] text-[#B07A45]">
                What We Provide
            </p>

            <h2 class="font-serif text-[38px] leading-[0.95] tracking-[-0.04em] text-[#1A1A1A] sm:text-[52px] lg:text-[64px]">
                Complete Bali
                <br>
                Transport Experience
            </h2>

        </div>

        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">

            @foreach ([
                [
                    'title' => 'Motorcycle Rental',
                    'desc' => 'Premium scooters, sport bikes, and Harley-Davidson motorcycles.'
                ],
                [
                    'title' => 'Luxury Car Rental',
                    'desc' => 'Exotic, premium, family, wedding, and event transportation.'
                ],
                [
                    'title' => 'Helicopter Tour',
                    'desc' => 'Scenic flights, private charter, romantic tour, and aerial photo experience.'
                ],
                [
                    'title' => 'Personal Service',
                    'desc' => 'WhatsApp booking, flexible arrangement, and direct support from our team.'
                ],
            ] as $service)

                <div class="rounded-[28px] bg-white p-7 shadow-[0_18px_55px_rgba(0,0,0,0.06)]">
                    <h3 class="mb-4 text-[21px] font-semibold text-[#1A1A1A]">
                        {{ $service['title'] }}
                    </h3>

                    <p class="text-sm leading-relaxed text-[#6B6B6B]">
                        {{ $service['desc'] }}
                    </p>
                </div>

            @endforeach

        </div>

    </div>

</section>

<section class="relative overflow-hidden bg-[#071008] py-16 text-white sm:py-20 lg:py-28">

    <div class="relative z-10 mx-auto max-w-[1480px] px-5 text-center sm:px-6 lg:px-10">

        <p class="mb-5 text-[10px] font-semibold uppercase tracking-[0.28em] text-[#C8A46A]">
            Ready To Travel With Us?
        </p>

        <h2 class="mx-auto max-w-[850px] font-serif text-[38px] leading-[1] tracking-[-0.04em] sm:text-[52px] lg:text-[68px]">
            Let us arrange your perfect Bali journey.
        </h2>

        <div class="mt-9 flex flex-col justify-center gap-3 sm:flex-row">

            <a href="{{ route('motorcycle') }}"
               class="inline-flex items-center justify-center gap-3 rounded-full bg-[#D6B37A] px-7 py-3.5 text-sm font-semibold text-black duration-300 hover:bg-[#c9a567]">
                View Motorcycle
                <span>→</span>
            </a>

            <a href="https://wa.me/6281242709627"
               target="_blank"
               class="inline-flex items-center justify-center gap-3 rounded-full border border-white/20 bg-white/10 px-7 py-3.5 text-sm font-semibold text-white backdrop-blur-md duration-300 hover:bg-[#25D366] hover:border-[#25D366]">
                Chat On WhatsApp
            </a>

        </div>

    </div>

</section>

</div>

@include('sections.footer')

@endsection
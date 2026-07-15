@extends('layouts.app')

@section('content')

@include('sections.navbar')

<section class="relative min-h-[80svh] overflow-hidden bg-[#071008] text-white">

    <img
        src="{{ asset('images/contact-hero.jpg') }}"
        class="absolute inset-0 h-full w-full object-cover object-center"
        alt="Contact Bali Agung Trans"
    >

    <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/55 to-black/20"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/20"></div>

    <div class="relative z-10 mx-auto flex min-h-[80svh] max-w-[1480px] items-center px-5 pb-28 pt-32 sm:px-6 lg:px-10">

        <div class="max-w-[900px]">

            <p class="mb-5 text-[10px] font-semibold uppercase tracking-[0.28em] text-[#D6B37A] sm:text-[12px]">
                Contact Bali Agung Trans
            </p>

            <h1 class="font-serif text-[clamp(46px,7vw,110px)] leading-[0.9] tracking-[-0.05em]">
                Let’s Plan
                <span class="block italic text-[#E1B979]">
                    Your Bali Journey
                </span>
            </h1>

            <p class="mt-7 max-w-[580px] text-[15px] leading-relaxed text-white/70 sm:text-[17px]">
                Our team is ready to assist with motorcycle rentals, luxury cars,
                helicopter tours, and personalized transport arrangements across Bali.
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

        <div class="mb-12 grid gap-7 lg:grid-cols-[0.8fr_1.2fr] lg:items-end">

            <div>
                <p class="mb-4 text-[10px] font-semibold uppercase tracking-[0.28em] text-[#B07A45]">
                    Get In Touch
                </p>

                <h2 class="font-serif text-[38px] leading-[0.95] tracking-[-0.04em] text-[#1A1A1A] sm:text-[52px] lg:text-[64px]">
                    Contact Us
                    <br>
                    Your Way
                </h2>
            </div>

            <p class="max-w-[560px] text-sm leading-relaxed text-[#6B6B6B] lg:justify-self-end">
                Whether you need a motorcycle, luxury car, helicopter tour,
                or custom transport service, our team will help arrange the best option.
            </p>

        </div>

        <div class="grid gap-5 md:grid-cols-3">

            <a href="https://wa.me/6281242709627"
               target="_blank"
               class="group rounded-[30px] bg-white p-7 shadow-[0_18px_55px_rgba(0,0,0,0.06)] transition duration-500 hover:-translate-y-1 hover:shadow-[0_25px_75px_rgba(0,0,0,0.10)]">

                <p class="mb-8 text-[10px] font-bold uppercase tracking-[0.22em] text-[#B07A45]">
                    WhatsApp
                </p>

                <h3 class="text-[24px] font-semibold leading-tight text-[#1A1A1A]">
                    +62 812 4270 9627
                </h3>

                <p class="mt-4 text-sm leading-relaxed text-[#6B6B6B]">
                    The fastest way to ask availability, prices, and booking details.
                </p>

                <div class="mt-8 inline-flex items-center gap-3 text-[11px] font-bold uppercase tracking-[0.12em] text-[#1A1A1A]">
                    Chat Now
                    <span class="transition duration-300 group-hover:translate-x-1">→</span>
                </div>

            </a>

            <a href="mailto:info@baliagungtrans.com"
               class="group rounded-[30px] bg-white p-7 shadow-[0_18px_55px_rgba(0,0,0,0.06)] transition duration-500 hover:-translate-y-1 hover:shadow-[0_25px_75px_rgba(0,0,0,0.10)]">

                <p class="mb-8 text-[10px] font-bold uppercase tracking-[0.22em] text-[#B07A45]">
                    Email
                </p>

                <h3 class="break-words text-[24px] font-semibold leading-tight text-[#1A1A1A]">
                    info@baliagungtrans.com
                </h3>

                <p class="mt-4 text-sm leading-relaxed text-[#6B6B6B]">
                    Ideal for partnerships, event transport, and custom inquiries.
                </p>

                <div class="mt-8 inline-flex items-center gap-3 text-[11px] font-bold uppercase tracking-[0.12em] text-[#1A1A1A]">
                    Send Email
                    <span class="transition duration-300 group-hover:translate-x-1">→</span>
                </div>

            </a>

            <a href="tel:+6281242709627"
               class="group rounded-[30px] bg-white p-7 shadow-[0_18px_55px_rgba(0,0,0,0.06)] transition duration-500 hover:-translate-y-1 hover:shadow-[0_25px_75px_rgba(0,0,0,0.10)]">

                <p class="mb-8 text-[10px] font-bold uppercase tracking-[0.22em] text-[#B07A45]">
                    Call Us
                </p>

                <h3 class="text-[24px] font-semibold leading-tight text-[#1A1A1A]">
                    +62 812 4270 9627
                </h3>

                <p class="mt-4 text-sm leading-relaxed text-[#6B6B6B]">
                    Available everyday for direct assistance and urgent bookings.
                </p>

                <div class="mt-8 inline-flex items-center gap-3 text-[11px] font-bold uppercase tracking-[0.12em] text-[#1A1A1A]">
                    Call Now
                    <span class="transition duration-300 group-hover:translate-x-1">→</span>
                </div>

            </a>

        </div>

    </div>

</section>

<section class="bg-[#F5F1EB] pb-16 sm:pb-20 lg:pb-28">

    <div class="mx-auto max-w-[1480px] px-5 sm:px-6 lg:px-10">

        <div class="grid gap-8 lg:grid-cols-[0.9fr_1.1fr]">

            {{-- Contact Form --}}
            <div class="rounded-[34px] bg-white p-6 shadow-[0_18px_55px_rgba(0,0,0,0.06)] sm:p-8 lg:p-10">

                <p class="mb-4 text-[10px] font-semibold uppercase tracking-[0.28em] text-[#B07A45]">
                    Send Inquiry
                </p>

                <h2 class="font-serif text-[36px] leading-[1] tracking-[-0.04em] text-[#1A1A1A] sm:text-[48px]">
                    Tell Us What
                    <br>
                    You Need
                </h2>

                <form class="mt-8 space-y-4">

                    <div class="grid gap-4 sm:grid-cols-2">

                        <input
                            type="text"
                            placeholder="Full Name"
                            class="w-full rounded-2xl border border-black/10 bg-[#F8F3EC] px-5 py-4 text-sm text-[#1A1A1A] outline-none transition duration-300 placeholder:text-[#8C7B62] focus:border-[#B07A45]"
                        >

                        <input
                            type="text"
                            placeholder="Phone / WhatsApp"
                            class="w-full rounded-2xl border border-black/10 bg-[#F8F3EC] px-5 py-4 text-sm text-[#1A1A1A] outline-none transition duration-300 placeholder:text-[#8C7B62] focus:border-[#B07A45]"
                        >

                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">

                        <select
                            class="w-full rounded-2xl border border-black/10 bg-[#F8F3EC] px-5 py-4 text-sm text-[#1A1A1A] outline-none transition duration-300 focus:border-[#B07A45]">

                            <option>Service Needed</option>
                            <option>Motorcycle Rental</option>
                            <option>Luxury Car Rental</option>
                            <option>Helicopter Tour</option>
                            <option>Airport Transfer</option>
                            <option>Wedding Transport</option>
                            <option>Event Transport</option>

                        </select>

                        <input
                            type="date"
                            class="w-full rounded-2xl border border-black/10 bg-[#F8F3EC] px-5 py-4 text-sm text-[#1A1A1A] outline-none transition duration-300 focus:border-[#B07A45]"
                        >

                    </div>

                    <textarea
                        rows="6"
                        placeholder="Tell us about your trip, pickup location, destination, or special request..."
                        class="w-full rounded-2xl border border-black/10 bg-[#F8F3EC] px-5 py-4 text-sm text-[#1A1A1A] outline-none transition duration-300 placeholder:text-[#8C7B62] focus:border-[#B07A45]"></textarea>

                    <button
                        type="button"
                        class="inline-flex w-full items-center justify-center gap-3 rounded-full bg-[#1A1A1A] px-7 py-4 text-[11px] font-bold uppercase tracking-[0.08em] text-white transition duration-300 hover:bg-[#B07A45] sm:w-auto">
                        Send Inquiry
                        <span>→</span>
                    </button>

                </form>

            </div>

            {{-- Map & Office Info --}}
            <div class="grid gap-5">

                <div class="overflow-hidden rounded-[34px] bg-white shadow-[0_18px_55px_rgba(0,0,0,0.06)]">

                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3943.366079531148!2d115.17413707413742!3d-8.751584089326636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd24357baaade1b%3A0x375d4bbd57eb0f0a!2sBali%20Agung%20Trans!5e0!3m2!1sen!2sus!4v1781356790076!5m2!1sen!2sus"
                        class="h-[360px] w-full sm:h-[430px] lg:h-[500px]"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>

                </div>

                <div class="grid gap-5 sm:grid-cols-2">

                    <div class="rounded-[28px] bg-white p-7 shadow-[0_18px_55px_rgba(0,0,0,0.06)]">
                        <p class="mb-3 text-[10px] font-bold uppercase tracking-[0.22em] text-[#B07A45]">
                            Location
                        </p>

                        <h3 class="text-[21px] font-semibold text-[#1A1A1A]">
                            Bali Agung Trans
                        </h3>

                        <p class="mt-3 text-sm leading-relaxed text-[#6B6B6B]">
                            Bali, Indonesia
                        </p>
                    </div>

                    <div class="rounded-[28px] bg-white p-7 shadow-[0_18px_55px_rgba(0,0,0,0.06)]">
                        <p class="mb-3 text-[10px] font-bold uppercase tracking-[0.22em] text-[#B07A45]">
                            Opening Hours
                        </p>

                        <h3 class="text-[21px] font-semibold text-[#1A1A1A]">
                            Everyday
                        </h3>

                        <p class="mt-3 text-sm leading-relaxed text-[#6B6B6B]">
                            07:00 AM - 11:00 PM
                        </p>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<section class="relative overflow-hidden bg-[#071008] py-16 text-white sm:py-20 lg:py-28">

    <div class="relative z-10 mx-auto max-w-[1480px] px-5 sm:px-6 lg:px-10">

        <div class="mx-auto mb-10 max-w-[780px] text-center sm:mb-14">

            <p class="mb-5 text-[10px] font-semibold uppercase tracking-[0.28em] text-[#C8A46A]">
                Quick Answers
            </p>

            <h2 class="font-serif text-[38px] leading-[0.95] tracking-[-0.04em] sm:text-[52px] lg:text-[64px]">
                Before You
                <br>
                Contact Us
            </h2>

        </div>

        <div class="mx-auto grid max-w-[1100px] gap-4 md:grid-cols-2">

            @foreach ([
                [
                    'title' => 'Can I book through WhatsApp?',
                    'desc' => 'Yes. WhatsApp is the fastest way to check availability, confirm price, and arrange pickup.'
                ],
                [
                    'title' => 'Do you provide delivery?',
                    'desc' => 'Yes. We can deliver motorcycles or arrange vehicle pickup to your hotel, villa, airport, or selected location.'
                ],
                [
                    'title' => 'Can I request a custom trip?',
                    'desc' => 'Yes. We can help arrange private tours, wedding transport, airport transfer, and event transportation.'
                ],
                [
                    'title' => 'Do you serve last-minute bookings?',
                    'desc' => 'Yes, depending on availability. We recommend contacting our team directly through WhatsApp.'
                ],
            ] as $faq)

                <div class="border border-white/12 bg-white/[0.04] p-6 backdrop-blur-sm">
                    <h3 class="mb-3 text-[18px] font-semibold text-white">
                        {{ $faq['title'] }}
                    </h3>

                    <p class="text-sm leading-relaxed text-white/60">
                        {{ $faq['desc'] }}
                    </p>
                </div>

            @endforeach

        </div>

    </div>

</section>

</div>

@include('sections.footer')

@endsection
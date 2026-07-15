<section class="relative overflow-hidden bg-[#071008] py-16 text-white sm:py-20 lg:py-24">

    {{-- BACKGROUND --}}
    <div class="absolute inset-0">
        <img
            src="{{ asset('images/tropical.jpg') }}"
            class="absolute inset-0 h-full w-full scale-105 object-cover"
            alt=""
        >

        <div class="absolute inset-0 bg-[#080706]/82"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/50 to-black/70"></div>
        <div class="absolute inset-0 bg-gradient-to-br from-[#D6B37A]/10 via-transparent to-transparent"></div>
    </div>

    {{-- SOFT LIGHT GLOW --}}
    <div class="absolute right-[-20%] top-[-20%] h-[420px] w-[420px] rounded-full bg-[#D6B37A]/10 blur-[110px] sm:right-[-10%] sm:h-[500px] sm:w-[500px]"></div>

    <div class="relative z-10 mx-auto w-full max-w-[1480px] px-5 sm:px-6 lg:px-12 2xl:px-20">

        <div class="grid gap-12 lg:grid-cols-[360px_1fr] lg:items-center">

            {{-- LEFT --}}
            <div>
                <p class="mb-5 text-[10px] font-semibold uppercase tracking-[0.26em] text-[#D6B37A]">
                    Curated Experiences
                </p>

                <h2 class="mb-7 font-serif text-[40px] leading-[0.95] tracking-[-0.04em] sm:text-[48px] xl:text-[58px]">
                    Handpicked Journeys,
                    <br class="hidden sm:block">
                    Just For You
                </h2>

                <p class="mb-8 max-w-[420px] text-[14px] leading-relaxed text-white/60 lg:max-w-[260px]">
                    Exclusive routes and premium travel experiences designed
                    to make every moment in Bali unforgettable.
                </p>

                <a href="#"
                   class="inline-flex items-center gap-3 text-[11px] font-semibold uppercase tracking-[0.08em] text-[#D6B37A] transition hover:text-white">
                    Explore All Experiences
                    <span>→</span>
                </a>
            </div>

            {{-- RIGHT CARDS --}}
            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">

                @foreach ([
                    [
                        'title' => 'Sunset Cliff Ride',
                        'desc' => 'Ride along Bali’s most iconic coastal roads',
                        'price' => '$75',
                        'image' => 'cliffride.webp'
                    ],
                    [
                        'title' => 'Aerial Bali Escape',
                        'desc' => 'Private helicopter tour over Bali’s paradise',
                        'price' => '$875',
                        'image' => 'helitour.webp'
                    ],
                    [
                        'title' => 'VIP Airport Escape',
                        'desc' => 'Luxury transfer with maximum comfort',
                        'price' => '$60',
                        'image' => 'airportescort.webp'
                    ],
                ] as $item)

                    <div
                        class="group relative h-[360px] overflow-hidden rounded-[28px] border border-white/10 bg-white/5 shadow-[0_18px_60px_rgba(0,0,0,0.25)] duration-700 hover:-translate-y-2 sm:h-[390px] lg:h-[430px]">

                        {{-- IMAGE --}}
                        <img
                            src="{{ asset('images/' . $item['image']) }}"
                            class="absolute inset-0 h-full w-full object-cover duration-700 group-hover:scale-105"
                            alt="{{ $item['title'] }}"
                        >

                        {{-- OVERLAY --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/35 to-black/5"></div>

                        {{-- PREMIUM BADGE --}}
                        <div class="absolute left-5 top-5">
                            <span class="inline-flex rounded-full border border-white/10 bg-white/10 px-3 py-1 text-[9px] font-semibold uppercase tracking-[0.16em] text-[#D6B37A] backdrop-blur-md">
                                Premium
                            </span>
                        </div>

                        {{-- CONTENT --}}
                        <div class="absolute bottom-0 left-0 w-full p-6">

                            <h3 class="mb-2 text-[22px] font-semibold leading-tight text-white sm:text-[24px]">
                                {{ $item['title'] }}
                            </h3>

                            <p class="mb-6 max-w-[230px] text-[13px] leading-relaxed text-white/70">
                                {{ $item['desc'] }}
                            </p>

                            <div class="flex items-end justify-between gap-4">

                                <p class="text-[12px] font-semibold text-[#D6B37A]">
                                    From {{ $item['price'] }}
                                </p>

                                <button class="flex h-10 w-10 items-center justify-center rounded-full border border-white/25 bg-white/5 text-white backdrop-blur-md duration-300 hover:bg-white hover:text-black">
                                    →
                                </button>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </div>

</section>
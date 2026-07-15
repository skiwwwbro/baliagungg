<section class="relative overflow-hidden bg-[#071008] py-0">

    <img
        src="{{ asset('images/tropical.jpg') }}"
        class="absolute inset-0 h-full w-full object-cover opacity-100"
        alt=""
    >

    <div class="absolute inset-0 bg-[#071008]/45"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-[#020802]/75 via-[#071008]/45 to-[#071008]/20"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-black/10 via-transparent to-black/35"></div>

    <svg
        class="absolute left-0 top-0 hidden h-[80px] w-[600px] lg:block"
        viewBox="0 0 600 80"
        preserveAspectRatio="none">

        <path
            d="
            M0 0
            H600
            V40

            C520 70,470 62,420 52
            C350 40,300 28,250 28
            C180 35,120 42,70 28
            C35 18,15 28,0 48

            Z
            "
            fill="#F5F1EB"
        />
    </svg>

    <div class="relative z-10 mx-auto max-w-[1440px] px-4 sm:px-6 lg:px-10 py-14 lg:py-16">

        {{-- OUR FLEET --}}
                
        <div class="relative min-h-[650px] sm:min-h-[500px] lg:min-h-[360px]">

            <div
                class="absolute right-[-160px] -top-16 hidden h-[325px] w-[85%] rounded-bl-[34px] rounded-tl-[34px] bg-[#F8F3EC] shadow-[0_25px_80px_rgba(0,0,0,0.35)] lg:block">
            </div>

            <div
                class="absolute inset-x-0 top-[300px] h-[300px] rounded-[28px] bg-[#F8F3EC] shadow-[0_25px_80px_rgba(0,0,0,0.35)] sm:top-[280px] sm:h-[260px] lg:hidden">
            </div>

            <div class="relative grid gap-8 lg:grid-cols-[0.99fr_2.35fr] lg:gap-6">

                <div class="relative w-full max-w-full overflow-hidden pt-4 sm:pt-6 md:-mt-2 lg:-mt-8 xl:-mt-12 2xl:-mt-16">
                    <p class="mb-4 text-[10px] font-bold uppercase tracking-[0.28em] text-[#C8A46A]">
                        Our Fleet
                    </p>

                    <h2 class="font-serif text-[38px] leading-[0.94] tracking-[-0.05em] text-white sm:text-5xl lg:text-[54px]">
                        Premium Vehicles
                        <br>
                        For Every Journey
                    </h2>

                    <p class="mt-5 max-w-[310px] text-sm leading-relaxed text-white/65">
                        Carefully selected and well-maintained vehicles for your comfort and safety.
                    </p>

                    <a href="#"
                    class="mt-7 inline-flex items-center gap-3 text-[10px] font-bold uppercase tracking-[0.22em] text-white transition hover:text-[#C8A46A]">
                        View All Vehicles
                        <span class="text-lg leading-none">→</span>
                    </a>

                    <div class="mt-7 flex gap-3">
                        <button type="button"
                            class="fleet-prev flex h-9 w-9 items-center justify-center rounded-full border border-white/20 text-white/70 transition hover:bg-white hover:text-black">
                            ←
                        </button>

                        <button type="button"
                            class="fleet-next flex h-9 w-9 items-center justify-center rounded-full border border-white/20 text-white/70 transition hover:bg-white hover:text-black">
                            →
                        </button>
                    </div>
                </div>

                <div
    class="
    relative
    overflow-hidden

    -mt-4
    sm:-mt-20
    md:-mt-24
    lg:-mt-14
    xl:-mt-18
    ">

                    <div id="fleetTrack" class="flex transition-transform duration-700 ease-out">

                        @foreach ([
                            ['name' => 'Yamaha NMAX 155', 'price' => '$7', 'img' => 'nmax.webp', 'tag' => 'Best Seller', 'spec1' => '155cc'],
                            ['name' => 'Yamaha XMAX 250', 'price' => '$25', 'img' => 'xmax.webp', 'tag' => 'Popular', 'spec1' => '250cc'],
                            ['name' => 'Ducati MONSTER', 'price' => '$89', 'img' => 'ducatimonster.webp', 'tag' => 'Premium', 'spec1' => '937cc'],
                            ['name' => 'Toyota Alphard', 'price' => '$90', 'img' => 'toyotaalphard.webp', 'tag' => 'Luxury', 'spec1' => '7 Seats'],
                            ['name' => 'Lamborghini Huracan', 'price' => '$850', 'img' => 'huracan.webp', 'tag' => 'Premium', 'spec1' => '2 Seats'],
                        ] as $vehicle)

                            <div class="fleet-slide shrink-0 w-[88%] sm:w-[55%] md:w-[42%] lg:w-1/5 px-2">

                                <div class="group h-[280px] sm:h-[290px] lg:h-[300px] rounded-[22px] bg-white p-4 sm:p-5 shadow-[0_10px_35px_rgba(0,0,0,0.08)] transition duration-500 hover:-translate-y-2 hover:shadow-xl">

                                    <div class="mb-2 inline-flex rounded-full bg-[#E8B76A]/25 px-2.5 py-1 text-[8px] font-bold uppercase tracking-widest text-[#8C5D22]">
                                        {{ $vehicle['tag'] }}
                                    </div>

                                    <div class="flex h-[110px] sm:h-[120px] lg:h-[125px] items-center justify-center">
                                        <img
                                            src="{{ asset('images/' . $vehicle['img']) }}"
                                            class="max-h-[105px] sm:max-h-[115px] lg:max-h-[120px] w-full object-contain transition duration-500 group-hover:scale-105"
                                            alt="{{ $vehicle['name'] }}"
                                        >
                                    </div>

                                    <div class="mt-4">
                                        <h3 class="min-h-[42px] text-[13px] font-bold leading-tight text-[#1A1A1A]">
                                            {{ $vehicle['name'] }}
                                        </h3>

                                        <p class="mt-2 text-[11px] text-[#8C7B62]">
                                            From {{ $vehicle['price'] }} / Day
                                        </p>

                                        <div class="mt-4 flex flex-wrap items-center gap-x-3 gap-y-1 text-[9px] text-[#8A8A8A]">
                                            <span>{{ $vehicle['spec1'] }}</span>
                                            <span>Automatic</span>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>
                </div>

            </div>
        </div>

        <div class="h-14 lg:h-10"></div>

        {{-- DESTINATIONS --}}
        <div class="relative grid gap-8 lg:grid-cols-[0.58fr_2.42fr] lg:items-end">

            <div class="lg:pl-6">
                <p class="mb-4 text-[10px] font-bold uppercase tracking-[0.28em] text-[#C8A46A]">
                    Popular Destinations
                </p>

                <h2 class="font-serif text-[38px] leading-[0.94] tracking-[-0.05em] text-white sm:text-5xl lg:text-[54px]">
                    Where Will Your
                    <br>
                    Journey Take You?
                </h2>

                <p class="mt-5 max-w-[310px] text-sm leading-relaxed text-white/65">
                    Bali is full of beautiful places waiting for you to explore.
                </p>

                <a href="#"
                   class="mt-7 inline-flex items-center gap-3 text-[10px] font-bold uppercase tracking-[0.22em] text-white transition hover:text-[#C8A46A]">
                    Explore All Destinations
                    <span class="text-lg leading-none">→</span>
                </a>
            </div>

            {{-- DESTINATION SLIDER --}}
            <div class="relative overflow-hidden">

                <div id="destinationTrack"
                     class="flex transition-transform duration-700 ease-out lg:grid lg:grid-cols-4 lg:gap-4 lg:transition-none">

                    @foreach ([
                        ['name' => 'Uluwatu', 'desc' => 'Cliffside views and ocean sunsets', 'img' => 'uluwatu.webp'],
                        ['name' => 'Ubud', 'desc' => 'Nature, culture, and serenity combined', 'img' => 'ubud.webp'],
                        ['name' => 'Nusa Penida', 'desc' => 'Wild beauty and stunning beaches', 'img' => 'nusapenida.webp'],
                        ['name' => 'Canggu', 'desc' => 'Trendy vibes and coastal charm', 'img' => 'canggu.webp'],
                    ] as $destination)

                        <div class="destination-slide shrink-0 w-full px-2 sm:w-1/2 lg:w-auto lg:px-0">

                            <div class="group relative h-[280px] overflow-hidden rounded-[24px] border border-white/10 bg-white/5 shadow-[0_18px_60px_rgba(0,0,0,0.35)] sm:h-[300px] lg:h-[300px]">

                                <img
                                    src="{{ asset('images/' . $destination['img']) }}"
                                    class="absolute inset-0 h-full w-full object-cover transition duration-700 group-hover:scale-110"
                                    alt="{{ $destination['name'] }}"
                                >

                                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/35 to-transparent"></div>
                                <div class="absolute inset-0 bg-[#071008]/10"></div>

                                <div class="absolute bottom-0 left-0 right-0 p-5">
                                    <h3 class="mb-2 text-lg font-semibold text-white">
                                        {{ $destination['name'] }}
                                    </h3>

                                    <p class="max-w-[190px] text-xs leading-relaxed text-white/65">
                                        {{ $destination['desc'] }}
                                    </p>
                                </div>

                                <div class="absolute bottom-5 right-5 flex h-8 w-8 items-center justify-center rounded-full border border-white/30 text-white transition duration-500 group-hover:bg-white group-hover:text-black">
                                    →
                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

                {{-- MOBILE / TABLET DOTS --}}
                <div class="mt-5 flex justify-center gap-2 lg:hidden">
                    <button type="button" class="destination-dot h-1.5 w-6 rounded-full bg-[#C8A46A]"></button>
                    <button type="button" class="destination-dot h-1.5 w-1.5 rounded-full bg-white/30"></button>
                    <button type="button" class="destination-dot h-1.5 w-1.5 rounded-full bg-white/30"></button>
                    <button type="button" class="destination-dot h-1.5 w-1.5 rounded-full bg-white/30"></button>
                </div>

            </div>

        </div>

    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const track = document.getElementById('fleetTrack');
    const slides = document.querySelectorAll('.fleet-slide');
    const next = document.querySelector('.fleet-next');
    const prev = document.querySelector('.fleet-prev');

    if (track && slides.length > 0) {
        let index = 0;

        function perView() {
            if (window.innerWidth >= 1024) return 5;
            if (window.innerWidth >= 768) return 1;
            if (window.innerWidth >= 640) return 1;
            return 1;
        }

        function updateFleet() {
            const maxIndex = Math.max(slides.length - perView(), 0);

            if (index > maxIndex) index = 0;
            if (index < 0) index = maxIndex;

            const slideWidth = slides[0].offsetWidth;
            track.style.transform = `translateX(-${index * slideWidth}px)`;
        }

        function nextFleet() {
            const maxIndex = Math.max(slides.length - perView(), 0);
            index = index >= maxIndex ? 0 : index + 1;
            updateFleet();
        }

        function prevFleet() {
            const maxIndex = Math.max(slides.length - perView(), 0);
            index = index <= 0 ? maxIndex : index - 1;
            updateFleet();
        }

        next?.addEventListener('click', nextFleet);
        prev?.addEventListener('click', prevFleet);

        let autoplay = setInterval(nextFleet, 3500);

        track.addEventListener('mouseenter', function () {
            clearInterval(autoplay);
        });

        track.addEventListener('mouseleave', function () {
            autoplay = setInterval(nextFleet, 3500);
        });

        window.addEventListener('resize', updateFleet);

        updateFleet();
    }

    const destinationTrack = document.getElementById('destinationTrack');
    const destinationSlides = document.querySelectorAll('.destination-slide');
    const destinationDots = document.querySelectorAll('.destination-dot');

    if (destinationTrack && destinationSlides.length > 0) {
        let destinationIndex = 0;
        let destinationAutoplay;

        function destinationPerView() {
            if (window.innerWidth >= 1024) return destinationSlides.length;
            if (window.innerWidth >= 640) return 2;
            return 1;
        }

        function updateDestinationDots() {
            destinationDots.forEach((dot, i) => {
                dot.classList.remove('w-6', 'bg-[#C8A46A]');
                dot.classList.add('w-1.5', 'bg-white/30');

                if (i === destinationIndex) {
                    dot.classList.remove('w-1.5', 'bg-white/30');
                    dot.classList.add('w-6', 'bg-[#C8A46A]');
                }
            });
        }

        function updateDestination() {
            if (window.innerWidth >= 1024) {
                destinationTrack.style.transform = 'translateX(0)';
                return;
            }

            const maxIndex = Math.max(destinationSlides.length - destinationPerView(), 0);

            if (destinationIndex > maxIndex) destinationIndex = 0;
            if (destinationIndex < 0) destinationIndex = maxIndex;

            const slideWidth = destinationSlides[0].offsetWidth;
            destinationTrack.style.transform = `translateX(-${destinationIndex * slideWidth}px)`;

            updateDestinationDots();
        }

        function nextDestination() {
            if (window.innerWidth >= 1024) return;

            const maxIndex = Math.max(destinationSlides.length - destinationPerView(), 0);
            destinationIndex = destinationIndex >= maxIndex ? 0 : destinationIndex + 1;

            updateDestination();
        }

        function startDestinationAutoplay() {
            clearInterval(destinationAutoplay);
            destinationAutoplay = setInterval(nextDestination, 3500);
        }

        destinationDots.forEach((dot, i) => {
            dot.addEventListener('click', function () {
                destinationIndex = i;
                updateDestination();
                startDestinationAutoplay();
            });
        });

        window.addEventListener('resize', updateDestination);

        updateDestination();
        startDestinationAutoplay();
    }
});
</script>
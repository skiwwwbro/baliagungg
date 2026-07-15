<section class="relative overflow-hidden bg-[#F5F1EB] py-16 sm:py-20 lg:py-24">

    <div class="mx-auto max-w-[1480px] px-5 sm:px-6 lg:px-10">

        <div class="grid gap-12 lg:grid-cols-[0.36fr_1fr] lg:items-start">

            {{-- LEFT CONTENT --}}
            <div class="pt-0 lg:pt-6">

                <p class="mb-5 text-[10px] font-semibold uppercase tracking-[0.24em] text-[#9D8665] sm:text-[11px]">
                    Our Services
                </p>

                <h2 class="mb-6 font-serif text-[40px] leading-[1] tracking-[-0.04em] text-[#1A1A1A] sm:text-[48px] lg:text-[54px]">
                    Choose Your
                    <br class="hidden sm:block">
                    Experience
                </h2>

                <p class="mb-8 max-w-[420px] text-[14px] leading-relaxed text-[#6B6B6B] lg:max-w-[260px]">
                    Different journeys, different stories.
                    Find the perfect way to explore Bali
                    in your style.
                </p>

                <a href="#"
                   class="inline-flex items-center gap-3 text-[11px] font-semibold uppercase tracking-[0.08em] text-[#1A1A1A] transition duration-300 hover:text-[#9D8665]">
                    Explore All Services
                    <span class="text-lg transition-transform duration-300 group-hover:translate-x-1">→</span>
                </a>

            </div>

            {{-- RIGHT CONTENT --}}
            <div class="relative min-w-0">

                {{-- NAVIGATION --}}
                <div class="mb-6 flex justify-start gap-3 lg:justify-end">

                    <button id="prevBtn"
                        class="flex h-12 w-12 items-center justify-center rounded-full border border-black/10 bg-white/80 shadow-md backdrop-blur-xl transition-all duration-300 hover:bg-black hover:text-white hover:scale-105">
                        ←
                    </button>

                    <button id="nextBtn"
                        class="flex h-12 w-12 items-center justify-center rounded-full border border-black/10 bg-white/80 shadow-md backdrop-blur-xl transition-all duration-300 hover:bg-black hover:text-white hover:scale-105">
                        →
                    </button>

                </div>

                {{-- SLIDER --}}
                <div
                    id="experienceSlider"
                    class="
                    grid
                    grid-flow-col

                    auto-cols-[82%]

                    sm:auto-cols-[46%]

                    lg:auto-cols-[32%]

                    2xl:auto-cols-[24%]

                    gap-4
                    lg:gap-6

                    overflow-x-auto
                    scroll-smooth
                    snap-x
                    snap-mandatory

                    no-scrollbar
                    pb-4
                ">

                    @foreach ([
                        [
                            'title' => 'Motorcycle',
                            'desc' => 'Freedom on two wheels',
                            'image' => 'h2r.webp',
                            'link' => route('motorcycle')
                        ],
                        [
                            'title' => 'Luxury Car',
                            'desc' => 'Drive prestige, arrive in style',
                            'image' => 'rols royce.webp',
                            'link' => route('cars')
                        ],
                        [
                            'title' => 'Helicopter Tour',
                            'desc' => 'See Bali from another perspective',
                            'image' => 'heli.webp',
                            'link' => route('helicopter')
                        ],
                        [
                            'title' => 'VIP Transfer',
                            'desc' => 'Private airport pickup service',
                            'image' => 'alphard.webp',
                            'link' => '#motorcycle'
                        ],
                    ] as $item)

                    <div
                        class="
                        group
                        relative

                        h-[360px]
                        sm:h-[420px]
                        lg:h-[500px]
                        2xl:h-[560px]

                        snap-center
                        overflow-hidden

                        rounded-[28px]

                        transition-all
                        duration-700

                        hover:-translate-y-2
                        hover:shadow-[0_25px_60px_rgba(0,0,0,.18)]
                    ">

                        <img
                            src="{{ asset('images/' . $item['image']) }}"
                            alt="{{ $item['title'] }}"
                            class="
                                absolute inset-0
                                h-full w-full
                                object-cover

                                duration-1000
                                ease-out

                                group-hover:scale-110
                                group-hover:brightness-110
                            "
                        >

                        {{-- OVERLAY --}}
                        <div
                            class="
                            absolute inset-0
                            bg-gradient-to-t
                            from-black
                            via-black/40
                            to-transparent
                        ">
                        </div>

                        {{-- CONTENT --}}
                        <div class="absolute bottom-0 left-0 w-full p-6 sm:p-7 lg:p-8">

                            <h3
                                class="
                                mb-2
                                text-[20px]
                                font-semibold
                                text-white

                                sm:text-[22px]
                                lg:text-[26px]
                            ">
                                {{ $item['title'] }}
                            </h3>

                            <p
                                class="
                                mb-6
                                max-w-[260px]

                                text-[13px]
                                leading-relaxed

                                text-white/75

                                lg:text-[14px]
                            ">
                                {{ $item['desc'] }}
                            </p>

                            <div class="flex justify-end">

                                <a href="{{ $item['link'] }}"
                                class="
                                        flex
                                        h-12
                                        w-12
                                        items-center
                                        justify-center
                                        rounded-full
                                        border
                                        border-white/20
                                        bg-white/10
                                        text-white
                                        backdrop-blur-xl
                                        transition-all
                                        duration-300
                                        hover:bg-white
                                        hover:text-black
                                        hover:rotate-45
                                ">
                                    →
                                </a>

                            </div>

                        </div>

                    </div>

                    @endforeach

                </div>

            </div>

        </div>

    </div>

</section>

<style>
.no-scrollbar::-webkit-scrollbar {
    display: none;
}

.no-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
}

/* Snap Center */
#experienceSlider {
    scroll-padding-left: 20px;
}

/* Coverflow Feel */
#experienceSlider .group {
    transform: scale(.95);
    transition: all .5s ease;
}

#experienceSlider .group:hover {
    transform: scale(1);
}

/* Mobile Optimization */
@media (max-width: 640px) {

    #experienceSlider {
        scroll-padding-left: 16px;
    }

}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const slider = document.getElementById('experienceSlider');
    const nextBtn = document.getElementById('nextBtn');
    const prevBtn = document.getElementById('prevBtn');

    if (!slider || !nextBtn || !prevBtn) return;

    function getScrollAmount() {

        const firstCard = slider.children[0];

        if (!firstCard) {
            return slider.clientWidth;
        }

        const gap = window.innerWidth >= 1024 ? 24 : 16;

        return firstCard.offsetWidth + gap;
    }

    nextBtn.addEventListener('click', function () {

        slider.scrollBy({
            left: getScrollAmount(),
            behavior: 'smooth'
        });

    });

    prevBtn.addEventListener('click', function () {

        slider.scrollBy({
            left: -getScrollAmount(),
            behavior: 'smooth'
        });

    });

});
</script>
<section class="relative py-24 overflow-hidden bg-[#F5F1EB]">
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-[-20%] right-[-10%] w-[600px] h-[600px] bg-[#D6B37A]/10 blur-[120px] rounded-full"></div>
        <div class="absolute bottom-[-20%] left-[-10%] w-[500px] h-[500px] bg-[#B08968]/10 blur-[120px] rounded-full"></div>
    </div>

    <div class="relative z-10 w-full px-6 lg:px-12 2xl:px-20">

        {{-- HEADER --}}
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-10 mb-16">
            <div>
                <p class="uppercase tracking-[0.25em] text-[10px] text-[#B07A45] font-semibold mb-5">
                    What Our Customers Say
                </p>

                <h2 class="font-serif text-[40px] sm:text-[48px] xl:text-[58px] leading-[0.95] tracking-[-0.04em] text-[#1A1A1A]">
                    Memorable Journeys,
                    <br>
                    Trusted by Many
                </h2>
            </div>

            <a href="#"
               class="inline-flex items-center gap-3 uppercase text-[11px] tracking-[0.08em] font-semibold text-[#1A1A1A]">
                View All Reviews
                <span>→</span>
            </a>
        </div>

        {{-- GOOGLE RATING SUMMARY --}}
        <div class="flex items-center gap-6 mb-12">
            <div class="flex items-center gap-3">
                <div class="w-14 h-14 rounded-2xl bg-white shadow-sm flex items-center justify-center text-[#D6B37A] text-2xl">
                    ★
                </div>

                <div>
                    <h3 class="text-2xl font-semibold text-[#1A1A1A] leading-none">
                        4.9/5
                    </h3>

                    <p class="text-[#777] text-sm mt-1">
                        Based on Google Reviews
                    </p>
                </div>
            </div>

            <div class="hidden lg:block w-px h-10 bg-black/10"></div>

            <div class="hidden lg:flex items-center gap-2 text-[#D6B37A] text-lg">
                ★ ★ ★ ★ ★
            </div>
        </div>

        {{-- SLIDER --}}
        <div class="relative overflow-hidden" id="testimonialSlider">

            <div class="flex transition-transform duration-700 ease-out" id="testimonialTrack">

                @foreach ($reviews as $review)
                    <div class="testimonial-slide shrink-0 w-full md:w-1/2 lg:w-1/3 px-3">

                        <div class="group relative h-full bg-white/80 backdrop-blur-xl rounded-[34px] p-7 sm:p-8 xl:p-10 border border-white/60 shadow-[0_10px_40px_rgba(0,0,0,0.04)] hover:-translate-y-2 duration-500 overflow-hidden">

                            <div class="absolute top-[-80px] right-[-80px] w-[180px] h-[180px] bg-[#D6B37A]/10 rounded-full blur-[70px] opacity-0 group-hover:opacity-100 duration-700"></div>

                            <div class="relative z-10 flex h-full flex-col justify-between">

                                <div>
                                    <div class="text-[#D6B37A] text-5xl leading-none mb-6">
                                        “
                                    </div>

                                    <p class="text-[#4A4A4A] leading-relaxed text-[15px] sm:text-[16px] xl:text-[17px] mb-10 line-clamp-5">
                                        {{ $review['text'] }}
                                    </p>
                                </div>

                                <div class="flex items-center justify-between gap-4">

                                    <div class="flex items-center gap-4 min-w-0">
                                        <img
                                            src="{{ $review['profile_photo_url'] }}"
                                            class="w-12 h-12 sm:w-14 sm:h-14 rounded-full object-cover ring-2 ring-white shadow-md"
                                            alt="{{ $review['author_name'] }}"
                                        >

                                        <div class="min-w-0">
                                            <h4 class="font-semibold text-[#1A1A1A] text-[14px] sm:text-[15px] truncate">
                                                {{ $review['author_name'] }}
                                            </h4>

                                            <p class="text-[12px] text-[#888] mt-1">
                                                Google Review
                                            </p>
                                        </div>
                                    </div>

                                    <div class="hidden sm:flex items-center gap-1 text-[#D6B37A] text-sm shrink-0">
                                        @for ($i = 0; $i < $review['rating']; $i++)
                                            ★
                                        @endfor
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>
                @endforeach

            </div>
        </div>

    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const track = document.getElementById('testimonialTrack');
    const slides = document.querySelectorAll('.testimonial-slide');

    if (!track || slides.length === 0) return;

    let index = 0;
    let perView = getPerView();

    function getPerView() {
        if (window.innerWidth >= 1024) return 3;
        if (window.innerWidth >= 768) return 2;
        return 1;
    }

    function updateSlider() {
        perView = getPerView();

        const maxIndex = Math.max(slides.length - perView, 0);

        if (index > maxIndex) {
            index = 0;
        }

        const slideWidth = slides[0].offsetWidth;
        track.style.transform = `translateX(-${index * slideWidth}px)`;
    }

    function nextSlide() {
        const maxIndex = Math.max(slides.length - perView, 0);

        if (index >= maxIndex) {
            index = 0;
        } else {
            index++;
        }

        updateSlider();
    }

    updateSlider();

    let autoSlide = setInterval(nextSlide, 3500);

    window.addEventListener('resize', function () {
        updateSlider();
    });

    const slider = document.getElementById('testimonialSlider');

    slider.addEventListener('mouseenter', function () {
        clearInterval(autoSlide);
    });

    slider.addEventListener('mouseleave', function () {
        autoSlide = setInterval(nextSlide, 3500);
    });
});
</script>
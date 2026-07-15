<section class="relative overflow-hidden py-16 sm:py-20 lg:py-24 text-white">

    {{-- Background Image --}}
    <img
        src="{{ asset('images/cta2.jpg') }}"
        class="absolute inset-0 w-full h-full object-cover"
        alt="Bali Adventure"
    >

    {{-- Overlay --}}
    <div class="absolute inset-0 bg-black/60"></div>

    {{-- Soft Gradient --}}
    <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/40 to-black/70"></div>

    {{-- Glow --}}
    <div class="absolute top-[-20%] right-[-10%] w-[400px] h-[400px] bg-[#D6B37A]/10 blur-[120px] rounded-full"></div>

    <div class="relative z-10 max-w-[1480px] mx-auto px-5 sm:px-6 lg:px-10 text-center">

        {{-- Subtitle --}}
        <p class="uppercase tracking-[0.28em] text-[10px] sm:text-[11px] text-[#D6B37A] font-semibold mb-5">
            Ready To Start Your Bali Adventure?
        </p>

        {{-- Heading --}}
        <h2 class="font-serif text-[38px] sm:text-[52px] lg:text-[64px] leading-[1.05] tracking-[-0.04em] max-w-4xl mx-auto mb-8">
            Create unforgettable moments across Bali.
        </h2>

        {{-- Description --}}
        <p class="text-white/65 text-[14px] sm:text-[15px] leading-relaxed max-w-[620px] mx-auto mb-10">
            Discover premium transport experiences, luxury vehicles,
            and unforgettable journeys crafted exclusively for your Bali adventure.
        </p>

        {{-- CTA Buttons --}}
        <div class="flex flex-col sm:flex-row justify-center gap-3 sm:gap-5">

            <a href="#fleet"
               class="inline-flex items-center justify-center gap-3 bg-[#D6B37A] text-black px-7 py-3.5 rounded-full text-sm font-semibold hover:bg-[#c9a567] duration-300">

                Book Now

                <span>→</span>

            </a>

            <a href="https://wa.me/6281242709627"
            target="_blank"
            class="group inline-flex items-center justify-center gap-3 border border-white/20 bg-white/10 backdrop-blur-md px-7 py-3.5 rounded-full text-sm font-semibold hover:bg-[#25D366] hover:border-[#25D366] hover:text-white duration-300">

                Chat On WhatsApp

                <svg class="w-5 h-5 transition duration-300 group-hover:scale-110"
                    viewBox="0 0 32 32"
                    fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M16.04 3C8.84 3 3 8.84 3 16.04c0 2.3.6 4.54 1.75 6.52L3 29l6.63-1.72a13 13 0 0 0 6.41 1.63C23.24 28.91 29 23.2 29 16.04 29 8.84 23.24 3 16.04 3Zm0 23.7c-2 0-3.95-.54-5.65-1.57l-.4-.24-3.94 1.03 1.05-3.84-.26-.4a10.7 10.7 0 0 1-1.63-5.64c0-5.98 4.86-10.84 10.84-10.84 2.9 0 5.62 1.13 7.66 3.18a10.75 10.75 0 0 1 3.17 7.66c0 5.88-4.86 10.66-10.84 10.66Zm5.94-7.98c-.32-.16-1.9-.94-2.2-1.05-.3-.1-.52-.16-.74.16-.22.32-.85 1.05-1.04 1.27-.2.22-.38.24-.7.08-.32-.16-1.36-.5-2.6-1.6-.96-.85-1.6-1.9-1.8-2.22-.18-.32-.02-.5.14-.66.14-.14.32-.38.48-.56.16-.2.22-.32.32-.54.1-.22.06-.4-.02-.56-.08-.16-.74-1.78-1.02-2.44-.26-.64-.54-.56-.74-.56h-.62c-.22 0-.56.08-.86.4-.3.32-1.14 1.12-1.14 2.74s1.18 3.18 1.34 3.4c.16.22 2.32 3.55 5.62 4.98.78.34 1.4.54 1.88.7.8.25 1.52.22 2.1.14.64-.1 1.9-.78 2.16-1.54.26-.76.26-1.4.18-1.54-.08-.14-.3-.22-.62-.38Z"/>
                </svg>

            </a>

        </div>

    </div>

</section>
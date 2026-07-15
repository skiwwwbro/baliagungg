<section class="relative min-h-[100svh] overflow-hidden text-white">

    {{-- Background --}}
    <img
        src="{{ asset('images/hero-bali.webp') }}"
        class="absolute inset-0 h-full w-full object-cover object-center"
        alt="Bali Luxury Transport"
    >

    {{-- Overlay --}}
    <div class="absolute inset-0 bg-gradient-to-r from-black/85 via-black/40 to-black/10"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-black/25"></div>

    {{-- Content --}}
    <div class="relative z-10 mx-auto flex min-h-[100svh] max-w-[1680px] items-center px-5 pb-24 pt-28 sm:px-6 sm:pt-32 lg:px-10 lg:pb-28 2xl:px-16">

        <div class="w-full max-w-[920px] 2xl:max-w-[980px]">

            {{-- Subtitle --}}
            <p class="mb-5 text-[10px] font-semibold uppercase tracking-[0.24em] text-[#D6B37A] sm:text-[12px] sm:tracking-[0.28em]">
                Premium Transport Experience
            </p>

            {{-- Heading --}}
            <h1 class="mb-7 font-serif text-[clamp(46px,7vw,118px)] leading-[0.88] tracking-[-0.04em]">
                Explore Bali
                <span class="block font-medium italic text-[#E1B979]">
                    Beyond Ordinary
                </span>
            </h1>

            {{-- Description --}}
            <p class="max-w-[560px] text-[15px] leading-relaxed text-white/78 sm:text-[16px] lg:text-[18px]">
                Premium motorcycles, luxury cars, and helicopter tours
                for your unforgettable journey in Bali.
            </p>

            {{-- CTA Area --}}
            <div class="mt-9 sm:mt-10">

                {{-- Buttons --}}
                <div class="flex max-w-[520px] flex-col gap-3 sm:flex-row sm:flex-wrap sm:items-center">

                    <a href="{{ route('cars') }}"
                       class="group flex w-full items-center justify-center gap-3 rounded-[10px] bg-[#E5BE82] px-8 py-4 text-[11px] font-bold uppercase tracking-[0.08em] text-black transition-all duration-300 hover:bg-[#d6ad70] hover:scale-[1.02] sm:w-auto">
                        Book Your Ride
                        <span class="transition-transform duration-300 group-hover:translate-x-1">
                            →
                        </span>
                    </a>

                    <a href="https://wa.me/6281234567890"
                       target="_blank"
                       class="group flex w-full items-center justify-center gap-3 rounded-[10px] border border-white/20 bg-white/5 px-8 py-4 text-[11px] font-semibold uppercase tracking-[0.08em] text-white backdrop-blur-md transition-all duration-300 hover:border-[#25D366] hover:bg-[#25D366] sm:w-auto">
                        Chat On WhatsApp

                        <svg
                            class="h-5 w-5 transition-transform duration-300 group-hover:scale-110"
                            viewBox="0 0 32 32"
                            fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.04 3C8.84 3 3 8.84 3 16.04c0 2.3.6 4.54 1.75 6.52L3 29l6.63-1.72a13 13 0 0 0 6.41 1.63C23.24 28.91 29 23.2 29 16.04 29 8.84 23.24 3 16.04 3Zm0 23.7c-2 0-3.95-.54-5.65-1.57l-.4-.24-3.94 1.03 1.05-3.84-.26-.4a10.7 10.7 0 0 1-1.63-5.64c0-5.98 4.86-10.84 10.84-10.84 2.9 0 5.62 1.13 7.66 3.18a10.75 10.75 0 0 1 3.17 7.66c0 5.88-4.86 10.66-10.84 10.66Zm5.94-7.98c-.32-.16-1.9-.94-2.2-1.05-.3-.1-.52-.16-.74.16-.22.32-.85 1.05-1.04 1.27-.2.22-.38.24-.7.08-.32-.16-1.36-.5-2.6-1.6-.96-.85-1.6-1.9-1.8-2.22-.18-.32-.02-.5.14-.66.14-.14.32-.38.48-.56.16-.2.22-.32.32-.54.1-.22.06-.4-.02-.56-.08-.16-.74-1.78-1.02-2.44-.26-.64-.54-.56-.74-.56h-.62c-.22 0-.56.08-.86.4-.3.32-1.14 1.12-1.14 2.74s1.18 3.18 1.34 3.4c.16.22 2.32 3.55 5.62 4.98.78.34 1.4.54 1.88.7.8.25 1.52.22 2.1.14.64-.1 1.9-.78 2.16-1.54.26-.76.26-1.4.18-1.54-.08-.14-.3-.22-.62-.38Z"/>
                        </svg>
                    </a>

                </div>

                {{-- Trusted Travelers --}}
                <div class="mt-12 sm:mt-16 lg:mt-20">

                    <p class="mb-5 text-[10px] font-semibold uppercase tracking-[0.22em] text-[#D6B37A] sm:text-[11px] sm:tracking-[0.26em]">
                        Trusted By Travelers From
                    </p>

                    <div class="flex max-w-[720px] flex-wrap items-center gap-x-4 gap-y-3 text-[12px] text-white/70 sm:gap-x-5 sm:text-[13px]">

                        <span>Australia</span>
                        <span class="hidden text-[#D6B37A]/50 sm:inline">•</span>

                        <span>Singapore</span>
                        <span class="hidden text-[#D6B37A]/50 sm:inline">•</span>

                        <span>Malaysia</span>
                        <span class="hidden text-[#D6B37A]/50 sm:inline">•</span>

                        <span>Europe</span>
                        <span class="hidden text-[#D6B37A]/50 sm:inline">•</span>

                        <span>Middle East</span>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- Bottom Curve --}}
    <div class="absolute -bottom-1 left-0 h-14 w-full rounded-t-[50%] bg-[#F5F1EB] sm:h-20 lg:h-24"></div>

</section>
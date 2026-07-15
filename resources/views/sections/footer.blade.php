<footer class="relative overflow-hidden bg-[#0B100C] text-white">

    {{-- Background hijau tua natural --}}
    <div class="absolute inset-0 footer-bg bg-gradient-to-r from-[#070B08] via-[#132017] to-[#070B08]"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-white/[0.02] via-transparent to-black/20"></div>

    <div class="relative mx-auto max-w-7xl px-6 lg:px-10 py-14 animate-footer-up">
        <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-5">

            {{-- Brand --}}
            <div>
                <div class="flex items-start gap-3 mb-5">
                    <img src="{{ asset('images/balilogoo.png') }}"
                         class="h-10 w-10 object-contain transition duration-500 hover:scale-110"
                         alt="Bali Agung Trans">

                    <div>
                        <h3 class="text-sm font-semibold tracking-[0.24em] uppercase text-white/85">
                            Bali Agung
                        </h3>
                        <p class="text-[10px] tracking-[0.35em] uppercase text-white/45">
                            Trans
                        </p>
                    </div>
                </div>

                <p class="max-w-xs text-sm leading-relaxed text-white/50">
                    Premium transport services in Bali. Motorcycle, luxury car, and helicopter tour with the best service and price.
                </p>

                <div class="mt-5 flex items-center gap-3">
                    <a href="#" class="footer-social">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="#" class="footer-social">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="#" class="footer-social">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                </div>
            </div>

            {{-- Quick Links --}}
            <div>
                <h4 class="footer-title">Quick Links</h4>

                <ul class="footer-list">
                    <li><a href="/">Home</a></li>
                    <li><a href="#motorcycle">Motorcycle</a></li>
                    <li><a href="#cars">Cars</a></li>
                    <li><a href="#helicopter">Helicopter</a></li>
                    <li><a href="#destinations">Destinations</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>

            {{-- Services --}}
            <div>
                <h4 class="footer-title">Our Services</h4>

                <ul class="footer-list">
                    <li>Motorcycle Rental</li>
                    <li>Luxury Car Rental</li>
                    <li>Helicopter Tour</li>
                    <li>Airport Transfer</li>
                    <li>Daily Tour Package</li>
                </ul>
            </div>

            {{-- Contact --}}
            <div>
                <h4 class="footer-title">Contact Us</h4>

                <ul class="space-y-4 text-sm text-white/48">
                    <li class="flex gap-3">
                        <i class="fa-solid fa-location-dot mt-1 text-white/45"></i>
                        <span>Jl. Sunset Road No.88<br>Kuta, Bali 80361</span>
                    </li>

                    <li class="flex gap-3">
                        <i class="fa-solid fa-phone mt-1 text-white/45"></i>
                        <span>+62 812 3456 7890</span>
                    </li>

                    <li class="flex gap-3">
                        <i class="fa-solid fa-envelope mt-1 text-white/45"></i>
                        <span>info@baliagungtrans.com</span>
                    </li>
                </ul>
            </div>

            {{-- Opening Hours --}}
            <div>
                <h4 class="footer-title">Opening Hours</h4>

                <div class="mb-5 space-y-1 text-sm text-white/48">
                    <p>Everyday</p>
                    <p>07:00 AM - 11:00 PM</p>
                </div>

                <div
                class="overflow-hidden rounded-xl border border-white/[0.06]
                shadow-[0_10px_30px_rgba(0,0,0,0.25)]
                transition duration-500 hover:scale-[1.02] hover:border-white/15">

                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3943.366079531148!2d115.17413707413742!3d-8.751584089326636!2m3!1f0!2f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd24357baaade1b%3A0x375d4bbd57eb0f0a!2sBali%20Agung%20Trans!5e0!3m2!1sen!2sus!4v1781356790076!5m2!1sen!2sus"
                    class="h-36 w-full"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>

            </div>
            </div>

        </div>

        {{-- Bottom --}}
        <div class="mt-11 border-t border-white/[0.06] pt-6 flex flex-col gap-4 text-xs text-white/32 md:flex-row md:items-center md:justify-between">
            <p>© 2026 Bali Agung Trans. All Rights Reserved.</p>

            <div class="flex gap-6">
                <a href="#" class="transition duration-300 hover:text-white">
                    Privacy Policy
                </a>

                <a href="#" class="transition duration-300 hover:text-white">
                    Terms & Conditions
                </a>
            </div>
        </div>

    </div>
</footer>
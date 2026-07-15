<section class="py-16 sm:py-20 lg:py-24 bg-[#F5F1EB]">

    <div class="w-full max-w-[1480px] mx-auto px-5 sm:px-6 lg:px-12 2xl:px-20">

        <div class="grid gap-14 lg:grid-cols-[330px_1fr] lg:items-start">

            {{-- LEFT --}}
            <div>
                <p class="uppercase tracking-[0.25em] text-[10px] text-[#B07A45] font-semibold mb-5">
                    Why Choose Us
                </p>

                <h2 class="font-serif text-[40px] sm:text-[48px] xl:text-[54px] leading-[0.95] tracking-[-0.04em] text-[#1A1A1A]">
                    Your Comfort
                    <br class="hidden sm:block">
                    Is Our Priority
                </h2>
            </div>

            {{-- RIGHT --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-x-10 gap-y-12">

                @foreach ([
                    [
                        'icon' => '⚙',
                        'title' => 'Well Maintained Vehicles',
                        'desc' => 'All vehicles are regularly serviced and inspected'
                    ],
                    [
                        'icon' => '♙',
                        'title' => 'Best Price Guarantee',
                        'desc' => 'Competitive prices with no hidden cost'
                    ],
                    [
                        'icon' => '▣',
                        'title' => 'Easy Booking Process',
                        'desc' => 'Simple process and fast response'
                    ],
                    [
                        'icon' => '☊',
                        'title' => '24/7 Customer Support',
                        'desc' => 'We’re here anytime you need us'
                    ],
                    [
                        'icon' => '▱',
                        'title' => 'Hotel Delivery Available',
                        'desc' => 'Free delivery to hotel, villa, or airport'
                    ],
                ] as $item)

                    <div class="group">

                        <div class="text-[#C1844A] text-[38px] leading-none mb-5 transition duration-300 group-hover:-translate-y-1">
                            {{ $item['icon'] }}
                        </div>

                        <h3 class="font-semibold text-[15px] leading-snug text-[#1A1A1A] mb-3">
                            {{ $item['title'] }}
                        </h3>

                        <p class="text-[#666] leading-relaxed text-[12px] max-w-[180px]">
                            {{ $item['desc'] }}
                        </p>

                    </div>

                @endforeach

            </div>

        </div>

    </div>

</section>
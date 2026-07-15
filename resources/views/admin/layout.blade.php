<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Bali Agung Trans</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @keyframes softSlideUp {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes softPulse {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.08); opacity: .85; }
        }

        .admin-animate { animation: softSlideUp .45s ease both; }
        .notif-pulse { animation: softPulse 1.8s ease-in-out infinite; }
    </style>
</head>

<body class="bg-[#F4F4F1] text-[#171717] antialiased">

@php
    $menus = [
        ['route' => 'admin.dashboard', 'active' => 'admin.dashboard', 'label' => 'Dashboard', 'icon' => '⌂'],
        ['route' => 'admin.cars.index', 'active' => 'admin.cars.*', 'label' => 'Cars', 'icon' => '↗'],
        ['route' => 'admin.motorcycles.index', 'active' => 'admin.motorcycles.*', 'label' => 'Motorcycle', 'icon' => '◆'],
        ['route' => 'admin.helicopter-tours.index', 'active' => 'admin.helicopter-tours.*', 'label' => 'Helicopter', 'icon' => '✦'],
        ['route' => 'admin.carbooking.index', 'active' => 'admin.carbooking.*', 'label' => 'Bookings', 'icon' => '◉'],
        ['route' => 'admin.customers.index', 'active' => 'admin.customers.*', 'label' => 'Customers', 'icon' => '◎'],
        ['route' => 'admin.revenue.index', 'active' => 'admin.revenue.*', 'label' => 'Revenue', 'icon' => '◌'],
        ['route' => 'admin.availability.index', 'active' => 'admin.availability.*', 'label' => 'Availability', 'icon' => '◇'],
    ];
@endphp

<section class="min-h-screen">

    {{-- DESKTOP SIDEBAR --}}
    <aside class="fixed left-0 top-0 z-40 hidden h-screen w-[250px] border-r border-black/10 bg-white/95 backdrop-blur-xl lg:flex lg:flex-col">

        <div class="border-b border-black/10 p-6">
            <a href="{{ route('admin.dashboard') }}" class="group flex items-center gap-3">
                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#0D3B44] text-sm font-bold text-white shadow-[0_14px_30px_rgba(13,59,68,0.24)] transition duration-300 group-hover:-translate-y-0.5">
                    BA
                </div>

                <div>
                    <p class="text-sm font-bold text-[#171717]">Bali Agung</p>
                    <p class="text-xs text-[#777]">Owner Panel</p>
                </div>
            </a>
        </div>

        <nav class="flex-1 space-y-2 p-4">
            @foreach ($menus as $menu)
                <a href="{{ route($menu['route']) }}"
                   class="group flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold transition duration-300
                   {{ request()->routeIs($menu['active'])
                        ? 'bg-[#0D3B44] text-white shadow-[0_14px_35px_rgba(13,59,68,0.18)]'
                        : 'text-[#666] hover:bg-[#F4F4F1] hover:text-[#171717]' }}">

                    <span class="flex h-9 w-9 items-center justify-center rounded-xl transition duration-300 group-hover:scale-105
                        {{ request()->routeIs($menu['active']) ? 'bg-white/15' : 'bg-[#F4F4F1]' }}">
                        {{ $menu['icon'] }}
                    </span>

                    <span>{{ $menu['label'] }}</span>
                </a>
            @endforeach
        </nav>

        <div class="border-t border-black/10 p-4">
            <a href="{{ route('home') }}"
               class="mb-3 flex items-center justify-center rounded-2xl bg-[#F4F4F1] px-4 py-3 text-sm font-semibold text-[#171717] transition duration-300 hover:-translate-y-0.5 hover:bg-[#E8E8E3]">
                View Website
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="w-full rounded-2xl px-4 py-3 text-sm font-semibold text-red-600 transition duration-300 hover:bg-red-50">
                    Logout
                </button>
            </form>
        </div>

    </aside>

    {{-- MOBILE DRAWER OVERLAY --}}
    <div id="mobileMenuOverlay"
         onclick="closeMobileMenu()"
         class="fixed inset-0 z-[80] hidden bg-black/40 backdrop-blur-sm lg:hidden">
    </div>

    {{-- MOBILE DRAWER --}}
    <aside id="mobileMenu"
           class="fixed left-0 top-0 z-[90] h-screen w-[290px] -translate-x-full border-r border-black/10 bg-white transition duration-300 lg:hidden">

        <div class="flex items-center justify-between border-b border-black/10 p-5">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#0D3B44] text-sm font-bold text-white">
                    BA
                </div>

                <div>
                    <p class="text-sm font-bold text-[#171717]">Bali Agung</p>
                    <p class="text-xs text-[#777]">Owner Panel</p>
                </div>
            </a>

            <button onclick="closeMobileMenu()"
                    class="flex h-10 w-10 items-center justify-center rounded-full bg-[#F4F4F1] text-xl">
                ×
            </button>
        </div>

        <nav class="space-y-2 p-4">
            @foreach ($menus as $menu)
                <a href="{{ route($menu['route']) }}"
                   class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold transition
                   {{ request()->routeIs($menu['active'])
                        ? 'bg-[#0D3B44] text-white'
                        : 'text-[#666] hover:bg-[#F4F4F1] hover:text-[#171717]' }}">

                    <span class="flex h-9 w-9 items-center justify-center rounded-xl
                        {{ request()->routeIs($menu['active']) ? 'bg-white/15' : 'bg-[#F4F4F1]' }}">
                        {{ $menu['icon'] }}
                    </span>

                    <span>{{ $menu['label'] }}</span>
                </a>
            @endforeach
        </nav>

        <div class="absolute bottom-0 left-0 right-0 border-t border-black/10 p-4">
            <a href="{{ route('home') }}"
               class="mb-3 flex items-center justify-center rounded-2xl bg-[#F4F4F1] px-4 py-3 text-sm font-semibold text-[#171717]">
                View Website
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="w-full rounded-2xl px-4 py-3 text-sm font-semibold text-red-600 hover:bg-red-50">
                    Logout
                </button>
            </form>
        </div>

    </aside>

    {{-- MAIN --}}
    <main class="w-full lg:pl-[250px]">

        <div class="mx-auto max-w-[1500px] px-4 py-4 sm:px-6 lg:px-8">

            {{-- TOPBAR --}}
            <header class="admin-animate sticky top-4 z-30 mb-6 rounded-[28px] border border-black/5 bg-white/90 p-4 shadow-[0_16px_45px_rgba(0,0,0,0.05)] backdrop-blur-md sm:rounded-[32px]">

                <div class="grid gap-4 xl:grid-cols-[1fr_auto] xl:items-center">

                    <div class="flex min-w-0 items-center justify-between gap-3">

                        <div class="flex min-w-0 items-center gap-3">
                            <button onclick="openMobileMenu()"
                                    class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-[#F7F7F4] text-xl text-[#171717] transition hover:bg-[#ECECE8] lg:hidden">
                                ☰
                            </button>

                            <div class="min-w-0">
                                <p class="truncate text-xs font-medium text-[#777] sm:text-sm">
                                    Dashboard / @yield('admin-title', 'Admin Dashboard')
                                </p>

                                <h1 class="mt-1 truncate text-[22px] font-semibold tracking-[-0.04em] text-[#171717] sm:text-[28px] lg:text-[36px]">
                                    @yield('admin-title', 'Admin Dashboard')
                                </h1>
                            </div>
                        </div>

                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-[#0D3B44] text-sm font-bold text-white shadow-[0_12px_30px_rgba(13,59,68,0.18)] md:hidden">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>

                    </div>

                    <div class="grid grid-cols-[1fr_auto_auto] gap-3 lg:grid-cols-[minmax(220px,280px)_auto_auto_auto] lg:items-center">

                        <form method="GET"
                              action="{{ route('admin.carbooking.index') }}"
                              class="relative">

                            <span class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-sm text-[#777]">
                                ⌕
                            </span>

                            <input
                                name="search"
                                value="{{ request('search') }}"
                                type="text"
                                placeholder="Search..."
                                class="h-11 w-full rounded-full border border-black/10 bg-[#F7F7F4] pl-10 pr-4 text-sm text-[#171717] outline-none transition-all duration-300 focus:border-[#0D3B44] focus:bg-white focus:shadow-[0_10px_30px_rgba(13,59,68,0.08)] sm:max-w-[220px] md:max-w-[260px] lg:max-w-none">
                        </form>

                        <a href="{{ route('home') }}"
                           class="hidden items-center justify-center rounded-full bg-[#F7F7F4] px-5 py-3 text-sm font-semibold text-[#555] transition duration-300 hover:-translate-y-0.5 hover:bg-[#ECECE8] hover:text-[#171717] lg:inline-flex">
                            View Site
                        </a>

                        <a href="{{ route('admin.carbooking.index', ['new' => 1]) }}"
                           class="relative flex h-11 w-11 items-center justify-center rounded-full bg-[#F7F7F4] transition duration-300 hover:-translate-y-0.5 hover:bg-[#ECECE8]">
                            🔔

                            @if (($newOrders ?? 0) > 0)
                                <span class="notif-pulse absolute -right-1 -top-1 flex h-5 w-5 items-center justify-center rounded-full bg-red-600 text-[10px] font-bold text-white">
                                    {{ $newOrders }}
                                </span>
                            @endif
                        </a>

                        <div class="hidden items-center gap-3 rounded-full bg-[#F7F7F4] py-1.5 pl-4 pr-1.5 lg:flex">
                            <div class="text-right">
                                <p class="max-w-[120px] truncate text-sm font-semibold">
                                    {{ auth()->user()->name }}
                                </p>
                                <p class="text-xs text-[#777]">
                                    Owner
                                </p>
                            </div>

                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#0D3B44] text-sm font-bold text-white">
                                {{ strtoupper(substr(auth()->user()->name,0,1)) }}
                            </div>
                        </div>

                    </div>

                </div>

            </header>

            <div class="admin-animate">
                @yield('admin-content')
            </div>

        </div>

    </main>

</section>

<script>
function openMobileMenu() {
    document.getElementById('mobileMenu').classList.remove('-translate-x-full');
    document.getElementById('mobileMenuOverlay').classList.remove('hidden');
    document.body.classList.add('overflow-hidden');
}

function closeMobileMenu() {
    document.getElementById('mobileMenu').classList.add('-translate-x-full');
    document.getElementById('mobileMenuOverlay').classList.add('hidden');
    document.body.classList.remove('overflow-hidden');
}
</script>

</body>
</html>
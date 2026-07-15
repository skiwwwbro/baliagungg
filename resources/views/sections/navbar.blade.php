<header id="mainNavbar" class="fixed left-0 top-0 z-50 w-full transition-all duration-300 ease-out">
    <div id="navbarContainer" class="mx-auto w-full max-w-[1440px] px-5 sm:px-6 lg:px-8 xl:px-10 transition-all duration-300 sm:px-6 lg:px-10 lg:py-6">

        <div class="flex items-center justify-between text-white">

            {{-- Logo --}}
            <a href="/" class="flex items-center gap-3">
                <img
                    src="{{ asset('images/balilogo.png') }}"
                    class="h-9 w-9 object-contain sm:h-10 sm:w-10"
                    alt="Bali Agung Logo"
                >

                <div class="leading-none">
                    <h1 class="text-[15px] font-semibold tracking-[0.08em] sm:text-[19px]">
                        BALI AGUNG
                    </h1>

                    <p class="mt-1 text-[9px] uppercase tracking-[0.34em] text-white/70 sm:text-[10px] sm:tracking-[0.38em]">
                        Trans
                    </p>
                </div>
            </a>

            {{-- Desktop Navigation --}}
            <nav class="hidden items-center gap-7 text-[12px] font-medium uppercase tracking-[0.08em] text-white/85 lg:flex">
               <a href="{{ route('motorcycle') }}"
                class="{{ request()->routeIs('motorcycle') ? 'text-[#E5BE82] after:w-full' : 'text-white/85 after:w-0' }} relative transition-all duration-300 hover:text-[#E5BE82] after:absolute after:left-0 after:-bottom-2 after:h-[2px] after:bg-[#E5BE82] after:transition-all after:duration-300">
                Motorcycle
                </a>
                <span class="text-white/25">•</span>

                <a href="{{ route('cars') }}"
                class="{{ request()->routeIs('cars') ? 'text-[#E5BE82] after:w-full' : 'text-white/85 after:w-0' }} relative transition-all duration-300 hover:text-[#E5BE82] after:absolute after:left-0 after:-bottom-2 after:h-[2px] after:bg-[#E5BE82] after:transition-all after:duration-300">
                Cars
                </a>
                <span class="text-white/25">•</span>

                <a href="{{ route('helicopter') }}"
                class="{{ request()->routeIs('helicopter') ? 'text-[#E5BE82] after:w-full' : 'text-white/85 after:w-0' }} relative transition-all duration-300 hover:text-[#E5BE82] after:absolute after:left-0 after:-bottom-2 after:h-[2px] after:bg-[#E5BE82] after:transition-all after:duration-300">
                Helicopter
                </a>
                <span class="text-white/25">•</span>

                <a href="{{ route('about') }}"
                class="{{ request()->routeIs('about') ? 'text-[#E5BE82] after:w-full' : 'text-white/85 after:w-0' }} relative transition-all duration-300 hover:text-[#E5BE82] after:absolute after:left-0 after:-bottom-2 after:h-[2px] after:bg-[#E5BE82] after:transition-all after:duration-300">
                About Us
                </a>
                <span class="text-white/25">•</span>

                <a href="{{ route('contact') }}"
                class="{{ request()->routeIs('contact') ? 'text-[#E5BE82] after:w-full' : 'text-white/85 after:w-0' }} relative transition-all duration-300 hover:text-[#E5BE82] after:absolute after:left-0 after:-bottom-2 after:h-[2px] after:bg-[#E5BE82] after:transition-all after:duration-300">
                Contact
                </a>
            </nav>

            {{-- Right Actions --}}
            <div class="flex items-center gap-3 sm:gap-4">

                @guest
                <button
                    type="button"
                    id="openAuthModal"
                    class="flex items-center gap-2 rounded-full bg-[#E5BE82] px-4 py-2 text-[10px] font-semibold uppercase tracking-[0.08em] text-black transition-all duration-300 hover:bg-[#d6ad70] sm:px-5 sm:py-3 sm:text-[11px] lg:px-6 lg:text-[12px]">
                    Login
                    <span>→</span>
                </button>
                @endguest

            @auth
                <div class="relative hidden sm:block">

                    <button
                        type="button"
                        id="userMenuButton"
                        class="flex h-11 w-11 items-center justify-center rounded-full bg-[#E5BE82] text-sm font-bold uppercase text-black transition duration-300 hover:bg-[#d6ad70]">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </button>

                    <div
                        id="userMenu"
                        class="absolute right-0 mt-3 hidden w-56 overflow-hidden rounded-2xl border border-white/10 bg-[#0B100C] text-white shadow-[0_20px_60px_rgba(0,0,0,0.35)]">

                        <div class="border-b border-white/10 px-5 py-4">
                            <p class="text-sm font-semibold">
                                {{ auth()->user()->name }}
                            </p>
                            <p class="mt-1 truncate text-xs text-white/45">
                                {{ auth()->user()->email }}
                            </p>
                        </div>

                        @if (auth()->user()->is_admin || auth()->user()->role === 'admin')
                            <a href="{{ route('admin.carbooking.index') }}"
                            class="block px-5 py-3 text-sm text-white/70 transition hover:bg-white/10 hover:text-white">
                                Admin Dashboard
                            </a>
                        @endif

                        <a href="{{ route('customer.bookings') }}"
                        class="block px-5 py-3 text-sm text-white/70 transition hover:bg-white/10 hover:text-white">
                            My Bookings
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button
                                type="submit"
                                class="block w-full px-5 py-3 text-left text-sm text-red-300 transition hover:bg-red-500/10">
                                Logout
                            </button>
                        </form>
                    </div>

                </div>
            @endauth

                <a href="https://wa.me/6281234567890"
                target="_blank"
                class="group hidden h-11 w-11 items-center justify-center rounded-full border border-white/35 bg-white/5 backdrop-blur-md transition-all duration-300 hover:border-[#25D366] hover:bg-[#25D366] hover:scale-110 sm:flex">

                    <svg
                        class="h-5 w-5 text-white transition duration-300"
                        viewBox="0 0 32 32"
                        fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">

                        <path d="M16.04 3C8.84 3 3 8.84 3 16.04c0 2.3.6 4.54 1.75 6.52L3 29l6.63-1.72a13 13 0 0 0 6.41 1.63C23.24 28.91 29 23.2 29 16.04 29 8.84 23.24 3 16.04 3Zm0 23.7c-2 0-3.95-.54-5.65-1.57l-.4-.24-3.94 1.03 1.05-3.84-.26-.4a10.7 10.7 0 0 1-1.63-5.64c0-5.98 4.86-10.84 10.84-10.84 2.9 0 5.62 1.13 7.66 3.18a10.75 10.75 0 0 1 3.17 7.66c0 5.88-4.86 10.66-10.84 10.66Zm5.94-7.98c-.32-.16-1.9-.94-2.2-1.05-.3-.1-.52-.16-.74.16-.22.32-.85 1.05-1.04 1.27-.2.22-.38.24-.7.08-.32-.16-1.36-.5-2.6-1.6-.96-.85-1.6-1.9-1.8-2.22-.18-.32-.02-.5.14-.66.14-.14.32-.38.48-.56.16-.2.22-.32.32-.54.1-.22.06-.4-.02-.56-.08-.16-.74-1.78-1.02-2.44-.26-.64-.54-.56-.74-.56h-.62c-.22 0-.56.08-.86.4-.3.32-1.14 1.12-1.14 2.74s1.18 3.18 1.34 3.4c.16.22 2.32 3.55 5.62 4.98.78.34 1.4.54 1.88.7.8.25 1.52.22 2.1.14.64-.1 1.9-.78 2.16-1.54.26-.76.26-1.4.18-1.54-.08-.14-.3-.22-.62-.38Z"/>

                    </svg>

                </a>

                {{-- Mobile Toggle --}}
                <button
                    type="button"
                    id="mobileMenuButton"
                    class="flex h-11 w-11 items-center justify-center rounded-full border border-white/30 bg-white/5 backdrop-blur-md transition duration-300 hover:bg-white/10 lg:hidden"
                    aria-label="Open Menu">

                    <span class="relative h-4 w-5">
                        <span class="absolute left-0 top-0 h-px w-5 bg-white"></span>
                        <span class="absolute left-0 top-2 h-px w-5 bg-white"></span>
                        <span class="absolute left-0 top-4 h-px w-5 bg-white"></span>
                    </span>

                </button>

            </div>

        </div>

        {{-- Mobile Menu --}}
        <div
    id="mobileMenu"
    class="pointer-events-none absolute left-0 right-0 top-full left-5 right-5 mt-7 origin-top scale-95 rounded-[28px] border border-white/5 bg-[#111111]/80 p-5 text-white opacity-0 shadow-[0_20px_60px_rgba(0,0,0,0.25)] backdrop-blur-xl transition-all duration-300 lg:hidden">

            <nav class="grid gap-4 text-[12px] font-medium uppercase tracking-[0.12em] text-white/80">

            <a href="{{ route('motorcycle') }}"
            class="{{ request()->routeIs('motorcycle') ? 'text-[#E5BE82] after:w-full' : 'text-white/85 after:w-0' }} relative transition-all duration-300 hover:text-[#E5BE82] after:absolute after:left-0 after:-bottom-2 after:h-[2px] after:bg-[#E5BE82] after:transition-all after:duration-300">
            Motorcycle
            </a>

            <a href="{{ route('cars') }}"
            class="{{ request()->routeIs('cars') ? 'text-[#E5BE82] after:w-full' : 'text-white/85 after:w-0' }} relative transition-all duration-300 hover:text-[#E5BE82] after:absolute after:left-0 after:-bottom-2 after:h-[2px] after:bg-[#E5BE82] after:transition-all after:duration-300">
            Cars
            </a>

            <a href="{{ route('helicopter') }}"
            class="{{ request()->routeIs('helicopter') ? 'text-[#E5BE82] after:w-full' : 'text-white/85 after:w-0' }} relative transition-all duration-300 hover:text-[#E5BE82] after:absolute after:left-0 after:-bottom-2 after:h-[2px] after:bg-[#E5BE82] after:transition-all after:duration-300">
            Helicopter
            </a>

            <a href="{{ route('about') }}"
            class="{{ request()->routeIs('about') ? 'text-[#E5BE82] after:w-full' : 'text-white/85 after:w-0' }} relative transition-all duration-300 hover:text-[#E5BE82] after:absolute after:left-0 after:-bottom-2 after:h-[2px] after:bg-[#E5BE82] after:transition-all after:duration-300">
            About Us
            </a>

            <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'text-[#E5BE82] after:w-full' : 'text-white/85 after:w-0' }} relative transition-all duration-300 hover:text-[#E5BE82] after:absolute after:left-0 after:-bottom-2 after:h-[2px] after:bg-[#E5BE82] after:transition-all after:duration-300">Contact</a>

        </nav>

        

        </div>

    </div>
</header>

@guest
<div
    id="authModal"
    class="fixed inset-0 z-[999] hidden items-center justify-center bg-black/60 px-5 backdrop-blur-sm">

    <div class="relative w-full max-w-[460px] rounded-[34px] bg-[#F5F1EB] p-6 shadow-[0_30px_100px_rgba(0,0,0,0.35)] sm:p-8">

        <button
            type="button"
            id="closeAuthModal"
            class="absolute right-5 top-5 flex h-9 w-9 items-center justify-center rounded-full bg-black/10 text-black transition hover:bg-black/20">
            ×
        </button>

        <div id="authToast" class="mb-5 hidden rounded-2xl px-4 py-3 text-sm"></div>

        {{-- LOGIN FORM --}}
        <div id="loginPanel">

            <p class="mb-4 text-[10px] font-semibold uppercase tracking-[0.28em] text-[#B07A45]">
                Account Login
            </p>

            <h2 class="mb-7 font-serif text-[40px] leading-[0.95] text-[#1A1A1A]">
                Welcome Back
            </h2>

            <form id="ajaxLoginForm" class="space-y-4">
                @csrf

                <input
                    type="email"
                    name="email"
                    placeholder="Email Address"
                    required
                    class="w-full rounded-2xl border border-black/10 bg-white px-5 py-4 text-sm outline-none focus:border-[#B07A45]">

                <input
                    type="password"
                    name="password"
                    placeholder="Password"
                    required
                    class="w-full rounded-2xl border border-black/10 bg-white px-5 py-4 text-sm outline-none focus:border-[#B07A45]">

                <button
                    type="submit"
                    class="w-full rounded-full bg-[#1A1A1A] px-7 py-4 text-[11px] font-bold uppercase tracking-[0.08em] text-white transition hover:bg-[#B07A45]">
                    Login
                </button>
            </form>

            <div class="my-5 flex items-center gap-3">
                <div class="h-px flex-1 bg-black/10"></div>
                <span class="text-[11px] font-medium uppercase tracking-[0.15em] text-[#8C7B62]">
                    OR
                </span>
                <div class="h-px flex-1 bg-black/10"></div>
            </div>

            <a href="{{ route('google.login') }}"
            class="group flex w-full items-center justify-center gap-3 rounded-full border border-black/10 bg-white px-5 py-4 text-sm font-semibold text-[#171717] transition-all duration-300 hover:border-[#0D3B44] hover:bg-[#F8F3EC]">

                <svg class="h-5 w-5" viewBox="0 0 48 48">
                    <path fill="#FFC107" d="M43.611 20.083H42V20H24v8h11.303C33.654 32.657 29.263 36 24 36c-6.627 0-12-5.373-12-12S17.373 12 24 12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.274 4 24 4 12.955 4 4 12.955 4 24s8.955 20 20 20 20-8.955 20-20c0-1.341-.138-2.65-.389-3.917z"/>
                    <path fill="#FF3D00" d="M6.306 14.691l6.571 4.819C14.655 16.108 18.961 12 24 12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.274 4 24 4c-7.682 0-14.318 4.337-17.694 10.691z"/>
                    <path fill="#4CAF50" d="M24 44c5.177 0 9.86-1.977 13.409-5.192l-6.191-5.238C29.161 35.091 26.715 36 24 36c-5.242 0-9.619-3.317-11.272-7.946l-6.522 5.025C9.538 39.556 16.227 44 24 44z"/>
                    <path fill="#1976D2" d="M43.611 20.083H42V20H24v8h11.303c-1.028 2.913-3.111 5.285-5.894 6.57l6.191 5.238C39.36 36.304 44 30.72 44 24c0-1.341-.138-2.65-.389-3.917z"/>
                </svg>

                <span>Continue with Google</span>

            </a>

            <p class="mt-6 text-center text-sm text-[#6B6B6B]">
                Belum punya akun?
                <button
                    type="button"
                    id="showRegisterPanel"
                    class="font-semibold text-[#B07A45] hover:underline">
                    Register
                </button>
            </p>

        </div>

        {{-- REGISTER FORM --}}
        <div id="registerPanel" class="hidden">

            <p class="mb-4 text-[10px] font-semibold uppercase tracking-[0.28em] text-[#B07A45]">
                Create Account
            </p>

            <h2 class="mb-7 font-serif text-[40px] leading-[0.95] text-[#1A1A1A]">
                Join Bali Agung
            </h2>

            <form id="ajaxRegisterForm" class="space-y-4">
                @csrf

                <input
                    name="name"
                    placeholder="Full Name"
                    required
                    class="w-full rounded-2xl border border-black/10 bg-white px-5 py-4 text-sm outline-none focus:border-[#B07A45]">

                <input
                    name="phone"
                    placeholder="WhatsApp Number"
                    class="w-full rounded-2xl border border-black/10 bg-white px-5 py-4 text-sm outline-none focus:border-[#B07A45]">

                <input
                    type="email"
                    name="email"
                    placeholder="Email Address"
                    required
                    class="w-full rounded-2xl border border-black/10 bg-white px-5 py-4 text-sm outline-none focus:border-[#B07A45]">

                <input
                    type="password"
                    name="password"
                    placeholder="Password"
                    required
                    class="w-full rounded-2xl border border-black/10 bg-white px-5 py-4 text-sm outline-none focus:border-[#B07A45]">

                <input
                    type="password"
                    name="password_confirmation"
                    placeholder="Confirm Password"
                    required
                    class="w-full rounded-2xl border border-black/10 bg-white px-5 py-4 text-sm outline-none focus:border-[#B07A45]">

                <button
                    type="submit"
                    class="w-full rounded-full bg-[#1A1A1A] px-7 py-4 text-[11px] font-bold uppercase tracking-[0.08em] text-white transition hover:bg-[#B07A45]">
                    Register
                </button>

            </form>

            <div class="my-5 flex items-center gap-3">
                <div class="h-px flex-1 bg-black/10"></div>
                <span class="text-[11px] font-medium uppercase tracking-[0.15em] text-[#8C7B62]">
                    OR
                </span>
                <div class="h-px flex-1 bg-black/10"></div>
            </div>

            <a href="{{ route('google.login') }}"
            class="group flex w-full items-center justify-center gap-3 rounded-full border border-black/10 bg-white px-5 py-4 text-sm font-semibold text-[#171717] transition-all duration-300 hover:border-[#0D3B44] hover:bg-[#F8F3EC]">

                <svg class="h-5 w-5" viewBox="0 0 48 48">
                    <path fill="#FFC107" d="M43.611 20.083H42V20H24v8h11.303C33.654 32.657 29.263 36 24 36c-6.627 0-12-5.373-12-12S17.373 12 24 12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.274 4 24 4 12.955 4 4 12.955 4 24s8.955 20 20 20 20-8.955 20-20c0-1.341-.138-2.65-.389-3.917z"/>
                    <path fill="#FF3D00" d="M6.306 14.691l6.571 4.819C14.655 16.108 18.961 12 24 12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.274 4 24 4c-7.682 0-14.318 4.337-17.694 10.691z"/>
                    <path fill="#4CAF50" d="M24 44c5.177 0 9.86-1.977 13.409-5.192l-6.191-5.238C29.161 35.091 26.715 36 24 36c-5.242 0-9.619-3.317-11.272-7.946l-6.522 5.025C9.538 39.556 16.227 44 24 44z"/>
                    <path fill="#1976D2" d="M43.611 20.083H42V20H24v8h11.303c-1.028 2.913-3.111 5.285-5.894 6.57l6.191 5.238C39.36 36.304 44 30.72 44 24c0-1.341-.138-2.65-.389-3.917z"/>
                </svg>

                <span>Continue with Google</span>

            </a>

            <p class="mt-6 text-center text-sm text-[#6B6B6B]">
                Sudah punya akun?
                <button
                    type="button"
                    id="showLoginPanel"
                    class="font-semibold text-[#B07A45] hover:underline">
                    Login
                </button>
            </p>

        </div>

    </div>
</div>
@endguest

<style>

#mainNavbar.scrolled{
    background: rgba(12,12,12,.78);
    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);

    box-shadow:
        0 12px 30px rgba(0,0,0,.18);

    border-bottom:1px solid rgba(255,255,255,.08);
}

#mainNavbar.scrolled #navbarContainer{
    padding-top:14px;
    padding-bottom:14px;
}

/* Smooth */

#mainNavbar,
#navbarContainer{
    transition:
        background .35s ease,
        backdrop-filter .35s ease,
        padding .35s ease,
        box-shadow .35s ease;
}

#mobileMenu.show{
    opacity:1;
    transform:translateY(0) scale(1);
    pointer-events:auto;
}

#mobileMenu{
    transform:translateY(-12px) scale(.95);
}

</style>

<div
    id="loginRequiredToast"
    class="fixed top-6 right-6 z-[9999] w-80 translate-x-[120%] rounded-2xl bg-white border border-gray-200 shadow-2xl transition-all duration-500">

    <div class="flex items-start gap-3 p-4">

        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-amber-100">
            🔒
        </div>

        <div class="flex-1">

            <h3 class="font-semibold text-gray-800">
                Login Required
            </h3>

            <p class="mt-1 text-sm text-gray-500">
                Please login first to continue your booking.
            </p>

        </div>

    </div>

</div>


<script>
document.addEventListener('DOMContentLoaded', function () {

    window.showLoginRequired = function () {

    const toast = document.getElementById('loginRequiredToast');

    toast.classList.remove('translate-x-[120%]');
    toast.classList.add('translate-x-0');

    setTimeout(() => {

        toast.classList.remove('translate-x-0');
        toast.classList.add('translate-x-[120%]');

    }, 2200);

    setTimeout(() => {

        const authModal = document.getElementById('authModal');

        authModal.classList.remove('hidden');
        authModal.classList.add('flex');

    }, 1000);

}

    // ==========================
    // Mobile Menu
    // ==========================
    const mobileButton = document.getElementById('mobileMenuButton');
    const mobileMenu = document.getElementById('mobileMenu');

    if (mobileButton && mobileMenu) {
        mobileButton.addEventListener('click', function () {
            mobileMenu.classList.toggle('show');
        });
    }

    // ==========================
    // User Dropdown
    // ==========================
    const userMenuButton = document.getElementById('userMenuButton');
    const userMenu = document.getElementById('userMenu');

    if (userMenuButton && userMenu) {
        userMenuButton.addEventListener('click', function () {
            userMenu.classList.toggle('hidden');
        });
    }

    // ==========================
    // Auth Modal
    // ==========================
    const authModal = document.getElementById('authModal');
    const openAuthModal = document.getElementById('openAuthModal');
    const openAuthModalMobile = document.getElementById('openAuthModalMobile');
    const closeAuthModal = document.getElementById('closeAuthModal');

    const loginPanel = document.getElementById('loginPanel');
    const registerPanel = document.getElementById('registerPanel');

    const showRegisterPanel = document.getElementById('showRegisterPanel');
    const showLoginPanel = document.getElementById('showLoginPanel');

    const ajaxLoginForm = document.getElementById('ajaxLoginForm');
    const ajaxRegisterForm = document.getElementById('ajaxRegisterForm');

    const authToast = document.getElementById('authToast');

    function showToast(type, message) {

        if (!authToast) return;

        authToast.classList.remove(
            'hidden',
            'bg-green-100',
            'text-green-800',
            'bg-red-100',
            'text-red-800'
        );

        if (type === 'success') {
            authToast.classList.add('bg-green-100', 'text-green-800');
        } else {
            authToast.classList.add('bg-red-100', 'text-red-800');
        }

        authToast.textContent = message;
    }

    if (openAuthModal && authModal) {
        openAuthModal.addEventListener('click', function () {
            authModal.classList.remove('hidden');
            authModal.classList.add('flex');
        });
    }

    if (openAuthModalMobile && authModal) {
        openAuthModalMobile.addEventListener('click', function () {
            authModal.classList.remove('hidden');
            authModal.classList.add('flex');
        });
    }

    if (closeAuthModal && authModal) {
        closeAuthModal.addEventListener('click', function () {
            authModal.classList.add('hidden');
            authModal.classList.remove('flex');
        });
    }

    if (showRegisterPanel) {
        showRegisterPanel.addEventListener('click', function () {
            loginPanel.classList.add('hidden');
            registerPanel.classList.remove('hidden');
        });
    }

    if (showLoginPanel) {
        showLoginPanel.addEventListener('click', function () {
            registerPanel.classList.add('hidden');
            loginPanel.classList.remove('hidden');
        });
    }

    // ==========================
    // AJAX LOGIN
    // ==========================
    if (ajaxLoginForm) {

        ajaxLoginForm.addEventListener('submit', async function (e) {

            e.preventDefault();

            const formData = new FormData(ajaxLoginForm);

            const response = await fetch('{{ route('login.submit') }}', {
                method: 'POST',
                headers: {
                    Accept: 'application/json',
                    'X-CSRF-TOKEN': formData.get('_token')
                },
                body: formData
            });

            const data = await response.json();

            if (!response.ok) {
                showToast('error', data.message || 'Login gagal.');
                return;
            }

            showToast('success', data.message || 'Login berhasil.');

            setTimeout(function () {
                window.location.reload();
            }, 900);

        });

    }

    // ==========================
    // AJAX REGISTER
    // ==========================
    if (ajaxRegisterForm) {

        ajaxRegisterForm.addEventListener('submit', async function (e) {

            e.preventDefault();

            const formData = new FormData(ajaxRegisterForm);

            const response = await fetch('{{ route('register.store') }}', {
                method: 'POST',
                headers: {
                    Accept: 'application/json',
                    'X-CSRF-TOKEN': formData.get('_token')
                },
                body: formData
            });

            const data = await response.json();

            if (!response.ok) {
                showToast('error', data.message || 'Register gagal.');
                return;
            }

            showToast('success', data.message || 'Register berhasil.');

            setTimeout(function () {
                window.location.reload();
            }, 900);

        });

    }

    // ==========================================
    // Sticky Navbar (Premium)
    // ==========================================

    const navbar = document.getElementById('mainNavbar');

    let ticking = false;

    function updateNavbar() {

        if (!navbar) return;

        if (window.scrollY > 60) {

            navbar.classList.add('scrolled');

        } else {

            navbar.classList.remove('scrolled');

        }

        ticking = false;
    }

    window.addEventListener('scroll', function () {

        if (!ticking) {

            window.requestAnimationFrame(updateNavbar);

            ticking = true;

        }

    });

    updateNavbar();

});
</script>
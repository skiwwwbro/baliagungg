<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- ================= SEO ================= --}}

    <title>@yield('title','Bali Agung Trans | Premium Car Rental Bali')</title>

    <meta name="description"
        content="@yield('description','Premium Car Rental, Motorcycle Rental, Helicopter Tour, Airport Transfer and Luxury Transportation in Bali.')">

    <meta name="keywords"
        content="Car Rental Bali, Bali Agung Trans, Luxury Car Rental Bali, Motorcycle Rental Bali, Helicopter Tour Bali, Airport Transfer Bali">

    <meta name="author"
        content="Bali Agung Trans">

    <meta name="robots"
        content="index,follow,max-image-preview:large">

    <meta name="theme-color"
        content="#B07A45">

    <link rel="canonical"
        href="{{ url()->current() }}">

    {{-- Open Graph --}}

    <meta property="og:type"
        content="website">

    <meta property="og:site_name"
        content="Bali Agung Trans">

    <meta property="og:title"
        content="@yield('title','Bali Agung Trans')">

    <meta property="og:description"
        content="@yield('description')">

    <meta property="og:url"
        content="{{ url()->current() }}">

    <meta property="og:image"
        content="{{ asset('images/seo/og-image.jpg') }}">

    {{-- Twitter --}}

    <meta name="twitter:card"
        content="summary_large_image">

    <meta name="twitter:title"
        content="@yield('title')">

    <meta name="twitter:description"
        content="@yield('description')">

    <meta name="twitter:image"
        content="{{ asset('images/seo/og-image.jpg') }}">

    {{-- Favicon --}}

    <link rel="icon"
        href="{{ asset('favicon.ico') }}">

    {{-- Performance --}}

    <link rel="preconnect"
        href="https://fonts.bunny.net"
        crossorigin>

    <link rel="dns-prefetch"
        href="//fonts.bunny.net">

    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
        rel="stylesheet">

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    @stack('head')

</head>

<body class="font-sans antialiased">

<div class="min-h-screen bg-gray-100">

    @isset($header)
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    <main>
        @yield('content')
    </main>

</div>

@stack('scripts')

</body>

</html>
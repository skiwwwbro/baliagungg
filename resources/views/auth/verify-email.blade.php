@extends('layouts.app')

@section('content')

<section class="min-h-screen bg-[#F5F1EB] flex items-center justify-center px-5">

    <div class="w-full max-w-[540px] rounded-[34px] bg-white p-8 shadow-[0_20px_80px_rgba(0,0,0,0.08)]">

        <p class="text-[10px] font-semibold uppercase tracking-[0.28em] text-[#B07A45]">
            Email Verification
        </p>

        <h1 class="mt-4 font-serif text-[44px] leading-[0.95] text-[#171717]">
            Verify Your Email
        </h1>

        <p class="mt-5 text-sm leading-relaxed text-[#6B6B6B]">
            We sent a verification link to your email address.
            Please verify your email before using booking features.
        </p>

        <form method="POST"
              action="{{ route('verification.send') }}"
              class="mt-7">

            @csrf

            <button
                class="w-full rounded-full bg-[#171717] px-6 py-4 text-[11px] font-bold uppercase tracking-[0.08em] text-white">
                Resend Verification Email
            </button>

        </form>

    </div>

</section>

@endsection
@extends('admin.layout')

@section('admin-title', 'Helicopter Tour Detail')

@section('admin-content')

<div class="mx-auto max-w-[1000px]">

    <div class="mb-8 flex items-end justify-between">
        <div>
            <h2 class="text-[32px] font-semibold tracking-[-0.04em]">
                {{ $helicopterTour->package_name }}
            </h2>

            <p class="mt-1 text-sm text-[#777]">
                Helicopter tour detail.
            </p>
        </div>

        <a href="{{ route('admin.helicopter-tours.edit', $helicopterTour) }}"
           class="rounded-full bg-[#171717] px-6 py-3 text-sm font-semibold text-white">
            Edit Tour
        </a>
    </div>

    <div class="overflow-hidden rounded-[34px] bg-white shadow-[0_16px_45px_rgba(0,0,0,0.04)]">

        <div class="h-[360px] bg-[#E9E9E5]">
            @if ($helicopterTour->image)
                <img src="{{ asset('images/' . $helicopterTour->image) }}"
                     class="h-full w-full object-cover"
                     alt="{{ $helicopterTour->package_name }}">
            @else
                <div class="flex h-full items-center justify-center text-[#777]">
                    No Image
                </div>
            @endif
        </div>

        <div class="p-7 sm:p-9">

            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">

                <div>
                    <p class="text-xs text-[#777]">Category</p>
                    <p class="mt-2 font-semibold capitalize">{{ $helicopterTour->category }}</p>
                </div>

                <div>
                    <p class="text-xs text-[#777]">Price</p>
                    <p class="mt-2 font-semibold">${{ number_format($helicopterTour->price) }}</p>
                </div>

                <div>
                    <p class="text-xs text-[#777]">Status</p>
                    <p class="mt-2 font-semibold {{ $helicopterTour->is_active ? 'text-green-700' : 'text-red-700' }}">
                        {{ $helicopterTour->is_active ? 'Active' : 'Hidden' }}
                    </p>
                </div>

                <div>
                    <p class="text-xs text-[#777]">Duration</p>
                    <p class="mt-2 font-semibold">{{ $helicopterTour->duration ?? '-' }}</p>
                </div>

                <div>
                    <p class="text-xs text-[#777]">Passenger</p>
                    <p class="mt-2 font-semibold">{{ $helicopterTour->passenger ?? '-' }}</p>
                </div>

                <div>
                    <p class="text-xs text-[#777]">Route</p>
                    <p class="mt-2 font-semibold">{{ $helicopterTour->route ?? '-' }}</p>
                </div>

            </div>

            <div class="mt-8 border-t border-black/10 pt-8">
                <p class="mb-3 text-xs text-[#777]">
                    Description
                </p>

                <p class="text-sm leading-relaxed text-[#666]">
                    {{ $helicopterTour->description }}
                </p>
            </div>

            <div class="mt-8">
                <a href="{{ route('admin.helicopter-tours.index') }}"
                   class="rounded-full border border-black/10 px-7 py-3 text-sm font-semibold">
                    Back
                </a>
            </div>

        </div>

    </div>

</div>

@endsection
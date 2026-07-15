@extends('admin.layout')

@section('admin-title', 'Manage motorcycles')

@section('admin-content')

<section class="min-h-screen bg-[#F5F1EB] px-5 py-12 sm:px-6 lg:px-10">

    <div class="mx-auto max-w-[1000px]">

        <div class="mb-10 flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="mb-3 text-[10px] font-semibold uppercase tracking-[0.28em] text-[#B07A45]">
                    motorcycle Detail
                </p>

                <h1 class="font-serif text-[42px] leading-[0.95] text-[#1A1A1A] sm:text-[56px]">
                    {{ $motorcycle->name }}
                </h1>
            </div>

            <a href="{{ route('admin.motorcycles.edit', $motorcycle) }}"
               class="inline-flex items-center justify-center rounded-full bg-[#1A1A1A] px-6 py-3 text-[11px] font-bold uppercase tracking-[0.08em] text-white">
                Edit motorcycle
            </a>
        </div>

        <div class="overflow-hidden rounded-[34px] bg-white shadow-[0_18px_55px_rgba(0,0,0,0.06)]">

            <div class="flex h-[320px] items-center justify-center bg-[#EEE6DA] p-8">
                @if ($motorcycle->image)
                    <img src="{{ asset('storage/' . $motorcycle->image) }}"
                         class="max-h-[260px] w-full object-contain"
                         alt="{{ $motorcycle->name }}">
                @else
                    <span class="text-[#8C7B62]">No Image</span>
                @endif
            </div>

            <div class="p-7 sm:p-9">

                <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">

                    <div>
                        <p class="text-xs uppercase tracking-[0.18em] text-[#8C7B62]">Category</p>
                        <p class="mt-2 font-semibold capitalize text-[#1A1A1A]">{{ $motorcycle->category }}</p>
                    </div>

                    <div>
                        <p class="text-xs uppercase tracking-[0.18em] text-[#8C7B62]">Price</p>
                        <p class="mt-2 font-semibold text-[#1A1A1A]">${{ number_format($motorcycle->price_per_day) }} / Day</p>
                    </div>

                    <div>
                        <p class="text-xs uppercase tracking-[0.18em] text-[#8C7B62]">Status</p>
                        <p class="mt-2 font-semibold {{ $motorcycle->is_active ? 'text-green-700' : 'text-red-700' }}">
                            {{ $motorcycle->is_active ? 'Active' : 'Hidden' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs uppercase tracking-[0.18em] text-[#8C7B62]">cc</p>
                        <p class="mt-2 font-semibold text-[#1A1A1A]">{{ $motorcycle->cc ?? '-' }}</p>
                    </div>

                    <div>
                        <p class="text-xs uppercase tracking-[0.18em] text-[#8C7B62]">fuel</p>
                        <p class="mt-2 font-semibold text-[#1A1A1A]">{{ $motorcycle->fuel ?? '-' }}</p>
                    </div>

                    <div>
                        <p class="text-xs uppercase tracking-[0.18em] text-[#8C7B62]">transmission</p>
                        <p class="mt-2 font-semibold text-[#1A1A1A]">{{ $motorcycle->transmission ?? '-' }}</p>
                    </div>

                </div>

                <div class="mt-8 border-t border-black/10 pt-8">
                    <p class="mb-3 text-xs uppercase tracking-[0.18em] text-[#8C7B62]">
                        Description
                    </p>

                    <p class="text-sm leading-relaxed text-[#6B6B6B]">
                        {{ $motorcycle->description }}
                    </p>
                </div>

                <div class="mt-8">
                    <a href="{{ route('admin.motorcycles.index') }}"
                       class="inline-flex rounded-full border border-black/10 px-7 py-3 text-[11px] font-bold uppercase tracking-[0.08em] text-[#1A1A1A]">
                        Back
                    </a>
                </div>

            </div>

        </div>

    </div>

</section>

@endsection
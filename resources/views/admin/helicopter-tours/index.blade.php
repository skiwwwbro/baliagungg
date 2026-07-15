@extends('admin.layout')

@section('admin-title', 'Helicopter Tours')

@section('admin-content')

<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="text-[32px] font-semibold tracking-[-0.04em]">
            Helicopter Tours
        </h2>
        <p class="mt-1 text-sm text-[#777]">
            Manage helicopter packages and aerial experiences.
        </p>
    </div>

    <a href="{{ route('admin.helicopter-tours.create') }}"
       class="rounded-full bg-[#171717] px-5 py-3 text-sm font-semibold text-white">
        + Add Tour
    </a>
</div>

@if (session('success'))
    <div class="mb-5 rounded-2xl bg-green-100 px-5 py-4 text-sm text-green-800">
        {{ session('success') }}
    </div>
@endif

<div class="grid gap-5 md:grid-cols-2 xl:grid-cols-3">

    @forelse ($helicopterTours as $tour)

        <div class="overflow-hidden rounded-[30px] bg-white shadow-[0_16px_45px_rgba(0,0,0,0.04)]">

            <div class="relative h-[230px] bg-[#E9E9E5]">
                @if ($tour->image)
                    <img src="{{ asset('storage/' . $tour->image) }}"
                         class="h-full w-full object-cover"
                         alt="{{ $tour->package_name }}">
                @else
                    <div class="flex h-full items-center justify-center text-sm text-[#777]">
                        No Image
                    </div>
                @endif

                <span class="absolute left-4 top-4 rounded-full bg-white/90 px-3 py-1 text-[10px] font-semibold uppercase">
                    {{ $tour->category }}
                </span>

                <span class="absolute right-4 top-4 rounded-full px-3 py-1 text-[10px] font-semibold
                    {{ $tour->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                    {{ $tour->is_active ? 'Active' : 'Hidden' }}
                </span>
            </div>

            <div class="p-6">
                <p class="text-sm text-[#777]">
                    {{ $tour->tag ?? 'Helicopter Tour' }}
                </p>

                <h3 class="mt-2 text-[24px] font-semibold tracking-[-0.03em]">
                    {{ $tour->package_name }}
                </h3>

                <p class="mt-2 text-sm font-semibold">
                    ${{ number_format($tour->price) }}
                </p>

                <p class="mt-4 line-clamp-3 text-sm leading-relaxed text-[#777]">
                    {{ $tour->description }}
                </p>

                <div class="mt-5 grid grid-cols-3 gap-3 border-y border-black/10 py-4 text-center text-xs">
                    <div>
                        <p class="text-[#777]">Duration</p>
                        <p class="mt-1 font-semibold">{{ $tour->duration ?? '-' }}</p>
                    </div>

                    <div>
                        <p class="text-[#777]">Guest</p>
                        <p class="mt-1 font-semibold">{{ $tour->passenger ?? '-' }}</p>
                    </div>

                    <div>
                        <p class="text-[#777]">Route</p>
                        <p class="mt-1 font-semibold">{{ $tour->route ?? '-' }}</p>
                    </div>
                </div>

                <div class="mt-5 flex flex-wrap gap-2">

                    <a href="{{ route('admin.helicopter-tours.show', $tour) }}"
                       class="rounded-full bg-[#F3F3F0] px-4 py-2 text-xs font-semibold">
                        Show
                    </a>

                    <a href="{{ route('admin.helicopter-tours.edit', $tour) }}"
                       class="rounded-full bg-[#171717] px-4 py-2 text-xs font-semibold text-white">
                        Edit
                    </a>

                    <form method="POST"
                          action="{{ route('admin.helicopter-tours.destroy', $tour) }}"
                          onsubmit="return confirm('Yakin hapus tour ini?')">
                        @csrf
                        @method('DELETE')

                        <button class="rounded-full bg-red-100 px-4 py-2 text-xs font-semibold text-red-700">
                            Delete
                        </button>
                    </form>

                </div>
            </div>

        </div>

    @empty

        <div class="col-span-full rounded-[30px] bg-white p-10 text-center text-[#777]">
            Belum ada helicopter tour.
        </div>

    @endforelse

</div>

<div class="mt-8">
    {{ $helicopterTours->links() }}
</div>

@endsection
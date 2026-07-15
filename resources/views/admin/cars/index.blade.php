@extends('admin.layout')

@section('admin-title', 'Manage Cars')

@section('admin-content')

<section class="min-h-screen bg-[#F5F1EB] px-5 py-12 sm:px-6 lg:px-10">

    <div class="mx-auto max-w-[1480px]">

        <div class="mb-10 flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="mb-3 text-[10px] font-semibold uppercase tracking-[0.28em] text-[#B07A45]">
                    Admin Dashboard
                </p>

                <h1 class="font-serif text-[42px] leading-[0.95] text-[#1A1A1A] sm:text-[56px]">
                    Manage Cars
                </h1>
            </div>

            <a href="{{ route('admin.cars.create') }}"
               class="inline-flex items-center justify-center rounded-full bg-[#1A1A1A] px-6 py-3 text-[11px] font-bold uppercase tracking-[0.08em] text-white transition hover:bg-[#B07A45]">
                Add New Car
                <span class="ml-2">+</span>
            </a>
        </div>

        @if (session('success'))
            <div class="mb-6 rounded-2xl bg-green-100 px-5 py-4 text-sm text-green-800">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-3">

            @forelse ($cars as $car)

                <div class="overflow-hidden rounded-[30px] bg-white shadow-[0_18px_55px_rgba(0,0,0,0.06)]">

                    <div class="relative flex h-[230px] items-center justify-center bg-[#EEE6DA] p-6">

                        @if ($car->image)
                            <img
                                src="{{ asset('storage/' . $car->image) }}"
                                class="max-h-[180px] w-full object-contain"
                                alt="{{ $car->name }}">
                        @else
                            <div class="text-sm text-[#8C7B62]">
                                No Image
                            </div>
                        @endif

                        <span class="absolute left-4 top-4 rounded-full bg-white/90 px-3 py-1 text-[9px] font-bold uppercase tracking-[0.14em] text-[#8C5D22]">
                            {{ $car->category }}
                        </span>

                        <span class="absolute right-4 top-4 rounded-full px-3 py-1 text-[9px] font-bold uppercase tracking-[0.14em]
                            {{ $car->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $car->is_active ? 'Active' : 'Hidden' }}
                        </span>

                    </div>

                    <div class="p-6">

                        <p class="mb-2 text-[10px] font-bold uppercase tracking-[0.2em] text-[#B07A45]">
                            {{ $car->tag ?? 'Car Collection' }}
                        </p>

                        <h3 class="text-[23px] font-semibold text-[#1A1A1A]">
                            {{ $car->name }}
                        </h3>

                        <p class="mt-2 text-sm font-semibold text-[#B07A45]">
                            ${{ number_format($car->price_per_day) }} / Day
                        </p>

                        <p class="mt-4 line-clamp-3 text-sm leading-relaxed text-[#6B6B6B]">
                            {{ $car->description }}
                        </p>

                        <div class="mt-6 grid grid-cols-3 gap-3 border-y border-black/10 py-4 text-center text-xs">
                            <div>
                                <p class="mb-1 text-[#8C7B62]">Seats</p>
                                <p class="font-semibold text-[#1A1A1A]">{{ $car->passenger ?? '-' }}</p>
                            </div>

                            <div>
                                <p class="mb-1 text-[#8C7B62]">Service</p>
                                <p class="font-semibold text-[#1A1A1A]">{{ $car->service ?? '-' }}</p>
                            </div>

                            <div>
                                <p class="mb-1 text-[#8C7B62]">Purpose</p>
                                <p class="font-semibold text-[#1A1A1A]">{{ $car->purpose ?? '-' }}</p>
                            </div>
                        </div>

                        <div class="mt-6 flex flex-wrap gap-2">

                            <a href="{{ route('admin.cars.show', $car) }}"
                               class="rounded-full bg-[#F5F1EB] px-4 py-2 text-xs font-semibold text-[#1A1A1A]">
                                Show
                            </a>

                            <a href="{{ route('admin.cars.edit', $car) }}"
                               class="rounded-full bg-[#1A1A1A] px-4 py-2 text-xs font-semibold text-white">
                                Edit
                            </a>

                            <form method="POST" action="{{ route('admin.cars.destroy', $car) }}"
                                  onsubmit="return confirm('Yakin hapus mobil ini?')">
                                @csrf
                                @method('DELETE')

                                <button
                                    class="rounded-full bg-red-100 px-4 py-2 text-xs font-semibold text-red-700">
                                    Delete
                                </button>
                            </form>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-span-full rounded-[30px] bg-white p-10 text-center text-[#6B6B6B]">
                    Belum ada data mobil.
                </div>

            @endforelse

        </div>

        <div class="mt-8">
            {{ $cars->links() }}
        </div>

    </div>

</section>

@endsection
@extends('admin.layout')

@section('admin-title', 'Manage Cars')

@section('admin-content')

@if ($errors->any())
    <div class="mb-6 rounded-2xl bg-red-100 px-5 py-4 text-sm text-red-800">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ $action }}" enctype="multipart/form-data" class="rounded-[34px] bg-white p-6 shadow-[0_18px_55px_rgba(0,0,0,0.06)] sm:p-8">
    @csrf

    @if ($method !== 'POST')
        @method($method)
    @endif

    <div class="grid gap-4 sm:grid-cols-2">

        <div>
            <label class="mb-2 block text-[10px] font-bold uppercase tracking-[0.18em] text-[#8C7B62]">
                Category
            </label>

            <select name="category"
                    required
                    class="w-full rounded-2xl border border-black/10 bg-[#F8F3EC] px-5 py-4 text-sm outline-none focus:border-[#B07A45]">

                @foreach (['scooter', 'sport','harley'] as $category)
                    <option value="{{ $category }}" {{ old('category', $motorcycle->category ?? '') === $category ? 'selected' : '' }}>
                        {{ ucfirst($category) }}
                    </option>
                @endforeach

            </select>
        </div>

        <div>
            <label class="mb-2 block text-[10px] font-bold uppercase tracking-[0.18em] text-[#8C7B62]">
                motorcycle Name
            </label>

            <input
                name="name"
                value="{{ old('name', $motorcycle->name ?? '') }}"
                required
                placeholder="Yamaha NMAX 155"
                class="w-full rounded-2xl border border-black/10 bg-[#F8F3EC] px-5 py-4 text-sm outline-none focus:border-[#B07A45]">
        </div>

    </div>

    <div class="mt-4 grid gap-4 sm:grid-cols-2">

        <div>
            <label class="mb-2 block text-[10px] font-bold uppercase tracking-[0.18em] text-[#8C7B62]">
                Price Per Day USD
            </label>

            <input
                type="number"
                name="price_per_day"
                value="{{ old('price_per_day', $motorcycle->price_per_day ?? '') }}"
                required
                placeholder="220"
                class="w-full rounded-2xl border border-black/10 bg-[#F8F3EC] px-5 py-4 text-sm outline-none focus:border-[#B07A45]">
        </div>

        <div>
            <label class="mb-2 block text-[10px] font-bold uppercase tracking-[0.18em] text-[#8C7B62]">
                Image File Name
            </label>

            <input
            type="file"
            name="image"
            accept="image/*"
            class="w-full rounded-2xl border border-black/10 bg-[#F6F6F3] px-5 py-4 text-sm">

        @if (!empty($tour?->image))
            <div class="mt-4 rounded-2xl bg-[#F6F6F3] p-4">
                <p class="mb-3 text-xs text-[#777]">Current Image</p>
                <img src="{{ asset('storage/' . $tour->image) }}"
                    class="h-40 w-full rounded-2xl object-cover"
                    alt="{{ $tour->package_name }}">
            </div>
        @endif
        </div>

    </div>

    <div class="mt-4 grid gap-4 sm:grid-cols-2">

        <div>
            <label class="mb-2 block text-[10px] font-bold uppercase tracking-[0.18em] text-[#8C7B62]">
                Tag
            </label>

            <input
                name="tag"
                value="{{ old('tag', $motorcycle->tag ?? '') }}"
                placeholder="Best Seller"
                class="w-full rounded-2xl border border-black/10 bg-[#F8F3EC] px-5 py-4 text-sm outline-none focus:border-[#B07A45]">
        </div>

        <div>
            <label class="mb-2 block text-[10px] font-bold uppercase tracking-[0.18em] text-[#8C7B62]">
                cc
            </label>

            <input
                name="cc"
                value="{{ old('cc', $motorcycle->cc ?? '') }}"
                placeholder="155 CC"
                class="w-full rounded-2xl border border-black/10 bg-[#F8F3EC] px-5 py-4 text-sm outline-none focus:border-[#B07A45]">
        </div>

    </div>

    <div class="mt-4 grid gap-4 sm:grid-cols-2">

        <div>
            <label class="mb-2 block text-[10px] font-bold uppercase tracking-[0.18em] text-[#8C7B62]">
                fuel
            </label>

            <input
                name="fuel"
                value="{{ old('fuel', $motorcycle->fuel ?? '') }}"
                placeholder="Petrol"
                class="w-full rounded-2xl border border-black/10 bg-[#F8F3EC] px-5 py-4 text-sm outline-none focus:border-[#B07A45]">
        </div>

        <div>
            <label class="mb-2 block text-[10px] font-bold uppercase tracking-[0.18em] text-[#8C7B62]">
                transmission
            </label>

            <input
                name="transmission"
                value="{{ old('transmission', $motorcycle->transmission ?? '') }}"
                placeholder="Automatic"
                class="w-full rounded-2xl border border-black/10 bg-[#F8F3EC] px-5 py-4 text-sm outline-none focus:border-[#B07A45]">
        </div>

    </div>

    <div class="mt-4">
        <label class="mb-2 block text-[10px] font-bold uppercase tracking-[0.18em] text-[#8C7B62]">
            Description
        </label>

        <textarea
            name="description"
            rows="5"
            placeholder="Premium open-top roadster designed for scenic coastal drives..."
            class="w-full rounded-2xl border border-black/10 bg-[#F8F3EC] px-5 py-4 text-sm outline-none focus:border-[#B07A45]">{{ old('description', $motorcycle->description ?? '') }}</textarea>
    </div>

    <label class="mt-5 flex items-center gap-3 text-sm font-semibold text-[#1A1A1A]">
        <input
            type="checkbox"
            name="is_active"
            value="1"
            {{ old('is_active', $motorcycle->is_active ?? true) ? 'checked' : '' }}
            class="h-4 w-4 rounded border-black/20">
        Show this motorcycle on website
    </label>

    <div class="mt-8 flex flex-col gap-3 sm:flex-row">

        <button
            type="submit"
            class="inline-flex items-center justify-center rounded-full bg-[#1A1A1A] px-7 py-4 text-[11px] font-bold uppercase tracking-[0.08em] text-white transition hover:bg-[#B07A45]">
            Save motorcycle
        </button>

        <a href="{{ route('admin.motorcycles.index') }}"
           class="inline-flex items-center justify-center rounded-full border border-black/10 px-7 py-4 text-[11px] font-bold uppercase tracking-[0.08em] text-[#1A1A1A]">
            Cancel
        </a>

    </div>

</form>
@endsection
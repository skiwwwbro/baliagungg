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
            <label class="mb-2 block text-xs font-semibold text-[#777]">
                Category
            </label>

            <select name="category"
                    required
                    class="w-full rounded-2xl border border-black/10 bg-[#F6F6F3] px-5 py-4 text-sm">

                @foreach (['scenic', 'romantic', 'vip', 'adventure'] as $category)
                    <option value="{{ $category }}"
                        {{ old('category', $tour->category ?? '') == $category ? 'selected' : '' }}>
                        {{ ucfirst($category) }}
                    </option>
                @endforeach

            </select>
        </div>

        <div>
            <label class="mb-2 block text-xs font-semibold text-[#777]">
                Package Name
            </label>

            <input
                type="text"
                name="package_name"
                value="{{ old('package_name', $tour->package_name ?? '') }}"
                placeholder="Uluwatu Cliff Flight"
                required
                class="w-full rounded-2xl border border-black/10 bg-[#F6F6F3] px-5 py-4 text-sm">
        </div>

    </div>

    <div class="mt-4 grid gap-4 sm:grid-cols-2">

        <div>
            <label class="mb-2 block text-xs font-semibold text-[#777]">
                Price
            </label>

            <input
                type="number"
                name="price"
                value="{{ old('price', $tour->price ?? '') }}"
                placeholder="875"
                required
                class="w-full rounded-2xl border border-black/10 bg-[#F6F6F3] px-5 py-4 text-sm">
        </div>

        <div>
            <label class="mb-2 block text-xs font-semibold text-[#777]">
                Image File
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
            <label class="mb-2 block text-xs font-semibold text-[#777]">
                Tag
            </label>

            <input
                type="text"
                name="tag"
                value="{{ old('tag', $tour->tag ?? '') }}"
                placeholder="Best Seller"
                class="w-full rounded-2xl border border-black/10 bg-[#F6F6F3] px-5 py-4 text-sm">
        </div>

        <div>
            <label class="mb-2 block text-xs font-semibold text-[#777]">
                Duration
            </label>

            <input
                type="text"
                name="duration"
                value="{{ old('duration', $tour->duration ?? '') }}"
                placeholder="15 Minutes"
                class="w-full rounded-2xl border border-black/10 bg-[#F6F6F3] px-5 py-4 text-sm">
        </div>

    </div>

    <div class="mt-4 grid gap-4 sm:grid-cols-2">

        <div>
            <label class="mb-2 block text-xs font-semibold text-[#777]">
                Passenger
            </label>

            <input
                type="text"
                name="passenger"
                value="{{ old('passenger', $tour->passenger ?? '') }}"
                placeholder="Up To 3 Pax"
                class="w-full rounded-2xl border border-black/10 bg-[#F6F6F3] px-5 py-4 text-sm">
        </div>

        <div>
            <label class="mb-2 block text-xs font-semibold text-[#777]">
                Route
            </label>

            <input
                type="text"
                name="route"
                value="{{ old('route', $tour->route ?? '') }}"
                placeholder="Uluwatu Coast"
                class="w-full rounded-2xl border border-black/10 bg-[#F6F6F3] px-5 py-4 text-sm">
        </div>

    </div>

    <div class="mt-4">
        <label class="mb-2 block text-xs font-semibold text-[#777]">
            Description
        </label>

        <textarea
            name="description"
            rows="5"
            class="w-full rounded-2xl border border-black/10 bg-[#F6F6F3] px-5 py-4 text-sm">{{ old('description', $tour->description ?? '') }}</textarea>
    </div>

    <label class="mt-5 flex items-center gap-3 text-sm font-semibold">
        <input
            type="checkbox"
            name="is_active"
            value="1"
            {{ old('is_active', $tour->is_active ?? true) ? 'checked' : '' }}>
        Show this tour on website
    </label>

    <div class="mt-8 flex gap-3">
        <button
            type="submit"
            class="rounded-full bg-[#171717] px-7 py-4 text-sm font-semibold text-white">
            Save Tour
        </button>

        <a href="{{ route('admin.helicopter-tours.index') }}"
           class="rounded-full border border-black/10 px-7 py-4 text-sm font-semibold">
            Cancel
        </a>
    </div>

</form>
@endsection
@extends('admin.layout')

@section('admin-title', 'Manage Cars')

@section('admin-content')

<section class="min-h-screen bg-[#F5F1EB] px-5 py-12 sm:px-6 lg:px-10">

    <div class="mx-auto max-w-[900px]">

        <div class="mb-10">
            <p class="mb-3 text-[10px] font-semibold uppercase tracking-[0.28em] text-[#B07A45]">
                Admin Dashboard
            </p>

            <h1 class="font-serif text-[42px] leading-[0.95] text-[#1A1A1A] sm:text-[56px]">
                Add New Car
            </h1>
        </div>

        @include('admin.cars.form', [
            'action' => route('admin.cars.store'),
            'method' => 'POST',
            'car' => null,
        ])

    </div>

</section>

@endsection
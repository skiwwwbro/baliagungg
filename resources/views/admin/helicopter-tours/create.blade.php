@extends('admin.layout')

@section('admin-title', 'Add Helicopter Tour')

@section('admin-content')

<div class="mx-auto max-w-[900px]">

    <div class="mb-8">
        <h2 class="text-[32px] font-semibold tracking-[-0.04em]">
            Add Helicopter Tour
        </h2>
        <p class="mt-1 text-sm text-[#777]">
            Create a new helicopter package.
        </p>
    </div>

    @include('admin.helicopter-tours.form', [
        'action' => route('admin.helicopter-tours.store'),
        'method' => 'POST',
        'tour' => null,
    ])

</div>

@endsection
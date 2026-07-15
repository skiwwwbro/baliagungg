@extends('admin.layout')

@section('admin-title', 'Edit Helicopter Tour')

@section('admin-content')

<div class="mx-auto max-w-[900px]">

    <div class="mb-8">
        <h2 class="text-[32px] font-semibold tracking-[-0.04em]">
            Edit Helicopter Tour
        </h2>
        <p class="mt-1 text-sm text-[#777]">
            Update helicopter package details.
        </p>
    </div>

    @include('admin.helicopter-tours.form', [
        'action' => route('admin.helicopter-tours.update', $helicopterTour),
        'method' => 'PUT',
        'tour' => $helicopterTour,
    ])

</div>

@endsection
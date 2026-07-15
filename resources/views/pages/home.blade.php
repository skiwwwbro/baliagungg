@extends('layouts.app')


@section('title','Bali Agung Trans | Premium Car Rental Bali')

@section('description',
'Premium Car Rental, Motorcycle Rental, Helicopter Tour, Airport Transfer and Chauffeur Service in Bali.')


@section('content')


<div class="mx-auto w-full max-w-[1680px] overflow-hidden bg-[#F5F1EB]">

    @include('sections.navbar')

    

    @include('sections.hero')


    @include('sections.experience')

    @include('sections.fleet')

    @include('sections.why-us')

    @include('sections.curated')

    @include('sections.testimonials')

    @include('sections.cta')

    @include('sections.footer')

</div>

@endsection
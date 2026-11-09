@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 lg:py-16">
    <!-- Header Section -->
    <div class="text-center max-w-2xl mx-auto mb-10 sm:mb-12 lg:mb-16">
        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-serif text-brand-pink mb-3">Visual Sanctuary</h2>
        <p class="text-neutral-400 text-sm sm:text-base">Take a glimpse inside our serene treatment rooms, luxurious amenities, and exquisite results.</p>
    </div>

    <!-- Gallery Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6">
        @foreach($galleries as $gallery)
            <div class="overflow-hidden rounded-2xl border border-neutral-800 group bg-neutral-900 shadow-md">
                <img src="{{ asset('storage/' . $gallery->image) }}" 
                     alt="{{ $gallery->title }}" 
                     class="w-full h-56 sm:h-64 object-cover group-hover:scale-105 transition duration-500">
            </div>
        @endforeach
    </div>
</div>
@endsection
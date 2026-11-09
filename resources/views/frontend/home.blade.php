@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative bg-neutral-950 py-16 sm:py-20 lg:py-24 px-4 sm:px-6 lg:px-8 overflow-hidden">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">
        <div class="space-y-4 sm:space-y-6 text-center lg:text-left">
            <span class="text-brand-pink tracking-widest uppercase text-xs font-semibold block">Luxury Sanctuary & Wellness</span>
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-serif leading-tight text-white">Revitalize Your Mind, Body & Soul</h1>
            <p class="text-neutral-400 text-base sm:text-lg max-w-xl mx-auto lg:mx-0">Step into a world of pure relaxation, organic treatments, and bespoke beauty care tailored just for you.</p>
            <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start space-y-3 sm:space-y-0 sm:space-x-4 pt-2">
                <a href="{{ route('appointment') }}" class="w-full sm:w-auto text-center bg-brand-pink text-black font-semibold px-8 py-3.5 rounded-full hover:bg-brand-pinkhover transition shadow-md">Book Appointment</a>
                <a href="{{ route('services') }}" class="w-full sm:w-auto text-center border border-neutral-700 text-white px-8 py-3.5 rounded-full hover:border-brand-pink transition">Explore Services</a>
            </div>
        </div>
        <div>
            <img src="https://images.unsplash.com/photo-1540555700478-4be289fbecef?auto=format&fit=crop&q=80&w=1000" alt="Luxury Spa Interior" class="rounded-2xl shadow-2xl border border-neutral-800 object-cover w-full h-[300px] sm:h-[350px] lg:h-[400px]">
        </div>
    </div>
</section>

<!-- Featured Services -->
<section class="py-16 sm:py-20 px-4 sm:px-6 lg:px-8 bg-neutral-900/50">
    <div class="max-w-7xl mx-auto text-center">
        <h2 class="text-2xl sm:text-3xl font-serif mb-3 text-brand-pink">Featured Treatments</h2>
        <p class="text-neutral-400 text-sm sm:text-base mb-10 sm:mb-12 max-w-xl mx-auto">Discover our most sought-after signature therapies crafted for absolute rejuvenation.</p>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 sm:gap-8 text-left">
            @forelse($services as $service)
                <div class="bg-neutral-900 border border-neutral-800 rounded-2xl p-5 sm:p-6 space-y-4 shadow-md flex flex-col justify-between">
                    <div>
                        @if($service->image)
                            <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="w-full h-48 object-cover rounded-xl mb-4">
                        @else
                            <img src="https://images.unsplash.com/photo-1519823551278-64ac92734fb1?auto=format&fit=crop&q=80&w=600" alt="Spa Treatment" class="w-full h-48 object-cover rounded-xl mb-4">
                        @endif
                        <div class="flex justify-between items-start gap-2">
                            <h3 class="text-lg sm:text-xl font-serif text-white">{{ $service->title }}</h3>
                            <span class="text-brand-pink font-bold whitespace-nowrap">${{ $service->price }}</span>
                        </div>
                        <p class="text-neutral-400 text-xs sm:text-sm line-clamp-2 mt-2">{{ $service->description }}</p>
                    </div>
                    <div class="text-xs text-neutral-500 pt-2 border-t border-neutral-800/80">
                        Duration: {{ $service->duration_minutes }} Minutes
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-8 text-neutral-500">
                    <p>No featured services available yet.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 lg:py-16">
    <div class="text-center max-w-2xl mx-auto mb-10 sm:mb-12 lg:mb-16">
        <span class="text-brand-pink uppercase tracking-widest text-xs font-semibold block">Bespoke Wellness & Care</span>
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-serif text-white mt-2 mb-3">Our Signature Services</h2>
        <p class="text-neutral-400 text-sm sm:text-base">Explore our comprehensive menu of therapeutic massages, advanced facial treatments, and premium aesthetic rituals.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 lg:gap-8">
        @forelse($services as $service)
            <div class="bg-neutral-900 border border-neutral-800 rounded-2xl overflow-hidden flex flex-col justify-between hover:border-brand-pink/50 transition duration-300 shadow-md">
                <div>
                    @if($service->image)
                        <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="w-full h-48 sm:h-52 object-cover">
                    @else
                        <img src="https://images.unsplash.com/photo-1544161515-4ab6ce6db874?auto=format&fit=crop&q=80&w=600" alt="Spa Service" class="w-full h-48 sm:h-52 object-cover">
                    @endif
                    <div class="p-5 sm:p-6 space-y-3">
                        <div class="flex justify-between items-start gap-2">
                            <h3 class="text-lg sm:text-xl font-serif text-white">{{ $service->title }}</h3>
                            <span class="text-brand-pink font-semibold whitespace-nowrap">${{ $service->price }}</span>
                        </div>
                        <p class="text-neutral-400 text-xs sm:text-sm leading-relaxed line-clamp-3">{{ $service->description }}</p>
                    </div>
                </div>
                
                <div class="p-5 sm:p-6 flex justify-between items-center text-xs sm:text-sm text-neutral-400 border-t border-neutral-800/60 mt-4 pt-4">
                    <span class="flex items-center gap-1">⏱ {{ $service->duration_minutes }} Minutes</span>
                    <a href="{{ route('appointment') }}" class="text-brand-pink font-semibold hover:underline">Book Now →</a>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12 text-neutral-500">
                <p>No services available at the moment.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
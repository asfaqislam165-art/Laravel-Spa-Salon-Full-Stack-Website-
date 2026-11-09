@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 lg:py-16">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">
        <div>
            <img src="https://images.unsplash.com/photo-1507652313519-d4e9174996dd?auto=format&fit=crop&q=80&w=1000" 
                 alt="About Aura Spa" 
                 class="rounded-2xl border border-neutral-800 w-full h-[280px] sm:h-[380px] lg:h-[450px] object-cover shadow-lg">
        </div>
        <div class="space-y-4 sm:space-y-6">
            <span class="text-brand-pink uppercase tracking-widest text-xs font-semibold block">Our Story & Philosophy</span>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-serif text-white leading-tight">A Haven of Tranquility & Modern Beauty Artistry</h2>
            <p class="text-neutral-400 text-sm sm:text-base leading-relaxed">
                Founded with a vision to create an escape from the fast-paced modern world, Aura Luxury Spa & Salon combines timeless holistic healing with cutting-edge aesthetic treatments. Every detail is carefully designed to soothe your senses.
            </p>
            <div class="grid grid-cols-2 gap-4 sm:gap-6 pt-4 border-t border-neutral-800">
                <div>
                    <h3 class="text-2xl sm:text-3xl font-serif text-brand-pink mb-1">10+</h3>
                    <p class="text-neutral-400 text-xs sm:text-sm">Years of Excellence</p>
                </div>
                <div>
                    <h3 class="text-2xl sm:text-3xl font-serif text-brand-pink mb-1">15k+</h3>
                    <p class="text-neutral-400 text-xs sm:text-sm">Happy Clients</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
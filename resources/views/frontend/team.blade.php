@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 lg:py-16">
    <div class="text-center max-w-2xl mx-auto mb-10 sm:mb-12 lg:mb-16">
        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-serif text-brand-pink mb-3">Meet Our Expert Specialists</h2>
        <p class="text-neutral-400 text-sm sm:text-base">Certified professionals dedicated to delivering personalized care and exceptional beauty transformations.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 lg:gap-8">
        @forelse($staffs as $staff)
            <div class="bg-neutral-900 border border-neutral-800 rounded-2xl overflow-hidden text-center p-5 sm:p-6 space-y-4 shadow-md hover:border-brand-pink/50 transition duration-300 flex flex-col items-center justify-between">
                <div class="space-y-4 w-full">
                    @if($staff->image)
                        <img src="{{ asset('storage/' . $staff->image) }}" alt="{{ $staff->name }}" class="w-28 h-28 sm:w-32 sm:h-32 object-cover rounded-full mx-auto border-2 border-brand-pink shadow-md">
                    @else
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&q=80&w=400" alt="Staff Member" class="w-28 h-28 sm:w-32 sm:h-32 object-cover rounded-full mx-auto border-2 border-brand-pink shadow-md">
                    @endif
                    <h3 class="text-lg sm:text-xl font-serif text-white">{{ $staff->name }}</h3>
                    <p class="text-brand-pink text-xs sm:text-sm font-medium">{{ $staff->role ?? $staff->specialization }}</p>
                    <p class="text-neutral-400 text-xs sm:text-sm truncate max-w-xs mx-auto">{{ $staff->email }}</p>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center text-neutral-500 py-12">
                <p>No staff members found.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
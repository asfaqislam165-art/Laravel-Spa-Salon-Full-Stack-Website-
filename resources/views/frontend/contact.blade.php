@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 py-8 sm:py-12 space-y-6 sm:space-y-8">
    
    <!-- Page Header -->
    <div class="text-center space-y-2">
        <h1 class="text-2xl sm:text-3xl font-serif text-brand-pink">Get in Touch</h1>
        <p class="text-neutral-400 text-xs sm:text-sm">We'd love to hear from you. Send us a message below.</p>
    </div>

    <!-- Success Message Alert -->
    @if(session('success'))
        <div class="bg-emerald-950/60 border border-emerald-500 text-emerald-300 p-4 rounded-xl text-xs sm:text-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- Contact Form -->
    <form action="{{ route('contact.store') }}" method="POST" class="bg-neutral-900 p-5 sm:p-8 rounded-2xl border border-neutral-800 space-y-5 sm:space-y-6 shadow-xl">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 sm:gap-6">
            <!-- Name Field -->
            <div>
                <label class="block text-xs text-neutral-400 mb-1">Your Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required placeholder="Enter your name" class="w-full bg-neutral-800 p-3 rounded-lg border-none text-white ring-1 ring-neutral-700 focus:ring-2 focus:ring-brand-pink outline-none transition text-sm sm:text-base">
                @error('name') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>
            
            <!-- Email Field -->
            <div>
                <label class="block text-xs text-neutral-400 mb-1">Your Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required placeholder="Enter your email" class="w-full bg-neutral-800 p-3 rounded-lg border-none text-white ring-1 ring-neutral-700 focus:ring-2 focus:ring-brand-pink outline-none transition text-sm sm:text-base">
                @error('email') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Subject Field -->
        <div>
            <label class="block text-xs text-neutral-400 mb-1">Subject</label>
            <input type="text" name="subject" value="{{ old('subject', 'General Inquiry') }}" required class="w-full bg-neutral-800 p-3 rounded-lg border-none text-white ring-1 ring-neutral-700 focus:ring-2 focus:ring-brand-pink outline-none transition text-sm sm:text-base">
            @error('subject') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
        </div>

        <!-- Message Field -->
        <div>
            <label class="block text-xs text-neutral-400 mb-1">Message</label>
            <textarea name="message" rows="5" required placeholder="Write your message here..." class="w-full bg-neutral-800 p-3 rounded-lg border-none text-white ring-1 ring-neutral-700 focus:ring-2 focus:ring-brand-pink outline-none transition text-sm sm:text-base">{{ old('message') }}</textarea>
            @error('message') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full bg-brand-pink text-black font-semibold py-3.5 sm:py-3 px-4 rounded-xl hover:opacity-90 transition text-sm sm:text-base shadow-md cursor-pointer">
            Send Message
        </button>
    </form>

</div>
@endsection
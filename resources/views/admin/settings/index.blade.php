@extends('layouts.admin')

@section('admin-content')
<div class="space-y-6 max-w-2xl mx-auto py-4 sm:py-6 px-2 sm:px-0">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <h1 class="text-2xl sm:text-3xl font-serif text-brand-pink tracking-wide">Website Settings</h1>
    </div>

    <!-- Success Alert -->
    @if(session('success'))
        <div class="bg-emerald-950/80 text-emerald-300 p-4 rounded-xl border border-emerald-500/50 text-xs sm:text-sm shadow-lg">
            {{ session('success') }}
        </div>
    @endif

    <!-- Settings Form Card -->
    <form action="{{ route('admin.settings.update') }}" method="POST" class="bg-neutral-900 p-5 sm:p-8 rounded-2xl border border-neutral-800 space-y-5 shadow-2xl">
        @csrf
        
        <!-- Website Name -->
        <div>
            <label class="block text-xs font-medium text-neutral-300 mb-1">Website Name</label>
            <input type="text" name="site_name" value="{{ old('site_name', $setting->site_name ?? 'Aura Luxury Spa') }}" required placeholder="Aura Luxury Spa" class="w-full bg-neutral-800 p-3 rounded-lg border-none text-white ring-1 ring-neutral-700 focus:ring-2 focus:ring-brand-pink outline-none transition text-sm sm:text-base">
            @error('site_name') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Contact Email -->
        <div>
            <label class="block text-xs font-medium text-neutral-300 mb-1">Contact Email</label>
            <input type="email" name="email" value="{{ old('email', $setting->email ?? '') }}" required placeholder="contact@auraspa.com" class="w-full bg-neutral-800 p-3 rounded-lg border-none text-white ring-1 ring-neutral-700 focus:ring-2 focus:ring-brand-pink outline-none transition text-sm sm:text-base">
            @error('email') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Phone Number -->
        <div>
            <label class="block text-xs font-medium text-neutral-300 mb-1">Phone Number</label>
            <input type="text" name="phone" value="{{ old('phone', $setting->phone ?? '') }}" required placeholder="+1 (555) 000-0000" class="w-full bg-neutral-800 p-3 rounded-lg border-none text-white ring-1 ring-neutral-700 focus:ring-2 focus:ring-brand-pink outline-none transition text-sm sm:text-base">
            @error('phone') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Physical Address -->
        <div>
            <label class="block text-xs font-medium text-neutral-300 mb-1">Physical Address</label>
            <textarea name="address" rows="3" required placeholder="Enter salon physical address..." class="w-full bg-neutral-800 p-3 rounded-lg border-none text-white ring-1 ring-neutral-700 focus:ring-2 focus:ring-brand-pink outline-none transition text-sm sm:text-base resize-none">{{ old('address', $setting->address ?? '') }}</textarea>
            @error('address') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full sm:w-auto bg-brand-pink text-black px-6 py-3.5 sm:py-3 rounded-lg font-semibold text-sm sm:text-base hover:bg-brand-pinkhover transition shadow-md cursor-pointer">
            Save Settings
        </button>
    </form>
</div>
@endsection
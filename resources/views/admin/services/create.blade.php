@extends('layouts.admin')

@section('admin-content')
<div class="max-w-2xl mx-auto py-4 sm:py-6 px-2 sm:px-0 space-y-6">
    <!-- Header & Back Button -->
    <div class="flex items-center justify-between">
        <h1 class="text-2xl sm:text-3xl font-serif text-brand-pink tracking-wide">Add New Service</h1>
        <a href="{{ route('admin.services.index') }}" class="text-xs sm:text-sm text-neutral-400 hover:text-white transition">← Back</a>
    </div>

    <!-- Add Service Form Card -->
    <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" class="bg-neutral-900 p-5 sm:p-8 rounded-2xl border border-neutral-800 space-y-5 shadow-2xl">
        @csrf
        
        <!-- Service Title -->
        <div>
            <label class="block text-xs font-medium text-neutral-300 mb-1">Service Title</label>
            <input type="text" name="title" value="{{ old('title') }}" required placeholder="e.g. Deep Tissue Massage" class="w-full bg-neutral-800 p-3 rounded-lg border-none text-white ring-1 ring-neutral-700 focus:ring-2 focus:ring-brand-pink outline-none transition text-sm sm:text-base">
            @error('title') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Price & Duration Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-medium text-neutral-300 mb-1">Price ($)</label>
                <input type="number" step="0.01" name="price" value="{{ old('price') }}" required placeholder="99.00" class="w-full bg-neutral-800 p-3 rounded-lg border-none text-white ring-1 ring-neutral-700 focus:ring-2 focus:ring-brand-pink outline-none transition text-sm sm:text-base">
                @error('price') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-xs font-medium text-neutral-300 mb-1">Duration (Minutes)</label>
                <input type="number" name="duration_minutes" value="{{ old('duration_minutes') }}" required placeholder="60" class="w-full bg-neutral-800 p-3 rounded-lg border-none text-white ring-1 ring-neutral-700 focus:ring-2 focus:ring-brand-pink outline-none transition text-sm sm:text-base">
                @error('duration_minutes') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <!-- Description -->
        <div>
            <label class="block text-xs font-medium text-neutral-300 mb-1">Description</label>
            <textarea name="description" rows="4" required placeholder="Describe the service details..." class="w-full bg-neutral-800 p-3 rounded-lg border-none text-white ring-1 ring-neutral-700 focus:ring-2 focus:ring-brand-pink outline-none transition text-sm sm:text-base resize-none">{{ old('description') }}</textarea>
            @error('description') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Service Image File Input -->
        <div>
            <label class="block text-xs font-medium text-neutral-300 mb-1">Service Image</label>
            <input type="file" name="image" class="w-full text-xs sm:text-sm text-neutral-400 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-neutral-800 file:text-brand-pink hover:file:bg-neutral-700 file:cursor-pointer cursor-pointer">
            @error('image') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full bg-brand-pink text-black font-semibold py-3.5 sm:py-3 rounded-lg hover:bg-brand-pinkhover transition text-sm sm:text-base shadow-md cursor-pointer">
            Save Service
        </button>
    </form>
</div>
@endsection
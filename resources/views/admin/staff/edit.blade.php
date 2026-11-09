@extends('layouts.admin')

@section('admin-content')
<div class="space-y-6 max-w-2xl mx-auto py-4 sm:py-6 px-2 sm:px-0">
    <!-- Header & Back Button -->
    <div class="flex items-center justify-between">
        <h1 class="text-2xl sm:text-3xl font-serif text-brand-pink tracking-wide">Edit Staff Specialist</h1>
        <a href="{{ route('admin.staff.index') }}" class="text-xs sm:text-sm text-neutral-400 hover:text-white transition">← Back</a>
    </div>

    <!-- Edit Staff Form Card -->
    <form action="{{ route('admin.staff.update', $staff->id) }}" method="POST" enctype="multipart/form-data" class="bg-neutral-900 p-5 sm:p-8 rounded-2xl border border-neutral-800 space-y-5 shadow-2xl">
        @csrf 
        @method('PUT')
        
        <!-- Full Name -->
        <div>
            <label class="block text-xs font-medium text-neutral-300 mb-1">Full Name</label>
            <input type="text" name="name" value="{{ old('name', $staff->name) }}" required placeholder="e.g. Sarah Jenkins" class="w-full bg-neutral-800 p-3 rounded-lg border-none text-white ring-1 ring-neutral-700 focus:ring-2 focus:ring-brand-pink outline-none transition text-sm sm:text-base">
            @error('name') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
        </div>
        
        <!-- Specialization -->
        <div>
            <label class="block text-xs font-medium text-neutral-300 mb-1">Specialization</label>
            <input type="text" name="specialization" value="{{ old('specialization', $staff->specialization) }}" required placeholder="e.g. Senior Massage Therapist" class="w-full bg-neutral-800 p-3 rounded-lg border-none text-white ring-1 ring-neutral-700 focus:ring-2 focus:ring-brand-pink outline-none transition text-sm sm:text-base">
            @error('specialization') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
        </div>
        
        <!-- Email & Phone Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-medium text-neutral-300 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', $staff->email) }}" placeholder="sarah@auraspa.com" class="w-full bg-neutral-800 p-3 rounded-lg border-none text-white ring-1 ring-neutral-700 focus:ring-2 focus:ring-brand-pink outline-none transition text-sm sm:text-base">
                @error('email') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-xs font-medium text-neutral-300 mb-1">Phone</label>
                <input type="text" name="phone" value="{{ old('phone', $staff->phone) }}" placeholder="+1 (555) 000-0000" class="w-full bg-neutral-800 p-3 rounded-lg border-none text-white ring-1 ring-neutral-700 focus:ring-2 focus:ring-brand-pink outline-none transition text-sm sm:text-base">
                @error('phone') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
            </div>
        </div>
        
        <!-- Current Photo Preview & File Input -->
        <div class="space-y-2">
            @if($staff->image)
                <div>
                    <span class="block text-xs font-medium text-neutral-400 mb-1">Current Photo</span>
                    <img src="{{ asset('storage/' . $staff->image) }}" alt="{{ $staff->name }}" class="w-20 h-20 sm:w-24 sm:h-24 rounded-full object-cover border-2 border-neutral-700 shadow-md">
                </div>
            @endif
            <div>
                <label class="block text-xs font-medium text-neutral-300 mb-1">Update Photo (Optional)</label>
                <input type="file" name="image" class="w-full text-xs sm:text-sm text-neutral-400 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-neutral-800 file:text-brand-pink hover:file:bg-neutral-700 file:cursor-pointer cursor-pointer">
                @error('image') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
            </div>
        </div>
        
        <!-- Submit Button -->
        <button type="submit" class="w-full bg-brand-pink text-black font-semibold py-3.5 sm:py-3 rounded-lg hover:bg-brand-pinkhover transition text-sm sm:text-base shadow-md cursor-pointer">
            Update Staff
        </button>
    </form>
</div>
@endsection
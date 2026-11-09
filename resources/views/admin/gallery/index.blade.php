@extends('layouts.admin')

@section('admin-content')
<div class="space-y-6 sm:space-y-8">
    <h1 class="text-2xl sm:text-3xl font-serif text-brand-pink">Gallery Management</h1>

    @if(session('success'))
        <div class="bg-emerald-900/50 border border-emerald-500 text-emerald-200 p-3 sm:p-4 rounded-lg text-xs sm:text-sm">{{ session('success') }}</div>
    @endif

    <!-- Upload Form -->
    <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data" class="bg-neutral-900 p-5 sm:p-6 rounded-2xl border border-neutral-800 space-y-4 shadow-xl">
        @csrf
        <div>
            <label class="block text-xs font-medium text-neutral-300 mb-1">Image Title (Optional)</label>
            <input type="text" name="title" value="{{ old('title') }}" placeholder="Enter image title" class="w-full bg-neutral-800 text-white rounded-lg p-3 border-none text-sm sm:text-base ring-1 ring-neutral-700 focus:ring-2 focus:ring-brand-pink outline-none transition">
        </div>

        <div>
            <label class="block text-xs font-medium text-neutral-300 mb-1">Select Image File</label>
            <input type="file" name="image" required class="w-full text-xs sm:text-sm text-neutral-400 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-neutral-800 file:text-brand-pink hover:file:bg-neutral-700 file:cursor-pointer cursor-pointer">
        </div>

        <button type="submit" class="w-full sm:w-auto bg-brand-pink text-black px-6 py-3 sm:py-2.5 rounded-lg font-semibold text-sm sm:text-base hover:bg-brand-pinkhover transition shadow-md cursor-pointer">
            Upload Image
        </button>
    </form>

    <!-- Gallery Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6">
        @forelse($galleries as $gallery)
            <div class="bg-neutral-900 rounded-xl border border-neutral-800 overflow-hidden p-3.5 sm:p-4 space-y-3 shadow-md flex flex-col justify-between">
                <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title ?? 'Gallery Item' }}" class="w-full h-44 sm:h-48 object-cover rounded-lg">
                <div class="flex justify-between items-center text-xs sm:text-sm gap-2">
                    <span class="text-neutral-300 truncate font-medium">{{ $gallery->title ?? 'Gallery Item' }}</span>
                    <form action="{{ route('admin.gallery.delete', $gallery->id) }}" method="POST" onsubmit="return confirm('Delete this image?');" class="shrink-0">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-400 hover:text-red-300 font-semibold cursor-pointer transition">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12 text-neutral-500 text-sm">
                No images uploaded in the gallery yet.
            </div>
        @endforelse
    </div>
</div>
@endsection
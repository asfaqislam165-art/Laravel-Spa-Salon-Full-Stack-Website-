@extends('layouts.admin')

@section('admin-content')
<div class="space-y-6 sm:space-y-8 max-w-7xl mx-auto py-4 sm:py-6">
    <div class="flex justify-between items-center">
        <h1 class="text-2xl sm:text-3xl font-serif text-brand-pink tracking-wide">Manage Services</h1>
    </div>

    @if(session('success'))
        <div class="bg-emerald-950/80 text-emerald-300 p-4 rounded-xl border border-emerald-500/50 text-xs sm:text-sm shadow-lg">
            {{ session('success') }}
        </div>
    @endif

    <!-- Add Service Inline Form -->
    <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" class="bg-neutral-900 p-5 sm:p-6 rounded-2xl border border-neutral-800 space-y-4 shadow-xl">
        @csrf
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            <div>
                <input type="text" name="title" value="{{ old('title') }}" placeholder="Service Title" required class="w-full bg-neutral-800 p-3 rounded-lg border-none text-white ring-1 ring-neutral-700 focus:ring-2 focus:ring-brand-pink outline-none transition text-sm sm:text-base">
                @error('title') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <input type="number" step="0.01" name="price" value="{{ old('price') }}" placeholder="Price ($)" required class="w-full bg-neutral-800 p-3 rounded-lg border-none text-white ring-1 ring-neutral-700 focus:ring-2 focus:ring-brand-pink outline-none transition text-sm sm:text-base">
                @error('price') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <input type="number" name="duration_minutes" value="{{ old('duration_minutes') }}" placeholder="Duration (Minutes)" required class="w-full bg-neutral-800 p-3 rounded-lg border-none text-white ring-1 ring-neutral-700 focus:ring-2 focus:ring-brand-pink outline-none transition text-sm sm:text-base">
                @error('duration_minutes') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div>
            <textarea name="description" placeholder="Service Description" rows="2" required class="w-full bg-neutral-800 p-3 rounded-lg border-none text-white ring-1 ring-neutral-700 focus:ring-2 focus:ring-brand-pink outline-none transition text-sm sm:text-base resize-none">{{ old('description') }}</textarea>
            @error('description') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <input type="file" name="image" class="w-full text-xs sm:text-sm text-neutral-400 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-neutral-800 file:text-brand-pink hover:file:bg-neutral-700 file:cursor-pointer cursor-pointer">
            @error('image') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="w-full sm:w-auto bg-brand-pink text-black px-6 py-3 sm:py-2.5 rounded-lg font-semibold text-sm sm:text-base hover:bg-brand-pinkhover transition shadow-md cursor-pointer">
            Add New Service
        </button>
    </form>

    <!-- Services Table Card -->
    <div class="bg-neutral-900 rounded-2xl border border-neutral-800 overflow-hidden shadow-2xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm whitespace-nowrap sm:whitespace-normal">
                <thead class="bg-neutral-800/80 text-neutral-400 uppercase text-xs tracking-wider border-b border-neutral-700">
                    <tr>
                        <th class="p-3 sm:p-4">Title</th>
                        <th class="p-3 sm:p-4">Price</th>
                        <th class="p-3 sm:p-4">Duration</th>
                        <th class="p-3 sm:p-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-neutral-800/60">
                    @forelse($services as $service)
                        <tr class="hover:bg-neutral-800/40 transition">
                            <td class="p-3 sm:p-4 font-medium text-white">{{ $service->title }}</td>
                            <td class="p-3 sm:p-4 text-brand-pink font-semibold">${{ $service->price }}</td>
                            <td class="p-3 sm:p-4 text-neutral-300">{{ $service->duration_minutes }} mins</td>
                            <td class="p-3 sm:p-4 text-right space-x-3">
                                <a href="{{ route('admin.services.edit', $service->id) }}" class="text-sky-400 hover:text-sky-300 font-semibold text-xs transition">Edit</a>
                                <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('Delete this service?');" class="inline-block">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-300 font-semibold text-xs cursor-pointer transition">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-8 text-center text-neutral-500 text-sm">
                                No services found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
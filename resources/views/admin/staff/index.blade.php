@extends('layouts.admin')

@section('admin-content')
<div class="space-y-6 sm:space-y-8 max-w-7xl mx-auto py-4 sm:py-6 px-2 sm:px-0">
    <!-- Header & Add Button -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <h1 class="text-2xl sm:text-3xl font-serif text-brand-pink tracking-wide">Manage Staff</h1>
        <a href="{{ route('admin.staff.create') }}" class="w-fit bg-brand-pink text-black px-5 py-2.5 rounded-xl font-semibold text-xs sm:text-sm hover:bg-brand-pinkhover transition shadow-md cursor-pointer flex items-center gap-1.5">
            + Add New Staff
        </a>
    </div>

    <!-- Success Alert -->
    @if(session('success'))
        <div class="bg-emerald-950/80 text-emerald-300 p-4 rounded-xl border border-emerald-500/50 text-xs sm:text-sm shadow-lg">
            {{ session('success') }}
        </div>
    @endif

    <!-- Staff Table Card -->
    <div class="bg-neutral-900 rounded-2xl border border-neutral-800 overflow-hidden shadow-2xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm whitespace-nowrap sm:whitespace-normal">
                <thead class="bg-neutral-800/80 text-neutral-400 uppercase text-xs tracking-wider border-b border-neutral-700">
                    <tr>
                        <th class="p-3 sm:p-4">Image</th>
                        <th class="p-3 sm:p-4">Name</th>
                        <th class="p-3 sm:p-4">Specialization</th>
                        <th class="p-3 sm:p-4">Email</th>
                        <th class="p-3 sm:p-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-neutral-800/60">
                    @forelse($staffs as $staff)
                        <tr class="hover:bg-neutral-800/40 transition">
                            <td class="p-3 sm:p-4">
                                @if($staff->image)
                                    <img src="{{ asset('storage/' . $staff->image) }}" alt="{{ $staff->name }}" class="w-10 h-10 object-cover rounded-full border border-neutral-700 shadow-sm">
                                @else
                                    <div class="w-10 h-10 rounded-full bg-neutral-800 border border-neutral-700 flex items-center justify-center text-neutral-400 text-xs font-semibold">
                                        {{ strtoupper(substr($staff->name, 0, 2)) }}
                                    </div>
                                @endif
                            </td>
                            <td class="p-3 sm:p-4 font-medium text-white">{{ $staff->name }}</td>
                            <td class="p-3 sm:p-4 text-neutral-300">{{ $staff->specialization }}</td>
                            <td class="p-3 sm:p-4 text-neutral-400">{{ $staff->email ?? 'N/A' }}</td>
                            <td class="p-3 sm:p-4 text-right space-x-3">
                                <a href="{{ route('admin.staff.edit', $staff->id) }}" class="text-sky-400 hover:text-sky-300 font-semibold text-xs transition">Edit</a>
                                <form action="{{ route('admin.staff.destroy', $staff->id) }}" method="POST" onsubmit="return confirm('Delete this staff member?');" class="inline-block">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-300 font-semibold text-xs cursor-pointer transition">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center text-neutral-500 text-sm">
                                No staff members found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
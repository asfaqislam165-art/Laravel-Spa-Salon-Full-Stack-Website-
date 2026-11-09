@extends('layouts.admin')

@section('admin-content')
<div class="space-y-6 max-w-7xl mx-auto py-4 sm:py-6 px-2 sm:px-0">
    <!-- Header & Total Count -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <h1 class="text-2xl sm:text-3xl font-serif text-brand-pink tracking-wide">Contact Messages</h1>
        <span class="text-xs bg-neutral-800 text-neutral-400 px-3 py-1.5 rounded-full border border-neutral-700 w-fit">
            Total Messages: {{ count($messages) }}
        </span>
    </div>

    <!-- Success Alert -->
    @if(session('success'))
        <div class="bg-emerald-950/80 text-emerald-300 p-4 rounded-xl border border-emerald-500/50 text-xs sm:text-sm shadow-lg">
            {{ session('success') }}
        </div>
    @endif

    <!-- Messages Table Card -->
    <div class="bg-neutral-900 border border-neutral-800 rounded-2xl overflow-hidden shadow-2xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-sm text-neutral-300">
                <thead class="bg-neutral-800/80 text-neutral-400 uppercase text-xs tracking-wider border-b border-neutral-700">
                    <tr>
                        <th class="p-3 sm:p-4 font-semibold">Name</th>
                        <th class="p-3 sm:p-4 font-semibold">Email</th>
                        <th class="p-3 sm:p-4 font-semibold">Subject</th>
                        <th class="p-3 sm:p-4 font-semibold">Date</th>
                        <th class="p-3 sm:p-4 text-right font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-neutral-800/60">
                    @forelse($messages as $msg)
                        <tr class="hover:bg-neutral-800/40 transition">
                            <td class="p-3 sm:p-4 font-medium text-white whitespace-nowrap">{{ $msg->name }}</td>
                            <td class="p-3 sm:p-4 text-neutral-400 whitespace-nowrap">{{ $msg->email }}</td>
                            <td class="p-3 sm:p-4 text-neutral-200 max-w-xs truncate">{{ $msg->subject }}</td>
                            <td class="p-3 sm:p-4 text-xs text-neutral-500 whitespace-nowrap">{{ $msg->created_at->format('d M Y, h:i A') }}</td>
                            <td class="p-3 sm:p-4 text-right whitespace-nowrap space-x-2">
                                <a href="{{ route('admin.messages.show', $msg->id) }}" class="inline-flex items-center px-3 py-1.5 bg-sky-600/80 hover:bg-sky-600 text-white rounded-lg text-xs font-medium transition shadow cursor-pointer">
                                    View
                                </a>
                                <form action="{{ route('admin.messages.delete', $msg->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this message?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-red-600/80 hover:bg-red-600 text-white rounded-lg text-xs font-medium transition shadow cursor-pointer">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center text-neutral-500 text-sm">
                                No contact messages found in the database.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination Links -->
        @if(method_exists($messages, 'links'))
            <div class="p-4 border-t border-neutral-800 bg-neutral-900/50">
                {{ $messages->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
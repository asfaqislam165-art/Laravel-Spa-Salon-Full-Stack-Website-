@extends('layouts.admin')

@section('admin-content')
<div class="max-w-3xl mx-auto py-4 sm:py-6 px-2 sm:px-0 space-y-6">
    <!-- Header & Back Button -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <h1 class="text-2xl sm:text-3xl font-serif text-brand-pink tracking-wide">Message Details</h1>
        <a href="{{ route('admin.messages.index') }}" class="px-4 py-2 bg-neutral-800 hover:bg-neutral-700 text-neutral-300 rounded-xl text-xs font-medium transition border border-neutral-700 shadow w-fit">
            &larr; Back to List
        </a>
    </div>

    <!-- Main Message Card -->
    <div class="bg-neutral-900 border border-neutral-800 rounded-2xl p-5 sm:p-8 space-y-6 shadow-2xl">
        <!-- Sender Information Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 sm:gap-6 border-b border-neutral-800 pb-6">
            <div>
                <span class="block text-xs uppercase tracking-wider text-neutral-500 font-semibold mb-1">Sender Name</span>
                <span class="text-white font-medium text-base">{{ $message->name }}</span>
            </div>
            <div>
                <span class="block text-xs uppercase tracking-wider text-neutral-500 font-semibold mb-1">Email Address</span>
                <a href="mailto:{{ $message->email }}" class="text-sky-400 hover:underline text-base font-medium break-all">{{ $message->email }}</a>
            </div>
        </div>

        <!-- Subject -->
        <div>
            <span class="block text-xs uppercase tracking-wider text-neutral-500 font-semibold mb-1">Subject</span>
            <span class="text-white font-semibold text-base sm:text-lg block">{{ $message->subject }}</span>
        </div>

        <!-- Message Content Box -->
        <div>
            <span class="block text-xs uppercase tracking-wider text-neutral-500 font-semibold mb-2">Message Content</span>
            <div class="bg-neutral-950/60 p-4 sm:p-5 rounded-xl text-neutral-200 text-sm leading-relaxed whitespace-pre-line border border-neutral-800/80">
                {{ $message->message }}
            </div>
        </div>

        <!-- Footer: Date & Delete Action -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pt-4 border-t border-neutral-800 text-xs text-neutral-500">
            <span>Received on: {{ $message->created_at->format('d M Y, h:i A') }}</span>
            
            <form action="{{ route('admin.messages.delete', $message->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-full sm:w-auto px-4 py-2.5 bg-red-600/80 hover:bg-red-600 text-white rounded-xl text-xs font-medium transition shadow cursor-pointer">
                    Delete Message
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
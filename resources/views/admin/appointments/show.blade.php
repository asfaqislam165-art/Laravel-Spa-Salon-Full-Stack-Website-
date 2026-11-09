@extends('layouts.admin')

@section('admin-content')
<div class="max-w-xl mx-auto bg-neutral-900 border border-neutral-800 rounded-2xl p-5 sm:p-8 space-y-6 shadow-xl">
    <div class="flex justify-between items-center border-b border-neutral-800 pb-4">
        <h1 class="text-xl sm:text-2xl font-serif text-brand-pink">Appointment Details</h1>
        <a href="{{ route('admin.appointments.index') }}" class="text-xs sm:text-sm text-neutral-400 hover:text-white transition">← Back</a>
    </div>

    <div class="space-y-4 sm:space-y-5 text-sm">
        <div>
            <span class="text-neutral-500 block text-xs font-medium">Customer Name</span>
            <p class="text-base sm:text-lg font-medium text-white mt-0.5">{{ $appointment->customer_name }}</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <span class="text-neutral-500 block text-xs font-medium">Email</span>
                <p class="text-white mt-0.5 break-words">{{ $appointment->customer_email }}</p>
            </div>
            <div>
                <span class="text-neutral-500 block text-xs font-medium">Phone</span>
                <p class="text-white mt-0.5">{{ $appointment->customer_phone }}</p>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <span class="text-neutral-500 block text-xs font-medium">Service Booked</span>
                <p class="text-brand-pink font-medium mt-0.5">{{ $appointment->service->title ?? 'N/A' }}</p>
            </div>
            <div>
                <span class="text-neutral-500 block text-xs font-medium">Assigned Staff</span>
                <p class="text-white mt-0.5">{{ $appointment->staff->name ?? 'N/A' }}</p>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2 border-t border-neutral-800/60">
            <div>
                <span class="text-neutral-500 block text-xs font-medium">Date & Time</span>
                <p class="text-white mt-0.5">{{ $appointment->appointment_date }} <span class="text-brand-pink font-medium">at {{ $appointment->appointment_time }}</span></p>
            </div>
            <div>
                <span class="text-neutral-500 block text-xs font-medium">Status</span>
                <span class="px-3 py-1 rounded-full text-xs font-medium border {{ $appointment->status === 'Approved' ? 'border-emerald-500/50 text-emerald-400 bg-emerald-950/30' : ($appointment->status === 'Cancelled' ? 'border-red-500/50 text-red-400 bg-red-950/30' : 'border-brand-pink text-brand-pink bg-brand-pink/10') }} inline-block mt-1">
                    {{ $appointment->status }}
                </span>
            </div>
        </div>
    </div>
</div>
@endsection
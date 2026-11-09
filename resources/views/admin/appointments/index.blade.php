@extends('layouts.admin')

@section('admin-content')
<div class="space-y-6 sm:space-y-8">
    <h1 class="text-2xl sm:text-3xl font-serif text-brand-pink">Manage Appointments</h1>

    @if(session('success'))
        <div class="bg-emerald-900/50 border border-emerald-500 text-emerald-200 p-3 sm:p-4 rounded-lg text-xs sm:text-sm">{{ session('success') }}</div>
    @endif

    <div class="bg-neutral-900 rounded-xl border border-neutral-800 overflow-hidden shadow-xl">
        <!-- Responsive Table Container for Mobile Devices -->
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm whitespace-nowrap sm:whitespace-normal">
                <thead class="bg-neutral-800 text-neutral-400 text-xs uppercase tracking-wider">
                    <tr>
                        <th class="p-3 sm:p-4">Customer</th>
                        <th class="p-3 sm:p-4">Service & Staff</th>
                        <th class="p-3 sm:p-4">Date & Time</th>
                        <th class="p-3 sm:p-4">Status</th>
                        <th class="p-3 sm:p-4 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-neutral-800">
                    @forelse($appointments as $app)
                        <tr class="hover:bg-neutral-800/40 transition">
                            <td class="p-3 sm:p-4">
                                <p class="font-medium text-white">{{ $app->customer_name }}</p>
                                <p class="text-xs text-neutral-400">{{ $app->customer_phone }}</p>
                            </td>
                            <td class="p-3 sm:p-4">
                                <p class="text-white">{{ $app->service->title ?? 'N/A' }}</p>
                                <p class="text-xs text-neutral-400">With: {{ $app->staff->name ?? 'N/A' }}</p>
                            </td>
                            <td class="p-3 sm:p-4 text-neutral-300">
                                {{ $app->appointment_date }} <br> <span class="text-xs text-brand-pink font-medium">{{ $app->appointment_time }}</span>
                            </td>
                            <td class="p-3 sm:p-4">
                                <span class="px-3 py-1 rounded-full text-xs font-medium border {{ $app->status === 'Approved' ? 'border-emerald-500/50 text-emerald-400 bg-emerald-950/30' : ($app->status === 'Cancelled' ? 'border-red-500/50 text-red-400 bg-red-950/30' : 'border-neutral-700 text-neutral-300 bg-neutral-800') }}">
                                    {{ $app->status }}
                                </span>
                            </td>
                            <td class="p-3 sm:p-4 text-right space-x-2">
                                <form action="{{ route('admin.appointments.updateStatus', $app->id) }}" method="POST" class="inline">
                                    @csrf @method('PATCH')
                                    <input type="hidden" name="status" value="Approved">
                                    <button type="submit" class="text-emerald-400 hover:text-emerald-300 font-semibold text-xs cursor-pointer transition">Approve</button>
                                </form>
                                <form action="{{ route('admin.appointments.updateStatus', $app->id) }}" method="POST" class="inline">
                                    @csrf @method('PATCH')
                                    <input type="hidden" name="status" value="Cancelled">
                                    <button type="submit" class="text-red-400 hover:text-red-300 font-semibold text-xs cursor-pointer transition">Cancel</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-8 text-neutral-500 text-sm">
                                No appointments found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
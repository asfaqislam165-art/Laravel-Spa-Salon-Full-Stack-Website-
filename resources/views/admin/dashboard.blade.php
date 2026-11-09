@extends('layouts.admin')

@section('admin-content')
<div class="space-y-6 sm:space-y-8 max-w-7xl mx-auto py-4 sm:py-6 px-2 sm:px-0">
    <!-- Welcome Banner -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center bg-neutral-900 border border-neutral-800 p-5 sm:p-6 rounded-2xl shadow-xl gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-serif text-white">Welcome Back, {{ Auth::user()->name ?? 'Admin' }}!</h1>
            <p class="text-neutral-400 text-xs sm:text-sm mt-1">Here is a quick overview of your luxury spa and salon metrics.</p>
        </div>
        <div class="shrink-0">
            <span class="inline-block bg-brand-pink/10 border border-brand-pink text-brand-pink px-3.5 py-1.5 sm:px-4 sm:py-2 rounded-xl text-[10px] sm:text-xs font-semibold tracking-wider uppercase">
                Active System
            </span>
        </div>
    </div>

    <!-- Key Metrics Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
        <div class="bg-neutral-900 p-5 sm:p-6 rounded-2xl border border-neutral-800 shadow-md">
            <p class="text-xs uppercase tracking-wider text-neutral-400 font-medium">Total Appointments</p>
            <h3 class="text-2xl sm:text-3xl font-serif text-white mt-2">{{ $totalAppointments ?? $appointmentsCount ?? 0 }}</h3>
        </div>
        <div class="bg-neutral-900 p-5 sm:p-6 rounded-2xl border border-neutral-800 shadow-md">
            <p class="text-xs uppercase tracking-wider text-neutral-400 font-medium">Total Services</p>
            <h3 class="text-2xl sm:text-3xl font-serif text-white mt-2">{{ $totalServices ?? $servicesCount ?? 0 }}</h3>
        </div>
        <div class="bg-neutral-900 p-5 sm:p-6 rounded-2xl border border-neutral-800 shadow-md">
            <p class="text-xs uppercase tracking-wider text-neutral-400 font-medium">Staff Members</p>
            <h3 class="text-2xl sm:text-3xl font-serif text-white mt-2">{{ $totalStaff ?? $staffCount ?? 0 }}</h3>
        </div>
        <div class="bg-neutral-900 p-5 sm:p-6 rounded-2xl border border-neutral-800 shadow-md">
            <p class="text-xs uppercase tracking-wider text-neutral-400 font-medium">Pending Requests</p>
            <h3 class="text-2xl sm:text-3xl font-serif text-brand-pink mt-2">{{ $pendingAppointments ?? $messagesCount ?? 0 }}</h3>
        </div>
    </div>

    <!-- Chart and Recent Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-8">
        <!-- Chart.js Graph -->
        <div class="bg-neutral-900 p-5 sm:p-6 rounded-2xl border border-neutral-800 shadow-xl">
            <h3 class="text-base sm:text-lg font-medium text-white mb-4">Appointment Statistics</h3>
            <div class="relative h-64 sm:h-72">
                <canvas id="appointmentChart"></canvas>
            </div>
        </div>

        <!-- Recent Appointments -->
        <div class="bg-neutral-900 p-5 sm:p-6 rounded-2xl border border-neutral-800 shadow-xl flex flex-col justify-between">
            <div>
                <h3 class="text-base sm:text-lg font-medium text-white mb-4">Recent Bookings</h3>
                <div class="space-y-3 sm:space-y-4">
                    @isset($recentAppointments)
                        @forelse($recentAppointments as $app)
                            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center p-3 bg-neutral-800/60 rounded-xl border border-neutral-800 gap-2 sm:gap-0">
                                <div class="min-w-0">
                                    <p class="font-medium text-sm text-white truncate">{{ $app->customer_name }}</p>
                                    <p class="text-xs text-neutral-400 mt-0.5 truncate">
                                        {{ $app->service->title ?? 'Spa Service' }} with {{ $app->staff->name ?? 'Specialist' }}
                                    </p>
                                </div>
                                <span class="shrink-0 text-[11px] sm:text-xs px-2.5 py-1 rounded-full border border-brand-pink text-brand-pink bg-brand-pink/5 font-medium">
                                    {{ ucfirst($app->status) }}
                                </span>
                            </div>
                        @empty
                            <p class="text-neutral-500 text-sm text-center py-8">No recent appointments found.</p>
                        @endforelse
                    @else
                        <p class="text-neutral-500 text-sm text-center py-8">No booking data available.</p>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart Script -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const canvasElement = document.getElementById('appointmentChart');
        if (canvasElement && typeof Chart !== 'undefined') {
            const ctx = canvasElement.getContext('2d');
            const chartData = @json($chartData ?? []);
            
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: Object.keys(chartData),
                    datasets: [{
                        label: 'Appointments',
                        data: Object.values(chartData),
                        backgroundColor: '#E8B4BC',
                        borderRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: { 
                            beginAtZero: true, 
                            grid: { color: '#262626' },
                            ticks: { color: '#a3a3a3', font: { size: 11 } }
                        },
                        x: { 
                            grid: { display: false },
                            ticks: { color: '#a3a3a3', font: { size: 11 } }
                        }
                    },
                    plugins: {
                        legend: { labels: { color: '#ffffff', font: { size: 12 } } }
                    }
                }
            });
        }
    });
</script>
@endsection
@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 py-8 sm:py-12">
    <h2 class="text-2xl sm:text-3xl font-serif text-brand-pink text-center mb-2">Book Your Sanctuary Experience</h2>
    <p class="text-neutral-400 text-center text-sm sm:text-base mb-6 sm:mb-8">Select your treatment, preferred specialist, and ideal time slot.</p>

    @if(session('success'))
        <div class="bg-emerald-900/50 border border-emerald-500 text-emerald-200 p-4 rounded-lg mb-6 text-center text-sm sm:text-base">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-900/50 border border-red-500 text-red-200 p-4 rounded-lg mb-6 text-sm sm:text-base">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('appointment.store') }}" method="POST" class="bg-neutral-900 p-4 sm:p-8 rounded-2xl border border-neutral-800 space-y-5 sm:space-y-6">
        @csrf
        
        <!-- Service & Staff Selection -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
            <div>
                <label class="block text-sm text-neutral-300 mb-2">Select Service</label>
                <select name="service_id" required class="w-full bg-neutral-800 text-white rounded-lg p-3 border-none ring-1 ring-neutral-700 text-sm sm:text-base">
                    <option value="">-- Choose Service --</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}">{{ $service->title }} (${{ $service->price }})</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm text-neutral-300 mb-2">Select Staff Specialist</label>
                <select name="staff_id" required class="w-full bg-neutral-800 text-white rounded-lg p-3 border-none ring-1 ring-neutral-700 text-sm sm:text-base">
                    <option value="">-- Choose Specialist --</option>
                    @foreach($staffs as $staff)
                        <option value="{{ $staff->id }}">{{ $staff->name }} ({{ $staff->specialization }})</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Customer Info Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-6">
            <div>
                <label class="block text-sm text-neutral-300 mb-2">Your Name</label>
                <input type="text" name="customer_name" required class="w-full bg-neutral-800 text-white rounded-lg p-3 border-none ring-1 ring-neutral-700 text-sm sm:text-base">
            </div>
            <div>
                <label class="block text-sm text-neutral-300 mb-2">Your Email</label>
                <input type="email" name="customer_email" required class="w-full bg-neutral-800 text-white rounded-lg p-3 border-none ring-1 ring-neutral-700 text-sm sm:text-base">
            </div>
            <div>
                <label class="block text-sm text-neutral-300 mb-2">Phone Number</label>
                <input type="text" name="customer_phone" required class="w-full bg-neutral-800 text-white rounded-lg p-3 border-none ring-1 ring-neutral-700 text-sm sm:text-base">
            </div>
        </div>

        <!-- Date & Time Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
            <div>
                <label class="block text-sm text-neutral-300 mb-2">Date</label>
                <input type="date" name="appointment_date" min="{{ date('Y-m-d') }}" required class="w-full bg-neutral-800 text-white rounded-lg p-3 border-none ring-1 ring-neutral-700 text-sm sm:text-base">
            </div>
            <div>
                <label class="block text-sm text-neutral-300 mb-2">Time Slot</label>
                <input type="time" name="appointment_time" required class="w-full bg-neutral-800 text-white rounded-lg p-3 border-none ring-1 ring-neutral-700 text-sm sm:text-base">
            </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full bg-brand-pink text-black font-semibold py-3.5 sm:py-4 px-4 rounded-lg hover:bg-brand-pinkhover transition border-none text-sm sm:text-base shadow-md cursor-pointer">
            Confirm Booking Request
        </button>
    </form>
</div>
@endsection
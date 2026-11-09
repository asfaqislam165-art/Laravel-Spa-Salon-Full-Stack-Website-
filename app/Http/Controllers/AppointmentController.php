<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use App\Models\Staff;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function create()
    {
        $services = Service::all();
        $staffs = Staff::all();
        return view('frontend.appointment', compact('services', 'staffs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'staff_id' => 'required|exists:staff,id',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required',
        ]);

        // Duplicate Slot Prevention Check
        $exists = Appointment::where('staff_id', $request->staff_id)
            ->where('appointment_date', $request->appointment_date)
            ->where('appointment_time', $request->appointment_time)
            ->whereIn('status', ['Pending', 'Approved'])
            ->exists();

        if ($exists) {
            return back()->withInput()->withErrors(['appointment_time' => 'Selected staff member is already booked for this time slot. Please select another time or staff.']);
        }

        Appointment::create($request->all());

        return redirect()->back()->with('success', 'Your appointment request has been submitted successfully!');
    }
}
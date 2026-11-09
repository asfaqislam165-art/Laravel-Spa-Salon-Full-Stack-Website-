<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Staff;
use App\Models\Appointment;
use App\Models\Message;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalAppointments = Appointment::count();
        $totalServices = Service::count();
        $totalStaff = Staff::count();
        $pendingAppointments = Appointment::where('status', 'pending')->count();
        $recentAppointments = Appointment::with(['service', 'staff'])->latest()->take(5)->get();
        
        $chartData = [
            'Sat' => 4,
            'Sun' => 8,
            'Mon' => 5,
            'Tue' => 10,
            'Wed' => 7,
            'Thu' => 12,
            'Fri' => 15
        ];

        return view('admin.dashboard', compact(
            'totalAppointments',
            'totalServices',
            'totalStaff',
            'pendingAppointments',
            'recentAppointments',
            'chartData'
        ));
    }
}
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\AppointmentController as AdminAppointmentController;
use App\Models\Service;
use App\Models\Staff;
use App\Models\Gallery;
use App\Models\Message;
use App\Models\Setting;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    $services = Service::latest()->take(3)->get();
    return view('frontend.home', compact('services'));
})->name('home');

Route::get('/about', function () {
    return view('frontend.about');
})->name('about');

Route::get('/services', function () {
    $services = Service::all();
    return view('frontend.services', compact('services'));
})->name('services');

Route::get('/team', function () {
    $staffs = Staff::all();
    return view('frontend.team', compact('staffs'));
})->name('team');

Route::get('/gallery', function () {
    $galleries = Gallery::all();
    return view('frontend.gallery', compact('galleries'));
})->name('gallery');

Route::get('/appointment', [AppointmentController::class, 'create'])->name('appointment');
Route::post('/appointment', [AppointmentController::class, 'store'])->name('appointment.store');

Route::get('/contact', function () {
    $setting = Setting::first();
    return view('frontend.contact', compact('setting'));
})->name('contact');

// --- Frontend Contact Form Store Route ---
Route::post('/contact', function (Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'subject' => 'nullable|string|max:255',
        'message' => 'required|string',
    ]);

    Message::create([
        'name' => $request->name,
        'email' => $request->email,
        'subject' => $request->input('subject', 'General Inquiry'),
        'message' => $request->message,
    ]);

    return redirect()->back()->with('success', 'Your message has been sent successfully!');
})->name('contact.store');

/*
|--------------------------------------------------------------------------
| Admin Panel Routes (Protected with Auth & Admin Middleware)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('services', ServiceController::class);
    Route::resource('staff', StaffController::class);
    
    Route::get('/appointments', [AdminAppointmentController::class, 'index'])->name('appointments.index');
    Route::get('/appointments/{appointment}', [AdminAppointmentController::class, 'show'])->name('appointments.show');
    Route::patch('/appointments/{appointment}/status', [AdminAppointmentController::class, 'updateStatus'])->name('appointments.updateStatus');
    Route::delete('/appointments/{appointment}', [AdminAppointmentController::class, 'destroy'])->name('appointments.destroy');

    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
    Route::delete('/gallery/{gallery}', [GalleryController::class, 'destroy'])->name('gallery.delete');

    // --- Admin Panel Message Routes ---
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{message}', [MessageController::class, 'show'])->name('messages.show');
    Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.delete');

    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
});

/*
|--------------------------------------------------------------------------
| User Dashboard & Profile Routes (For Normal Authenticated Users)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
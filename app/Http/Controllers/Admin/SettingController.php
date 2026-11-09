<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index() {
        $setting = Setting::first() ?? new Setting();
        return view('admin.settings.index', compact('setting'));
    }

    public function update(Request $request) {
        $data = $request->validate([
            'site_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'address' => 'required|string',
        ]);

        Setting::updateOrCreate(['id' => 1], $data);
        return redirect()->route('admin.settings.index')->with('success', 'Website settings updated successfully!');
    }
}
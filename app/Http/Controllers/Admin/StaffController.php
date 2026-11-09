<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class StaffController extends Controller
{
    public function index()
    {
        $staffs = Staff::latest()->get();
        return view('admin.staff.index', compact('staffs'));
    }

    public function create()
    {
        return view('admin.staff.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'email' => 'nullable|email|unique:staff,email', // ইউনিক ভ্যালিডেশন যোগ করা হলো
            'phone' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'specialization', 'email', 'phone']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('staff', 'public');
        }

        Staff::create($data);

        return redirect()->route('admin.staff.index')->with('success', 'Staff added successfully!');
    }

    public function edit(Staff $staff)
    {
        return view('admin.staff.edit', compact('staff'));
    }

    public function update(Request $request, Staff $staff)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            // এডিটের সময় নিজের ইমেইল বাদ দিয়ে অন্য কারো সাথে যেন ডুপ্লিকেট না হয়
            'email' => ['nullable', 'email', Rule::unique('staff', 'email')->ignore($staff->id)],
            'phone' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'specialization', 'email', 'phone']);

        if ($request->hasFile('image')) {
            if ($staff->image) {
                Storage::disk('public')->delete($staff->image);
            }
            $data['image'] = $request->file('image')->store('staff', 'public');
        }

        $staff->update($data);

        return redirect()->route('admin.staff.index')->with('success', 'Staff updated successfully!');
    }

    public function destroy(Staff $staff)
    {
        if ($staff->image) {
            Storage::disk('public')->delete($staff->image);
        }
        
        $staff->delete();

        return redirect()->route('admin.staff.index')->with('success', 'Staff deleted successfully!');
    }
}
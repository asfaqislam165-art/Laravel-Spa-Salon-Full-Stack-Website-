<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index() {
        $galleries = Gallery::latest()->get();
        return view('admin.gallery.index', compact('galleries'));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('gallery', 'public');
        }

        Gallery::create($data);
        return redirect()->route('admin.gallery.index')->with('success', 'Image uploaded successfully!');
    }

    public function destroy(Gallery $gallery) {
        if($gallery->image) {
            Storage::disk('public')->delete($gallery->image);
        }
        $gallery->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'Image deleted successfully!');
    }
}
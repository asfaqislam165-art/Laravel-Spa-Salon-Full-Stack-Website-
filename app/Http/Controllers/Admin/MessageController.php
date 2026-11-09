<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    // সব মেসেজ লিস্ট দেখানোর জন্য
    public function index()
    {
        $messages = Message::latest()->paginate(10);
        return view('admin.messages.index', compact('messages'));
    }

    // নির্দিষ্ট একটি মেসেজ বিস্তারিত দেখানোর জন্য
    public function show(Message $message)
    {
        return view('admin.messages.show', compact('message'));
    }

    // মেসেজ ডিলিট করার জন্য
    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->route('admin.messages.index')->with('success', 'Message deleted successfully!');
    }
}
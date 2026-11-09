@php
    // ইউজার যদি অ্যাডমিন হয়, তবে অ্যাডমিন লেআউট (layouts.admin) পাবে।
    // আর সাধারণ ইউজার হলে ফ্রন্টএন্ড লেআউট (layouts.app) পাবে।
    $layout = (auth()->check() && auth()->user()->usertype === 'admin') ? 'layouts.admin' : 'layouts.app';
    $section = (auth()->check() && auth()->user()->usertype === 'admin') ? 'admin-content' : 'content';
@endphp

@extends($layout)

@section($section)
<div class="max-w-4xl mx-auto px-4 sm:px-6 py-8 sm:py-12 space-y-6 sm:space-y-8">
    <div class="space-y-1">
        <h1 class="text-2xl sm:text-3xl font-serif text-brand-pink">Profile & Security Settings</h1>
        <p class="text-neutral-400 text-xs sm:text-sm">Update your account profile information and security password.</p>
    </div>

    <!-- Update Profile Information -->
    <div class="bg-neutral-900 border border-neutral-800 rounded-2xl p-5 sm:p-6 shadow-xl">
        <h3 class="text-lg font-medium text-white mb-4">Profile Information</h3>
        
        <form method="post" action="{{ route('profile.update') }}" class="space-y-4">
            @csrf
            @method('patch')

            <div>
                <label class="block text-xs font-medium text-neutral-300 mb-1">Name</label>
                <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}" required 
                    class="w-full bg-neutral-800 text-white border border-neutral-700 rounded-lg p-3 text-sm focus:border-brand-pink outline-none transition">
                @error('name') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-xs font-medium text-neutral-300 mb-1">Email Address</label>
                <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}" required 
                    class="w-full bg-neutral-800 text-white border border-neutral-700 rounded-lg p-3 text-sm focus:border-brand-pink outline-none transition">
                @error('email') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center pt-2">
                <button type="submit" class="w-full sm:w-auto bg-brand-pink text-black font-semibold px-6 py-3 sm:py-2.5 rounded-lg text-sm hover:bg-brand-pinkhover transition shadow-md cursor-pointer text-center">
                    Save Changes
                </button>

                @if (session('status') === 'profile-updated')
                    <span class="text-xs text-emerald-400 mt-2 sm:mt-0 sm:ml-3 text-center sm:text-left">Saved successfully.</span>
                @endif
            </div>
        </form>
    </div>

    <!-- Update Password -->
    <div class="bg-neutral-900 border border-neutral-800 rounded-2xl p-5 sm:p-6 shadow-xl">
        <h3 class="text-lg font-medium text-white mb-4">Update Password</h3>
        
        <form method="post" action="{{ route('password.update') }}" class="space-y-4">
            @csrf
            @method('put')

            <div>
                <label class="block text-xs font-medium text-neutral-300 mb-1">Current Password</label>
                <input type="password" name="current_password" required 
                    class="w-full bg-neutral-800 text-white border border-neutral-700 rounded-lg p-3 text-sm focus:border-brand-pink outline-none transition">
                @error('current_password', 'updatePassword') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-xs font-medium text-neutral-300 mb-1">New Password</label>
                <input type="password" name="password" required 
                    class="w-full bg-neutral-800 text-white border border-neutral-700 rounded-lg p-3 text-sm focus:border-brand-pink outline-none transition">
                @error('password', 'updatePassword') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-xs font-medium text-neutral-300 mb-1">Confirm Password</label>
                <input type="password" name="password_confirmation" required 
                    class="w-full bg-neutral-800 text-white border border-neutral-700 rounded-lg p-3 text-sm focus:border-brand-pink outline-none transition">
                @error('password_confirmation', 'updatePassword') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center pt-2">
                <button type="submit" class="w-full sm:w-auto bg-brand-pink text-black font-semibold px-6 py-3 sm:py-2.5 rounded-lg text-sm hover:bg-brand-pinkhover transition shadow-md cursor-pointer text-center">
                    Update Password
                </button>

                @if (session('status') === 'password-updated')
                    <span class="text-xs text-emerald-400 mt-2 sm:mt-0 sm:ml-3 text-center sm:text-left">Password updated successfully.</span>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection
<x-guest-layout>
    <h2 class="text-2xl sm:text-3xl font-serif text-brand-pink text-center mb-6">Login Page</h2>

    <!-- Session Status (e.g. Password Reset Status) -->
    @if (session('status'))
        <div class="mb-4 text-xs sm:text-sm font-medium text-emerald-400 bg-emerald-950/50 p-3 rounded-lg border border-emerald-800">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-4 sm:space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <label class="block text-xs text-neutral-400 mb-1 font-medium">Email Address</label>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" 
                placeholder="Your Email"
                class="w-full bg-neutral-800 text-white rounded-lg p-3 border-none ring-1 ring-neutral-700 focus:ring-2 focus:ring-brand-pink outline-none transition text-sm sm:text-base">
            @error('email')
                <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <label class="block text-xs text-neutral-400 mb-1 font-medium">Password</label>
            <input type="password" name="password" required autocomplete="current-password" 
                placeholder="••••••••"
                class="w-full bg-neutral-800 text-white rounded-lg p-3 border-none ring-1 ring-neutral-700 focus:ring-2 focus:ring-brand-pink outline-none transition text-sm sm:text-base">
            @error('password')
                <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between text-xs sm:text-sm text-neutral-400 pt-1">
            <label class="flex items-center cursor-pointer select-none">
                <input type="checkbox" name="remember" class="rounded bg-neutral-800 border-neutral-700 text-brand-pink focus:ring-0 cursor-pointer w-4 h-4">
                <span class="ml-2">Remember me</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="hover:text-brand-pink transition">Forgot password?</a>
            @endif
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full bg-brand-pink text-black font-semibold py-3.5 sm:py-3 rounded-lg hover:bg-brand-pinkhover transition text-sm sm:text-base border-none shadow-md cursor-pointer">
            Log In
        </button>
    </form>

    <div class="mt-6 text-center text-xs sm:text-sm text-neutral-400">
        Don't have an account? 
        <a href="{{ route('register') }}" class="text-brand-pink font-semibold hover:underline">Register here</a>
    </div>
</x-guest-layout>
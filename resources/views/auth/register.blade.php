<x-guest-layout>
    <h2 class="text-2xl sm:text-3xl font-serif text-brand-pink text-center mb-6">Create Account</h2>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Name -->
        <div>
            <label class="block text-xs text-neutral-400 mb-1 font-medium">Full Name</label>
            <input type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" 
                placeholder="John Doe"
                class="w-full bg-neutral-800 text-white rounded-lg p-3 border-none ring-1 ring-neutral-700 focus:ring-2 focus:ring-brand-pink outline-none transition text-sm sm:text-base">
            @error('name')
                <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email Address -->
        <div>
            <label class="block text-xs text-neutral-400 mb-1 font-medium">Email Address</label>
            <input type="email" name="email" value="{{ old('email') }}" required autocomplete="username" 
                placeholder="admin@auraspa.com"
                class="w-full bg-neutral-800 text-white rounded-lg p-3 border-none ring-1 ring-neutral-700 focus:ring-2 focus:ring-brand-pink outline-none transition text-sm sm:text-base">
            @error('email')
                <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <label class="block text-xs text-neutral-400 mb-1 font-medium">Password</label>
            <input type="password" name="password" required autocomplete="new-password" 
                placeholder="••••••••"
                class="w-full bg-neutral-800 text-white rounded-lg p-3 border-none ring-1 ring-neutral-700 focus:ring-2 focus:ring-brand-pink outline-none transition text-sm sm:text-base">
            @error('password')
                <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div>
            <label class="block text-xs text-neutral-400 mb-1 font-medium">Confirm Password</label>
            <input type="password" name="password_confirmation" required autocomplete="new-password" 
                placeholder="••••••••"
                class="w-full bg-neutral-800 text-white rounded-lg p-3 border-none ring-1 ring-neutral-700 focus:ring-2 focus:ring-brand-pink outline-none transition text-sm sm:text-base">
            @error('password_confirmation')
                <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full bg-brand-pink text-black font-semibold py-3.5 sm:py-3 rounded-lg hover:bg-brand-pinkhover transition text-sm sm:text-base border-none mt-2 shadow-md cursor-pointer">
            Register Account
        </button>
    </form>

    <div class="mt-6 text-center text-xs sm:text-sm text-neutral-400">
        Already registered? 
        <a href="{{ route('login') }}" class="text-brand-pink font-semibold hover:underline">Log in here</a>
    </div>
</x-guest-layout>
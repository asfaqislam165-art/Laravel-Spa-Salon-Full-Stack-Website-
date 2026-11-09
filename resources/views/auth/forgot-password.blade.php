<x-guest-layout>
    <h2 class="text-2xl font-serif text-brand-pink text-center mb-4">Forgot Password</h2>
    
    <p class="text-xs text-neutral-400 text-center mb-6 leading-relaxed">
        Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
    </p>

    <!-- Session Status -->
    @if (session('status'))
        <div class="mb-4 text-xs font-medium text-emerald-400 bg-emerald-950/50 p-3 rounded-lg border border-emerald-800 text-center">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
        @csrf

        <!-- Email Address -->
        <div>
            <label class="block text-xs text-neutral-300 mb-1 font-medium">Email Address</label>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus
                class="w-full bg-neutral-800 text-white rounded-lg p-3 border border-neutral-700 text-sm focus:border-brand-pink outline-none"
                placeholder="admin@auraspa.com">
            @error('email')
                <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full bg-brand-pink text-black font-semibold py-3 rounded-lg hover:bg-brand-pinkhover transition text-sm mt-2">
            Email Password Reset Link
        </button>
    </form>

    <div class="mt-6 text-center text-xs text-neutral-400">
        Remembered your password? 
        <a href="{{ route('login') }}" class="text-brand-pink font-semibold hover:underline">Log in here</a>
    </div>
</x-guest-layout>
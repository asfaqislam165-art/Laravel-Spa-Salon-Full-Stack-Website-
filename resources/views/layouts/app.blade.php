<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Aura Luxury Spa') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        *:focus { outline: none !important; box-shadow: none !important; }
        body { background-color: #171717; color: #ffffff; font-family: sans-serif; }
    </style>
</head>
<body class="bg-brand-dark text-white flex flex-col min-h-screen overflow-x-hidden" x-data="{ mobileMenuOpen: false }">

    <!-- Header / Navbar -->
    <header class="border-b border-neutral-800 bg-brand-dark/95 backdrop-blur sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
            
            <!-- Left: Hamburger Toggle & Logo -->
            <div class="flex items-center space-x-3">
                <!-- Mobile Hamburger Menu Button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-neutral-300 hover:text-white p-1.5 rounded-lg bg-neutral-900 border border-neutral-800 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>

                <!-- Logo -->
                <a href="{{ route('home') }}" class="text-xl sm:text-2xl font-serif font-bold tracking-widest text-brand-pink">
                    AURA <span class="text-[10px] sm:text-xs tracking-normal font-sans text-white uppercase block">Spa & Salon</span>
                </a>
            </div>
            
            <!-- Desktop Menu Links -->
            <nav class="hidden md:flex space-x-6 text-sm font-medium items-center">
                <a href="{{ route('home') }}" class="hover:text-brand-pink transition">Home</a>
                <a href="{{ route('about') }}" class="hover:text-brand-pink transition">About Us</a>
                <a href="{{ route('services') }}" class="hover:text-brand-pink transition">Services</a>
                <a href="{{ route('team') }}" class="hover:text-brand-pink transition">Our Team</a>
                <a href="{{ route('gallery') }}" class="hover:text-brand-pink transition">Gallery</a>
                <a href="{{ route('contact') }}" class="hover:text-brand-pink transition">Contact Us</a>
            </nav>

            <!-- Auth & Booking Action Buttons -->
            <div class="flex items-center space-x-3 sm:space-x-4">
                <a href="{{ route('appointment') }}" class="bg-brand-pink text-black font-semibold px-4 py-2 rounded-full hover:bg-brand-pinkhover transition text-xs sm:text-sm hidden sm:inline-block shadow-md">
                    Book Appointment
                </a>

                @if (Route::has('login'))
                    @auth
                        @if (auth()->user()->usertype === 'admin')
                            <!-- ১. যদি অ্যাডমিন হয় -->
                            <a href="{{ route('admin.dashboard') }}" class="text-xs sm:text-sm font-medium border border-brand-pink text-brand-pink px-3 sm:px-4 py-1.5 sm:py-2 rounded-full hover:bg-brand-pink hover:text-black transition whitespace-nowrap">
                                Admin Dashboard
                            </a>
                        @else
                            <!-- ২. যদি সাধারণ ইউজার হয় (প্রোফাইল ও লগআউট) -->
                            <a href="{{ route('profile.edit') }}" class="text-xs sm:text-sm font-medium border border-neutral-700 text-neutral-200 px-3 sm:px-4 py-1.5 sm:py-2 rounded-full hover:border-brand-pink hover:text-brand-pink transition whitespace-nowrap">
                                My Profile
                            </a>

                            <form method="POST" action="{{ route('logout') }}" class="hidden sm:inline">
                                @csrf
                                <button type="submit" class="text-xs sm:text-sm text-red-400 hover:text-red-300 transition font-medium cursor-pointer">
                                    Logout
                                </button>
                            </form>
                        @endif
                    @else
                        <!-- ৩. যদি কেউ লগইন করা না থাকে -->
                        <a href="{{ route('login') }}" class="text-xs sm:text-sm text-neutral-300 hover:text-brand-pink transition font-medium">
                            Login
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-xs sm:text-sm bg-neutral-800 border border-neutral-700 text-white px-3 sm:px-4 py-1.5 sm:py-2 rounded-full hover:border-brand-pink transition font-medium whitespace-nowrap">
                                Register
                            </a>
                        @endif
                    @endauth
                @endif
            </div>

        </div>
    </header>

    <!-- Mobile Slide-over Menu Drawer -->
    <div x-show="mobileMenuOpen" @click="mobileMenuOpen = false" class="fixed inset-0 z-40 bg-black/60 md:hidden transition-opacity" style="display: none;"></div>
    <div :class="mobileMenuOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-50 w-72 bg-neutral-900 border-r border-neutral-800 flex flex-col md:hidden transition-transform duration-300 ease-in-out shadow-2xl">
        <div class="p-5 border-b border-neutral-800 flex justify-between items-center">
            <span class="text-lg font-serif font-bold text-brand-pink">AURA MENU</span>
            <button @click="mobileMenuOpen = false" class="text-neutral-400 hover:text-white p-1">✕</button>
        </div>
        <nav class="flex-grow p-5 space-y-3 text-sm font-medium overflow-y-auto">
            <a href="{{ route('home') }}" class="block py-2 text-neutral-200 hover:text-brand-pink transition">Home</a>
            <a href="{{ route('about') }}" class="block py-2 text-neutral-200 hover:text-brand-pink transition">About Us</a>
            <a href="{{ route('services') }}" class="block py-2 text-neutral-200 hover:text-brand-pink transition">Services</a>
            <a href="{{ route('team') }}" class="block py-2 text-neutral-200 hover:text-brand-pink transition">Our Team</a>
            <a href="{{ route('gallery') }}" class="block py-2 text-neutral-200 hover:text-brand-pink transition">Gallery</a>
            <a href="{{ route('contact') }}" class="block py-2 text-neutral-200 hover:text-brand-pink transition">Contact Us</a>
            <div class="pt-4 border-t border-neutral-800">
                <a href="{{ route('appointment') }}" class="block text-center bg-brand-pink text-black font-semibold px-4 py-3 rounded-xl hover:bg-brand-pinkhover transition shadow-md">
                    Book Appointment
                </a>
            </div>
            @auth
                @if(auth()->user()->usertype !== 'admin')
                    <div class="pt-2">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left py-2 text-red-400 hover:text-red-300 transition font-medium">
                                Logout
                            </button>
                        </form>
                    </div>
                @endif
            @endauth
        </nav>
    </div>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-neutral-900 border-t border-neutral-800 py-8 sm:py-10 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-brand-pink font-serif text-lg sm:text-xl mb-2">AURA LUXURY SPA & SALON</p>
            <p class="text-neutral-400 text-xs sm:text-sm">© {{ date('Y') }} All Rights Reserved. Pure Elegance & Sanctuary.</p>
        </div>
    </footer>

</body>
</html>
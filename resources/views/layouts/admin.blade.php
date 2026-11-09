<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Aura Spa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        *:focus { outline: none !important; box-shadow: none !important; }
        body { background-color: #171717; color: #ffffff; font-family: sans-serif; }
    </style>
</head>
<body class="bg-neutral-950 text-white flex min-h-screen overflow-x-hidden" x-data="{ sidebarOpen: false }">

    <!-- Mobile Sidebar Backdrop -->
    <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 z-40 bg-black/60 lg:hidden transition-opacity" style="display: none;"></div>

    <!-- Sidebar Menu -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed lg:static inset-y-0 left-0 z-50 w-64 bg-neutral-900 border-r border-neutral-800 flex flex-col min-h-screen transition-transform duration-300 ease-in-out lg:translate-x-0">
        <div class="p-5 sm:p-6 border-b border-neutral-800 flex items-center justify-between">
            <h1 class="text-lg sm:text-xl font-serif text-brand-pink font-bold">AURA ADMIN</h1>
            <!-- Close Button for Mobile -->
            <button @click="sidebarOpen = false" class="lg:hidden text-neutral-400 hover:text-white p-1">
                ✕
            </button>
        </div>
        
        <nav class="flex-grow p-4 space-y-1.5 text-sm overflow-y-auto">
            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-3 rounded-lg hover:bg-neutral-800 text-neutral-200 transition">Dashboard</a>
            <a href="{{ route('admin.services.index') }}" class="block px-4 py-3 rounded-lg hover:bg-neutral-800 text-neutral-200 transition">Services Management</a>
            <a href="{{ route('admin.staff.index') }}" class="block px-4 py-3 rounded-lg hover:bg-neutral-800 text-neutral-200 transition">Staff Management</a>
            <a href="{{ route('admin.appointments.index') }}" class="block px-4 py-3 rounded-lg hover:bg-neutral-800 text-neutral-200 transition">Appointments</a>
            <a href="{{ route('admin.gallery.index') }}" class="block px-4 py-3 rounded-lg hover:bg-neutral-800 text-neutral-200 transition">Gallery Management</a>
            <a href="{{ route('admin.messages.index') }}" class="block px-4 py-3 rounded-lg hover:bg-neutral-800 text-neutral-200 transition">Messages</a>
            <a href="{{ route('admin.settings.index') }}" class="block px-4 py-3 rounded-lg hover:bg-neutral-800 text-neutral-200 transition">Settings</a>
            
            <!-- Profile & Password Edit Link -->
            <a href="{{ route('profile.edit') }}" class="block px-4 py-3 rounded-lg bg-neutral-800/50 border border-neutral-700 text-brand-pink mt-6 transition shadow-sm">
                ⚙️ Profile & Password
            </a>
        </nav>

        <div class="p-4 border-t border-neutral-800">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 text-red-400 hover:bg-neutral-800 rounded-lg transition cursor-pointer">Logout</button>
            </form>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-grow flex flex-col min-w-0">
        <header class="bg-neutral-900 border-b border-neutral-800 p-4 sm:px-8 flex justify-between items-center sticky top-0 z-30">
            <div class="flex items-center space-x-3">
                <!-- Mobile Hamburger Toggle Button (Uses Alpine.js) -->
                <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden text-neutral-300 hover:text-white p-2 focus:outline-none rounded-lg bg-neutral-800">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                <h2 class="text-sm sm:text-base lg:text-lg font-medium text-neutral-300 truncate">Management Panel</h2>
            </div>
            
            <div class="flex items-center space-x-3 sm:space-x-4">
                <span class="text-xs sm:text-sm text-brand-pink font-medium truncate max-w-[120px] sm:max-w-xs">{{ Auth::user()->name ?? 'Administrator' }}</span>
                <a href="{{ route('home') }}" target="_blank" class="text-xs bg-neutral-800 border border-neutral-700 px-3 py-1.5 rounded-lg hover:border-brand-pink transition whitespace-nowrap">Visit Website ↗</a>
            </div>
        </header>

        <main class="p-4 sm:p-6 lg:p-8 flex-grow">
            @yield('admin-content')
        </main>
    </div>

</body>
</html>
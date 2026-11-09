<nav x-data="{ open: false }" class="bg-neutral-900 border-b border-neutral-800 text-white sticky top-0 z-50 backdrop-blur">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="text-xl font-serif font-bold tracking-wider text-brand-pink">
                        AURA
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-6 sm:-my-px sm:ms-10 sm:flex items-center">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('dashboard') ? 'border-brand-pink text-brand-pink' : 'border-transparent text-neutral-300 hover:text-white' }} text-sm font-medium transition">
                        {{ __('Dashboard') }}
                    </a>

                    <!-- শুধুমাত্র অ্যাডমিন হলে নেভবারে অ্যাডমিন প্যানেল লিংক দেখাবে -->
                    @if(auth()->check() && auth()->user()->usertype === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('admin.*') ? 'border-brand-pink text-brand-pink' : 'border-transparent text-neutral-300 hover:text-white' }} text-sm font-medium transition">
                            {{ __('Admin Panel') }}
                        </a>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-neutral-300 bg-neutral-800 hover:text-white focus:outline-none transition ease-in-out duration-150 cursor-pointer">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="bg-neutral-900 border border-neutral-800 rounded-md shadow-lg py-1">
                            <x-dropdown-link :href="route('profile.edit')" class="text-neutral-300 hover:bg-neutral-800 hover:text-white">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();" class="text-red-400 hover:bg-neutral-800 hover:text-red-300">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-neutral-400 hover:text-white hover:bg-neutral-800 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-neutral-900 border-b border-neutral-800">
        <div class="pt-2 pb-3 space-y-1 px-4">
            <a href="{{ route('dashboard') }}" class="block py-2 text-sm font-medium {{ request()->routeIs('dashboard') ? 'text-brand-pink' : 'text-neutral-300' }}">
                {{ __('Dashboard') }}
            </a>

            <!-- মোবাইল মেনুতেও শুধু অ্যাডমিন হলে দেখাবে -->
            @if(auth()->check() && auth()->user()->usertype === 'admin')
                <a href="{{ route('admin.dashboard') }}" class="block py-2 text-sm font-medium {{ request()->routeIs('admin.*') ? 'text-brand-pink' : 'text-neutral-300' }}">
                    {{ __('Admin Panel') }}
                </a>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-4 border-t border-neutral-800 px-4">
            <div class="flex items-center space-x-3 mb-3">
                <div>
                    <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-xs text-neutral-400">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="space-y-2 pt-2 border-t border-neutral-800/60">
                <a href="{{ route('profile.edit') }}" class="block py-1.5 text-sm text-neutral-300 hover:text-white">
                    {{ __('Profile') }}
                </a>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left py-1.5 text-sm text-red-400 hover:text-red-300">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
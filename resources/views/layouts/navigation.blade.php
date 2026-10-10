<nav x-data="{ open: false, scrolled: false }" 
     @scroll.window="scrolled = (window.pageYOffset > 10)"
     :class="{ 'shadow-md bg-white/90 backdrop-blur-md border-b border-gray-200/80': scrolled, 'bg-white border-b border-gray-100': !scrolled }"
     class="sticky top-0 z-50 transition-all duration-300">
    
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            
            <!-- جهة اليمين: اللوغو والروابط التفاعلية -->
            <div class="flex items-center gap-8">
                <!-- Logo with Hover Scale -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('formations.index') }}" class="transform hover:scale-105 transition duration-200">
                        <img src="{{ asset('images/logo.png') }}" alt="Mondi Logo" class="block h-10 w-auto drop-shadow-sm">
                    </a>
                </div>

                <!-- Navigation Links with Modern Active State -->
                <div class="hidden sm:flex items-center gap-2">
                    <a href="{{ route('formations.index') }}" 
                       class="px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-200 flex items-center gap-2 {{ request()->routeIs('formations.index') ? 'bg-gradient-to-r from-red-600 to-red-500 text-white shadow-md shadow-red-500/20' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-100/80' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                        {{ __('إدارة التكوينات (HSE)') }}
                    </a>

                    <a href="{{ route('my.trainings') }}" 
                       class="px-4 py-2 rounded-xl text-sm font-semibold transition-all duration-200 flex items-center gap-2 {{ request()->routeIs('my.trainings') ? 'bg-gradient-to-r from-red-600 to-red-500 text-white shadow-md shadow-red-500/20' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-100/80' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0112 20.055a11.952 11.952 0 01-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                        </svg>
                        {{ __('تكويناتي الخاصة') }}
                    </a>
                </div>
            </div>

            <!-- جهة اليسار: تبديل اللغة والبروفايل بأزرار موديرن -->
            <div class="hidden sm:flex items-center gap-3">
                
                <!-- Language Switcher -->
                <x-dropdown align="left" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center gap-2 px-3 py-2 border border-gray-200/80 text-xs font-bold rounded-xl text-gray-700 bg-gray-50/80 hover:bg-white hover:shadow-sm transition-all duration-200 focus:outline-none">
                            <span class="text-base">🌐</span>
                            <span>{{ strtoupper(app()->getLocale()) }}</span>
                            <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('lang.switch', 'ar')" class="flex items-center gap-2 text-xs font-medium">
                            <span>🇲🇦</span> العربية (AR)
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('lang.switch', 'fr')" class="flex items-center gap-2 text-xs font-medium">
                            <span>🇫🇷</span> Français (FR)
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('lang.switch', 'en')" class="flex items-center gap-2 text-xs font-medium">
                            <span>🇬🇧</span> English (EN)
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>

                <!-- User Profile Dropdown -->
                <x-dropdown align="left" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center gap-2 px-3.5 py-1.5 border border-gray-200/80 rounded-xl text-xs font-bold text-gray-700 bg-white hover:bg-gray-50 hover:shadow-sm transition-all duration-200 focus:outline-none">
                            <div class="w-7 h-7 rounded-lg bg-red-100 text-red-600 font-extrabold flex items-center justify-center text-xs">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-4 py-2 border-b border-gray-100">
                            <p class="text-xs font-semibold text-gray-800">{{ Auth::user()->name }}</p>
                            <p class="text-[10px] text-gray-400 truncate">{{ Auth::user()->email }}</p>
                        </div>

                        <x-dropdown-link :href="route('profile.edit')" class="text-xs font-medium flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            {{ __('الملف الشخصي') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="text-xs font-medium text-red-600 flex items-center gap-2 hover:bg-red-50">
                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                {{ __('تسجيل الخروج') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger Button for Mobile -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-xl text-gray-500 hover:bg-gray-100 focus:outline-none transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden border-b border-gray-200 bg-white/95 backdrop-blur-md">
        <div class="pt-2 pb-3 space-y-1 px-4">
            <a href="{{ route('formations.index') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('formations.index') ? 'bg-red-50 text-red-600' : 'text-gray-600' }}">
                {{ __('إدارة التكوينات (HSE)') }}
            </a>
            <a href="{{ route('my.trainings') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('my.trainings') ? 'bg-red-50 text-red-600' : 'text-gray-600' }}">
                {{ __('تكويناتي الخاصة') }}
            </a>
        </div>

        <div class="pt-4 pb-3 border-t border-gray-100 px-4">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-9 h-9 rounded-lg bg-red-100 text-red-600 font-extrabold flex items-center justify-center text-sm">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div>
                    <div class="font-bold text-sm text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="text-xs text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('الملف الشخصي') }}
                </x-responsive-nav-link>

                <div class="py-2 text-xs font-semibold text-gray-400">تغيير اللغة:</div>
                <div class="flex gap-2 mb-2">
                    <a href="{{ route('lang.switch', 'ar') }}" class="px-3 py-1 bg-gray-100 rounded-md text-xs font-medium">🇲🇦 AR</a>
                    <a href="{{ route('lang.switch', 'fr') }}" class="px-3 py-1 bg-gray-100 rounded-md text-xs font-medium">🇫🇷 FR</a>
                    <a href="{{ route('lang.switch', 'en') }}" class="px-3 py-1 bg-gray-100 rounded-md text-xs font-medium">🇬🇧 EN</a>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-red-600 font-semibold">
                        {{ __('تسجيل الخروج') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            
            <!-- جهة اليمين: اللوغو والروابط -->
            <div class="flex items-center gap-8">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('formations.index') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="Mondi Logo" class="block h-10 w-auto">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden sm:flex items-center gap-6">
                    <x-nav-link :href="route('formations.index')" :active="request()->routeIs('formations.index')">
                        {{ __('إدارة التكوينات (HSE)') }}
                    </x-nav-link>

                    <x-nav-link :href="route('my.trainings')" :active="request()->routeIs('my.trainings')">
                        {{ __('تكويناتي الخاصة') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- جهة اليسار: تبديل اللغة واسم المستخدم مقربين لبعضياتهم -->
            <div class="hidden sm:flex items-center gap-3">
                
                <!-- Language Switcher Dropdown -->
                <x-dropdown align="left" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-gray-200 text-sm leading-4 font-medium rounded-md text-gray-600 bg-gray-50 hover:text-gray-900 hover:bg-gray-100 focus:outline-none transition">
                            <span>🌐 {{ strtoupper(app()->getLocale()) }}</span>
                            <svg class="fill-current h-4 w-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('lang.switch', 'ar')">
                            🇲🇦 العربية (AR)
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('lang.switch', 'fr')">
                            🇫🇷 Français (FR)
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('lang.switch', 'en')">
                            🇬🇧 English (EN)
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>

                <!-- User Profile Dropdown -->
                <x-dropdown align="left" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:text-gray-900 focus:outline-none transition">
                            <div>{{ Auth::user()->name }}</div>
                            <svg class="fill-current h-4 w-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('الملف الشخصي') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('تسجيل الخروج') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger Button for Mobile -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('formations.index')" :active="request()->routeIs('formations.index')">
                {{ __('إدارة التكوينات (HSE)') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('my.trainings')" :active="request()->routeIs('my.trainings')">
                {{ __('تكويناتي الخاصة') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('الملف الشخصي') }}
                </x-responsive-nav-link>

                <div class="px-4 py-2 text-xs font-semibold text-gray-400">تغيير اللغة:</div>
                <x-responsive-nav-link :href="route('lang.switch', 'ar')">🇲🇦 العربية</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('lang.switch', 'fr')">🇫🇷 Français</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('lang.switch', 'en')">🇬🇧 English</x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('تسجيل الخروج') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
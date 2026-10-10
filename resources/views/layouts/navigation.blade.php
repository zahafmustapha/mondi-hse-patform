<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('formations.index') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex" dir="rtl">
                    @if(optional(auth()->user())->role === 'admin')
                        <x-nav-link :href="route('formations.index')" :active="request()->routeIs('formations.index')">
                            إدارة التكوينات (HSE)
                        </x-nav-link>
                    @endif

                    <x-nav-link :href="route('employee.trainings')" :active="request()->routeIs('employee.trainings')">
                        تكويناتي الخاصة
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm
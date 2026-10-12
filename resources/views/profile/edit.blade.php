<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between" dir="rtl">
            <h2 class="font-extrabold text-xl text-gray-800 leading-tight">
                الملف الشخصي وإعدادات الحساب
            </h2>
            <span class="text-xs font-semibold bg-red-50 text-red-600 px-3 py-1.5 rounded-xl border border-red-100">
                Mondi Tangier
            </span>
        </div>
    </x-slot>

    <div class="py-10" dir="rtl" x-data="{ show: false }" x-init="setTimeout(() => show = true, 50)">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- 1. تحديث معلومات الحساب (الاسم والبريد) -->
            <div class="bg-white p-6 sm:p-8 shadow-xl shadow-gray-200/50 rounded-3xl border border-gray-100 transition-all duration-700"
                 x-show="show"
                 x-transition:enter="transition ease-out duration-700 transform"
                 x-transition:enter-start="opacity-0 translate-y-4"
                 x-transition:enter-end="opacity-100 translate-y-0">
                
                <header class="mb-6">
                    <h3 class="text-lg font-bold text-gray-900">معلومات الحساب</h3>
                    <p class="text-xs text-gray-500 mt-1">تحديث معلومات الملف الشخصي والبريد الإلكتروني الخاص بحسابك.</p>
                </header>

                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                    @csrf
                </form>

                <form method="post" action="{{ route('profile.update') }}" class="space-y-4 max-w-xl">
                    @csrf
                    @method('patch')

                    <div>
                        <label for="name" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">الاسم الكامل</label>
                        <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name"
                               class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500/20 focus:border-red-500 transition bg-gray-50/50">
                        <x-input-error class="mt-1.5 text-xs text-red-600" :messages="$errors->get('name')" />
                    </div>

                    <div>
                        <label for="email" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">البريد الإلكتروني</label>
                        <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required autocomplete="username"
                               class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500/20 focus:border-red-500 transition bg-gray-50/50">
                        <x-input-error class="mt-1.5 text-xs text-red-600" :messages="$errors->get('email')" />

                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                            <div>
                                <p class="text-xs text-gray-800 mt-2">
                                    البريد الإلكتروني غير مؤكد.
                                    <button form="send-verification" class="underline text-red-600 hover:text-red-800 rounded-md focus:outline-none">
                                        انقر هنا لإعادة إرسال رسالة التحقّق.
                                    </button>
                                </p>

                                @if (session('status') === 'verification-link-sent')
                                    <p class="mt-2 font-medium text-xs text-emerald-600">
                                        تم إرسال رابط تحقق جديد إلى بريدك الإلكتروني.
                                    </p>
                                @endif
                            </div>
                        @endif
                    </div>

                    <div class="flex items-center gap-4 pt-2">
                        <button type="submit" class="bg-gradient-to-r from-red-600 to-red-500 hover:from-red-700 hover:to-red-600 text-white px-6 py-3 rounded-xl text-xs sm:text-sm font-bold shadow-lg shadow-red-500/25 transition-all duration-300 hover:-translate-y-0.5">
                            حفظ التغييرات
                        </button>

                        @if (session('status') === 'profile-updated')
                            <p x-data="{ open: true }" x-init="setTimeout(() => open = false, 2000)" x-show="open" class="text-xs font-bold text-emerald-600">
                                تم الحفظ بنجاح.
                            </p>
                        @endif
                    </div>
                </form>
            </div>

            <!-- 2. تحديث كلمة المرور -->
            <div class="bg-white p-6 sm:p-8 shadow-xl shadow-gray-200/50 rounded-3xl border border-gray-100 transition-all duration-700"
                 x-show="show"
                 x-transition:enter="transition ease-out duration-700 transform"
                 x-transition:enter-start="opacity-0 translate-y-6"
                 x-transition:enter-end="opacity-100 translate-y-0">
                
                <header class="mb-6">
                    <h3 class="text-lg font-bold text-gray-900">تحديث كلمة المرور</h3>
                    <p class="text-xs text-gray-500 mt-1">تأكد من استخدام كلمة مرور طويلة وعشوائية للحفاظ على أمان حسابك.</p>
                </header>

                <form method="post" action="{{ route('password.update') }}" class="space-y-4 max-w-xl">
                    @csrf
                    @method('put')

                    <div>
                        <label for="update_password_current_password" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">كلمة المرور الحالية</label>
                        <input id="update_password_current_password" name="current_password" type="password" autocomplete="current-password"
                               class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500/20 focus:border-red-500 transition bg-gray-50/50">
                        <x-input-error class="mt-1.5 text-xs text-red-600" :messages="$errors->updatePassword->get('current_password')" />
                    </div>

                    <div>
                        <label for="update_password_password" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">كلمة المرور الجديدة</label>
                        <input id="update_password_password" name="password" type="password" autocomplete="new-password"
                               class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500/20 focus:border-red-500 transition bg-gray-50/50">
                        <x-input-error class="mt-1.5 text-xs text-red-600" :messages="$errors->updatePassword->get('password')" />
                    </div>

                    <div>
                        <label for="update_password_password_confirmation" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">تأكيد كلمة المرور</label>
                        <input id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password"
                               class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500/20 focus:border-red-500 transition bg-gray-50/50">
                        <x-input-error class="mt-1.5 text-xs text-red-600" :messages="$errors->updatePassword->get('password_confirmation')" />
                    </div>

                    <div class="flex items-center gap-4 pt-2">
                        <button type="submit" class="bg-gradient-to-r from-red-600 to-red-500 hover:from-red-700 hover:to-red-600 text-white px-6 py-3 rounded-xl text-xs sm:text-sm font-bold shadow-lg shadow-red-500/25 transition-all duration-300 hover:-translate-y-0.5">
                            تحديث كلمة المرور
                        </button>

                        @if (session('status') === 'password-updated')
                            <p x-data="{ open: true }" x-init="setTimeout(() => open = false, 2000)" x-show="open" class="text-xs font-bold text-emerald-600">
                                تم التحديث بنجاح.
                            </p>
                        @endif
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
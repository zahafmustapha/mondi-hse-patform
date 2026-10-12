<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center py-10 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-slate-100 via-gray-50 to-red-50/30" dir="rtl"
         x-data="{ show: false }" x-init="setTimeout(() => show = true, 50)">
        
        <!-- اللوغو والعنوان -->
        <div class="mb-6 text-center transition-all duration-700 transform"
             x-show="show"
             x-transition:enter="transition ease-out duration-700 transform"
             x-transition:enter-start="opacity-0 -translate-y-6"
             x-transition:enter-end="opacity-100 translate-y-0">
            
            <div class="flex justify-center mb-3">
                <img src="{{ asset('images/logo.png') }}" alt="Mondi Group" class="h-20 sm:h-24 w-auto object-contain">
            </div>
            
            <h1 class="text-xl sm:text-2xl font-extrabold text-gray-900 tracking-tight">استرجاع كلمة المرور</h1>
            <p class="text-xs text-gray-500 mt-1.5 font-medium">Mondi HSE - Tangier Plant</p>
        </div>

        <!-- صندوق الفورم -->
        <div class="w-full max-w-md bg-white p-8 rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100 transition-all duration-700"
             x-show="show"
             x-transition:enter="transition ease-out duration-700 transform"
             x-transition:enter-start="opacity-0 translate-y-6"
             x-transition:enter-end="opacity-100 translate-y-0">
            
            <div class="mb-6 text-xs text-gray-600 leading-relaxed bg-gray-50 p-4 rounded-2xl border border-gray-100">
                نسيت كلمة المرور؟ لا مشكلة. فقط أخبرنا بريدك الإلكتروني وسنرسل لك رابطاً لإعادة تعيين كلمة المرور لتتمكن من اختيار كلمة مرور جديدة.
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4 text-xs font-medium" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">البريد الإلكتروني</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                           placeholder="name@mondi.com"
                           class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500/20 focus:border-red-500 transition bg-gray-50/50">
                    <x-input-error :messages="$errors->get('email')" class="mt-1.5 text-xs text-red-600" />
                </div>

                <div class="flex items-center justify-between pt-2">
                    <a href="{{ route('login') }}" class="text-xs text-gray-500 hover:text-gray-700 font-semibold transition">
                        العودة لتسجيل الدخول
                    </a>

                    <button type="submit" class="bg-gradient-to-r from-red-600 to-red-500 hover:from-red-700 hover:to-red-600 text-white px-6 py-3 rounded-xl text-xs sm:text-sm font-bold shadow-lg shadow-red-500/25 transition-all duration-300 hover:-translate-y-0.5">
                        إرسال رابط الاسترجاع
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
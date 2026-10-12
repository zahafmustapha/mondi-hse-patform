<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between" dir="rtl">
            <h2 class="font-extrabold text-xl text-gray-800 leading-tight">
                لوحة التحكم الرئيسية (Mondi HSE)
            </h2>
            <span class="text-xs font-semibold bg-red-50 text-red-600 px-3 py-1.5 rounded-xl border border-red-100">
                Tangier Plant
            </span>
        </div>
    </x-slot>

    <div class="py-12" dir="rtl" x-data="{ show: false }" x-init="setTimeout(() => show = true, 50)">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- ترحيب وتنبيه تفاعلي -->
            <div class="bg-gradient-to-r from-slate-900 to-gray-800 text-white p-6 sm:p-8 rounded-3xl shadow-xl shadow-gray-200/50 flex flex-col sm:flex-row items-center justify-between gap-4 transition-all duration-700"
                 x-show="show"
                 x-transition:enter="transition ease-out duration-700 transform"
                 x-transition:enter-start="opacity-0 translate-y-4"
                 x-transition:enter-end="opacity-100 translate-y-0">
                <div>
                    <h3 class="text-lg sm:text-xl font-bold">مرحباً بك، في منصة إدارة السلامة والتكوينات</h3>
                    <p class="text-xs sm:text-sm text-gray-300 mt-1">إليك نظرة عامة على حالة التكوينات، الحصص والمشاركين بمصنع طنجة.</p>
                </div>
                <div class="bg-white/10 backdrop-blur-md px-5 py-3 rounded-2xl border border-white/10 text-center">
                    <span class="block text-xs text-gray-400">الحالة النظامية</span>
                    <span class="text-sm font-bold text-emerald-400">● النظام يعمل بامتياز</span>
                </div>
            </div>

            <!-- إحصائيات سريعة (KPI Grid) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6"
                 x-show="show"
                 x-transition:enter="transition ease-out duration-700 transform"
                 x-transition:enter-start="opacity-0 translate-y-6"
                 x-transition:enter-end="opacity-100 translate-y-0">
                
                <!-- Card 1 -->
                <div class="bg-white p-6 rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">التكوينات النشطة</span>
                        <div class="bg-red-50 text-red-600 p-2.5 rounded-2xl">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-baseline gap-2">
                        <span class="text-2xl font-extrabold text-gray-900">12</span>
                        <span class="text-xs text-emerald-600 font-semibold">+2 هذا الأسبوع</span>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white p-6 rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">المستفيدون المسجلون</span>
                        <div class="bg-blue-50 text-blue-600 p-2.5 rounded-2xl">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-baseline gap-2">
                        <span class="text-2xl font-extrabold text-gray-900">148</span>
                        <span class="text-xs text-emerald-600 font-semibold">نشط</span>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white p-6 rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">نسبة إنجاز السلامة</span>
                        <div class="bg-emerald-50 text-emerald-600 p-2.5 rounded-2xl">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-baseline gap-2">
                        <span class="text-2xl font-extrabold text-gray-900">96%</span>
                        <span class="text-xs text-emerald-600 font-semibold">ممتاز</span>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="bg-white p-6 rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">الشهادات الممنوحة</span>
                        <div class="bg-purple-50 text-purple-600 p-2.5 rounded-2xl">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-baseline gap-2">
                        <span class="text-2xl font-extrabold text-gray-900">92</span>
                        <span class="text-xs text-gray-500">هذا الشهر</span>
                    </div>
                </div>

            </div>

            <!-- محتوى إضافي / بطاقة الترحيب التقليدية منسقة -->
            <div class="bg-white overflow-hidden shadow-xl shadow-gray-200/50 rounded-3xl border border-gray-100 p-8">
                <div class="text-gray-900 space-y-3">
                    <h4 class="text-lg font-bold text-gray-800">أهلاً بك مجدداً في نظام إدارة السلامة المهنية والتكوينات</h4>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        تم تحديث واجهة لوحة التحكم لتتوافق مع معايير الجودة والتصميم الخاص بمصنع Mondi بطنجة. يمكنك الآن التنقل بسهولة بين لوائح التكوينات، وإدارة تسجيلات العمال والموظفين بمرونة عالية.
                    </p>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
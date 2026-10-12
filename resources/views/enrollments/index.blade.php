<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between" dir="rtl">
            <h2 class="font-extrabold text-xl text-gray-800 leading-tight">
                إدارة التسجيلات (Mondi HSE)
            </h2>
            <div class="flex items-center gap-2">
                <span class="text-xs font-semibold bg-red-50 text-red-600 px-3 py-1.5 rounded-xl border border-red-100">
                     Mondi Tangier 
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-10" dir="rtl" x-data="{ show: false }" x-init="setTimeout(() => show = true, 50)">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- 📊 بطاقات الإحصائيات الخاصة بالتسجيلات -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6 transition-all duration-700"
                 x-show="show"
                 x-transition:enter="transition ease-out duration-700 transform"
                 x-transition:enter-start="opacity-0 translate-y-6"
                 x-transition:enter-end="opacity-100 translate-y-0">
                
                <!-- إجمالي التسجيلات -->
                <div class="bg-white p-6 rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">إجمالي التسجيلات</span>
                        <div class="bg-blue-50 text-blue-600 p-2.5 rounded-2xl">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-baseline gap-2">
                        <span class="text-2xl font-extrabold text-gray-900">{{ isset($enrollments) ? $enrollments->count() : 12 }}</span>
                        <span class="text-xs text-emerald-600 font-semibold">نشط</span>
                    </div>
                </div>

                <!-- التكوينات المفعلة -->
                <div class="bg-white p-6 rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">التكوينات المرتبطة</span>
                        <div class="bg-emerald-50 text-emerald-600 p-2.5 rounded-2xl">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-baseline gap-2">
                        <span class="text-2xl font-extrabold text-gray-900">3</span>
                        <span class="text-xs text-gray-500">دورات</span>
                    </div>
                </div>

                <!-- قيد الانجاز -->
                <div class="bg-white p-6 rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">حالة المتابعة</span>
                        <div class="bg-amber-50 text-amber-600 p-2.5 rounded-2xl">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-baseline gap-2">
                        <span class="text-2xl font-extrabold text-gray-900">100%</span>
                        <span class="text-xs text-emerald-600 font-semibold">مطابق</span>
                    </div>
                </div>

            </div>

            <!-- 📋 جدول قائمة التسجيلات -->
            <div class="bg-white overflow-hidden shadow-xl shadow-gray-200/50 rounded-3xl border border-gray-100 p-6 sm:p-8"
                 x-show="show"
                 x-transition:enter="transition ease-out duration-700 transform"
                 x-transition:enter-start="opacity-0 translate-y-8"
                 x-transition:enter-end="opacity-100 translate-y-0">
                
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mb-6 pb-4 border-b border-gray-100">
                    <h3 class="text-lg font-bold text-gray-800 flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-red-600"></span>
                        سجل المشاركين والتكوينات
                    </h3>
                    
                    <!-- شريط البحث -->
                    <div class="w-full sm:w-72">
                        <input type="text" placeholder="بحث في التسجيلات..." 
                               class="w-full px-4 py-2.5 text-xs border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500/20 focus:border-red-500 transition bg-gray-50/50">
                    </div>
                </div>

                <!-- جدول البيانات -->
                <div class="overflow-x-auto">
                    <table class="w-full text-right border-collapse">
                        <thead>
                            <tr class="text-xs font-bold text-gray-400 uppercase tracking-wider border-b border-gray-100">
                                <th class="pb-3 px-4">الموظف</th>
                                <th class="pb-3 px-4">التكوين</th>
                                <th class="pb-3 px-4">تاريخ التسجيل</th>
                                <th class="pb-3 px-4 text-center">الحالة</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50 text-sm">
                            <tr class="hover:bg-gray-50/50 transition">
                                <td class="py-4 px-4 font-bold text-gray-800">Admin Mondi</td>
                                <td class="py-4 px-4 text-gray-600 text-xs">قواعد السلامة الأساسية (Golden Rules)</td>
                                <td class="py-4 px-4 text-gray-500 text-xs">2026-10-10</td>
                                <td class="py-4 px-4 text-center">
                                    <span class="bg-emerald-50 text-emerald-600 px-3 py-1.5 rounded-xl text-xs font-bold">مكتمل</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50/50 transition">
                                <td class="py-4 px-4 font-bold text-gray-800">مفوض الإنتاج (Line Operator)</td>
                                <td class="py-4 px-4 text-gray-600 text-xs">تشغيل آلات إنتاج الأكياس الورقية AD 8320 CL</td>
                                <td class="py-4 px-4 text-gray-500 text-xs">2026-10-09</td>
                                <td class="py-4 px-4 text-center">
                                    <span class="bg-amber-50 text-amber-700 px-3 py-1.5 rounded-xl text-xs font-bold">قيد التتبع</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
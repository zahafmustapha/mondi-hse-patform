<x-app-layout>
    <div class="py-6 sm:py-8" dir="rtl" x-data="{ search: '', show: false }" x-init="setTimeout(() => show = true, 50)">
        <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8 space-y-6">
            
            <!-- قسم مؤشرات الأداء الرئيسية KPIs (عمود واحد فالموبايل، عمودين فـ Tablet، و 4 أعمدة في الشاشات الكبيرة) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5" 
                 x-show="show" 
                 x-transition:enter="transition ease-out duration-500 transform"
                 x-transition:enter-start="opacity-0 translate-y-4"
                 x-transition:enter-end="opacity-100 translate-y-0">
                
                <!-- KPI 1: إجمالي التكوينات -->
                <div class="group relative bg-white p-5 rounded-2xl shadow-sm hover:shadow-xl border border-gray-100/85 transition-all duration-300 hover:-translate-y-1 overflow-hidden">
                    <div class="absolute -left-6 -bottom-6 w-20 h-20 bg-blue-50 rounded-full group-hover:scale-150 transition-transform duration-500 opacity-50"></div>
                    <div class="relative flex items-center justify-between">
                        <div>
                            <p class="text-[11px] font-bold uppercase tracking-wider text-gray-400">إجمالي التكوينات</p>
                            <h3 class="text-2xl font-extrabold text-gray-800 mt-1 tracking-tight group-hover:text-blue-600 transition-colors">
                                {{ $totalFormations ?? 0 }}
                            </h3>
                        </div>
                        <div class="p-3 bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-xl shadow-md shadow-blue-500/20 group-hover:rotate-6 transition-transform duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                    </div>
                </div>

                <!-- KPI 2: مجموع التسجيلات -->
                <div class="group relative bg-white p-5 rounded-2xl shadow-sm hover:shadow-xl border border-gray-100/85 transition-all duration-300 hover:-translate-y-1 overflow-hidden">
                    <div class="absolute -left-6 -bottom-6 w-20 h-20 bg-emerald-50 rounded-full group-hover:scale-150 transition-transform duration-500 opacity-50"></div>
                    <div class="relative flex items-center justify-between">
                        <div>
                            <p class="text-[11px] font-bold uppercase tracking-wider text-gray-400">مجموع التسجيلات</p>
                            <h3 class="text-2xl font-extrabold text-gray-800 mt-1 tracking-tight group-hover:text-emerald-600 transition-colors">
                                {{ $totalEnrollments ?? 0 }}
                            </h3>
                        </div>
                        <div class="p-3 bg-gradient-to-br from-emerald-500 to-emerald-600 text-white rounded-xl shadow-md shadow-emerald-500/20 group-hover:rotate-6 transition-transform duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                    </div>
                </div>

                <!-- KPI 3: الموظفين المسجلين -->
                <div class="group relative bg-white p-5 rounded-2xl shadow-sm hover:shadow-xl border border-gray-100/85 transition-all duration-300 hover:-translate-y-1 overflow-hidden">
                    <div class="absolute -left-6 -bottom-6 w-20 h-20 bg-indigo-50 rounded-full group-hover:scale-150 transition-transform duration-500 opacity-50"></div>
                    <div class="relative flex items-center justify-between">
                        <div>
                            <p class="text-[11px] font-bold uppercase tracking-wider text-gray-400">الموظفين المسجلين</p>
                            <h3 class="text-2xl font-extrabold text-gray-800 mt-1 tracking-tight group-hover:text-indigo-600 transition-colors">
                                {{ $totalEmployees ?? 0 }}
                            </h3>
                        </div>
                        <div class="p-3 bg-gradient-to-br from-indigo-500 to-indigo-600 text-white rounded-xl shadow-md shadow-indigo-500/20 group-hover:rotate-6 transition-transform duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                    </div>
                </div>

                <!-- KPI 4: إجمالي ساعات التكوين -->
                <div class="group relative bg-white p-5 rounded-2xl shadow-sm hover:shadow-xl border border-gray-100/85 transition-all duration-300 hover:-translate-y-1 overflow-hidden">
                    <div class="absolute -left-6 -bottom-6 w-20 h-20 bg-amber-50 rounded-full group-hover:scale-150 transition-transform duration-500 opacity-50"></div>
                    <div class="relative flex items-center justify-between">
                        <div>
                            <p class="text-[11px] font-bold uppercase tracking-wider text-gray-400">إجمالي الساعات</p>
                            <h3 class="text-2xl font-extrabold text-gray-800 mt-1 tracking-tight group-hover:text-amber-600 transition-colors">
                                {{ $totalHours ?? 0 }} <span class="text-xs font-medium text-gray-400">ساعة</span>
                            </h3>
                        </div>
                        <div class="p-3 bg-gradient-to-br from-amber-500 to-amber-600 text-white rounded-xl shadow-md shadow-amber-500/20 group-hover:rotate-6 transition-transform duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                    </div>
                </div>

            </div>

            <!-- جدول التكوينات الرئيسي مع محرك البحث الفوري -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100"
                 x-show="show" 
                 x-transition:enter="transition ease-out duration-700 transform"
                 x-transition:enter-start="opacity-0 translate-y-6"
                 x-transition:enter-end="opacity-100 translate-y-0">
                
                <div class="p-4 sm:p-6 text-gray-900">
                    
                    <!-- شريط العنوان والبحث وزر الإضافة المنظم -->
                    <div class="flex flex-col sm:flex-row justify-between items-stretch sm:items-center gap-3 mb-5 pb-4 border-b border-gray-100">
                        <h3 class="text-sm sm:text-base font-bold text-gray-800 flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-red-600"></span>
                            قائمة التكوينات المتاحة
                        </h3>

                        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2.5 w-full sm:w-auto">
                            <!-- Live Search Input -->
                            <div class="relative w-full sm:w-64">
                                <span class="absolute inset-y-0 right-0 flex items-center pr-3.5 pointer-events-none text-gray-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                </span>
                                <input type="text" x-model="search" placeholder="بحث سريع في التكوينات..." class="w-full pl-4 pr-10 py-2 text-xs border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500/20 focus:border-red-500 transition bg-gray-50/50">
                            </div>

                            @auth
                                @if(auth()->user()->role === 'admin')
                                    <a href="{{ route('formations.create') }}" class="bg-gradient-to-r from-red-600 to-red-500 hover:from-red-700 hover:to-red-600 text-white px-4 py-2 rounded-xl text-xs font-semibold shadow-sm shadow-red-500/20 transition flex items-center justify-center gap-1.5 whitespace-nowrap">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                        إضافة تكوين
                                    </a>
                                @endif
                            @endauth
                        </div>
                    </div>

                    @if(session('success'))
                        <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl text-xs font-semibold mb-4 flex items-center gap-2">
                            <span>✅</span> {{ session('success') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto rounded-xl border border-gray-100">
                        <table class="min-w-full divide-y divide-gray-100">
                            <thead class="bg-gray-50/75">
                                <tr>
                                    <th class="px-4 sm:px-6 py-3 text-right text-[11px] sm:text-xs font-bold text-gray-500 uppercase tracking-wider">العنوان</th>
                                    <th class="px-4 sm:px-6 py-3 text-right text-[11px] sm:text-xs font-bold text-gray-500 uppercase tracking-wider">الوصف</th>
                                    <th class="px-4 sm:px-6 py-3 text-right text-[11px] sm:text-xs font-bold text-gray-500 uppercase tracking-wider">المدة</th>
                                    <th class="px-4 sm:px-6 py-3 text-right text-[11px] sm:text-xs font-bold text-gray-500 uppercase tracking-wider">الإجراءات والعمليات</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-100">
                                @forelse($formations as $formation)
                                    <tr class="hover:bg-gray-50/50 transition-colors" 
                                        x-show="search === '' || '{{ strtolower($formation->title) . ' ' . strtolower($formation->description) }}'.includes(search.toLowerCase())">
                                        
                                        <td class="px-4 sm:px-6 py-3.5 whitespace-nowrap text-xs sm:text-sm font-semibold text-gray-800">
                                            {{ $formation->title }}
                                        </td>
                                        <td class="px-4 sm:px-6 py-3.5 text-[11px] sm:text-xs text-gray-500 max-w-[180px] sm:max-w-xs truncate">
                                            {{ $formation->description }}
                                        </td>
                                        <td class="px-4 sm:px-6 py-3.5 whitespace-nowrap text-[11px] sm:text-xs font-semibold text-gray-700">
                                            <span class="px-2.5 py-1 bg-amber-50 text-amber-700 rounded-lg border border-amber-100">
                                                {{ $formation->duration_hours }} ساعات
                                            </span>
                                        </td>
                                        <td class="px-4 sm:px-6 py-3.5 whitespace-nowrap text-xs font-medium space-x-1 space-x-reverse">
                                            
                                            @auth
                                                @php
                                                    $isRegistered = \App\Models\Enrollment::where('user_id', auth()->id())
                                                        ->where('formation_id', $formation->id)
                                                        ->exists();
                                                @endphp

                                                @if($isRegistered)
                                                    <span class="inline-flex items-center px-2.5 py-1 rounded-xl text-[11px] sm:text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-100">
                                                        ✓ مسجل
                                                    </span>
                                                @else
                                                    <form action="{{ route('formations.self-enroll', $formation->id) }}" method="POST" class="inline">
                                                        @csrf
                                                        <button type="submit" class="text-emerald-700 hover:bg-emerald-100 bg-emerald-50 px-2.5 py-1 rounded-lg text-[11px] sm:text-xs font-semibold transition">
                                                            تسجيل
                                                        </button>
                                                    </form>
                                                @endif

                                                @if(auth()->user()->role === 'admin')
                                                    <a href="{{ route('formations.enrollments.index', $formation->id) }}" class="text-indigo-700 hover:bg-indigo-100 bg-indigo-50 px-2.5 py-1 rounded-lg text-[11px] sm:text-xs font-semibold transition">
                                                        المشاركون
                                                    </a>
                                                    <a href="{{ route('formations.edit', $formation->id) }}" class="text-blue-700 hover:bg-blue-100 bg-blue-50 px-2.5 py-1 rounded-lg text-[11px] sm:text-xs font-semibold transition">
                                                        تعديل
                                                    </a>
                                                    <form action="{{ route('formations.destroy', $formation->id) }}" method="POST" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" onclick="return confirm('هل أنت متأكد من الحذف؟')" class="text-red-700 hover:bg-red-100 bg-red-50 px-2.5 py-1 rounded-lg text-[11px] sm:text-xs font-semibold transition">
                                                            حذف
                                                        </button>
                                                    </form>
                                                @endif
                                            @endauth

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-12 text-center text-xs sm:text-sm text-gray-400">
                                            لا توجد أي تكوينات مضافة حالياً.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <div class="py-6 sm:py-8" dir="rtl" x-data="{ show: false }" x-init="setTimeout(() => show = true, 50)">
        <div class="max-w-3xl mx-auto px-3 sm:px-6 lg:px-8">
            
            <!-- بطاقة النموذج (Card) مع انيميشن خفيف -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100 transition-all duration-500"
                 x-show="show" 
                 x-transition:enter="transition ease-out duration-500 transform"
                 x-transition:enter-start="opacity-0 translate-y-6"
                 x-transition:enter-end="opacity-100 translate-y-0">
                
                <div class="p-6 sm:p-8 text-gray-900">
                    
                    <!-- عنوان الصفحة -->
                    <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-100">
                        <div class="p-2.5 bg-red-50 text-red-600 rounded-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-base sm:text-lg font-bold text-gray-800">إضافة تكوين جديد (HSE)</h3>
                            <p class="text-xs text-gray-400 mt-0.5">قم بإدخال بيانات التكوين بدقة لضمان تسجيلها في النظام</p>
                        </div>
                    </div>

                    <!-- عرض أخطاء التحقق (Validation Errors) إن وجدت -->
                    @if ($errors->any())
                        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl text-xs space-y-1">
                            <p class="font-bold">⚠️ تنبيه:</p>
                            @foreach ($errors->all() as $error)
                                <p>• {{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    <!-- نموذج الإضافة -->
                    <form action="{{ route('formations.store') }}" method="POST" class="space-y-5">
                        @csrf

                        <!-- حقل عنوان التكوين -->
                        <div>
                            <label for="title" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">عنوان التكوين</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}" required 
                                   placeholder="مثال: قواعد السلامة الأساسية (Golden Rules)" 
                                   class="w-full px-4 py-2.5 text-xs sm:text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500/20 focus:border-red-500 transition bg-gray-50/50">
                        </div>

                        <!-- حقل وصف التكوين -->
                        <div>
                            <label for="description" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">وصف التكوين</label>
                            <textarea name="description" id="description" rows="4" 
                                      placeholder="اكتب تفاصيل وملخص التكوين..." 
                                      class="w-full px-4 py-2.5 text-xs sm:text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500/20 focus:border-red-500 transition bg-gray-50/50">{{ old('description') }}</textarea>
                        </div>

                        <!-- حقل المدة بالساّعات (duration_hours) -->
                        <div>
                            <label for="duration_hours" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">المدة (بالساعات)</label>
                            <div class="relative">
                                <input type="number" name="duration_hours" id="duration_hours" value="{{ old('duration_hours') }}" min="1" required 
                                       placeholder="مثال: 4" 
                                       class="w-full pl-16 pr-4 py-2.5 text-xs sm:text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500/20 focus:border-red-500 transition bg-gray-50/50">
                                <span class="absolute inset-y-0 left-0 flex items-center px-4 bg-gray-100 text-gray-500 rounded-l-xl text-xs font-medium border-r border-gray-200">
                                    ساعات
                                </span>
                            </div>
                        </div>

                        <!-- أزرار الإجراءات -->
                        <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100">
                            <a href="{{ route('formations.index') }}" class="px-5 py-2.5 rounded-xl text-xs font-semibold text-gray-600 hover:bg-gray-100 transition">
                                إلغاء
                            </a>
                            <button type="submit" class="bg-gradient-to-r from-red-600 to-red-500 hover:from-red-700 hover:to-red-600 text-white px-6 py-2.5 rounded-xl text-xs font-semibold shadow-sm shadow-red-500/20 transition flex items-center gap-1.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                حفظ التكوين
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
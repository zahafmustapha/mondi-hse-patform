<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center w-full px-2" dir="rtl">
            <div class="flex items-center gap-3">
                <div>
                    <h2 class="font-bold text-2xl text-mondi-900 leading-tight">
                        إضافة تكوين جديد (HSE)
                    </h2>
                    <p class="text-xs text-gray-500 font-medium">Mondi Tangier Plant - لوحة التحكم</p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-10 bg-slate-50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-xl border border-gray-200 p-6" dir="rtl">
                
                <form action="{{ route('formations.store') }}" method="POST">
                    @csrf

                    <!-- عنوان التكوين -->
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-bold text-gray-700 mb-1">عنوان التكوين</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" required
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-mondi-700 focus:ring-mondi-700">
                        @error('title')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- وصف التكوين -->
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-bold text-gray-700 mb-1">وصف التكوين</label>
                        <textarea name="description" id="description" rows="4" required
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-mondi-700 focus:ring-mondi-700">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- المدة (بالساعات) -->
                    <div class="mb-6">
                        <label for="duration_hours" class="block text-sm font-bold text-gray-700 mb-1">المدة (بالساعات)</label>
                        <input type="number" name="duration_hours" id="duration_hours" value="{{ old('duration_hours') }}" required min="1"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-mondi-700 focus:ring-mondi-700">
                        @error('duration_hours')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- الأزرار -->
                    <div class="flex justify-end gap-3">
                        <a href="{{ route('formations.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md text-sm font-bold hover:bg-gray-300 transition">
                            إلغاء
                        </a>
                        <button type="submit" class="bg-mondi-900 text-white px-6 py-2 rounded-md text-sm font-bold hover:bg-mondi-800 transition">
                            حفظ التكوين
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
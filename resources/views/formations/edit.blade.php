<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center w-full px-2" dir="rtl">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/logo.png') }}" alt="Mondi Group" class="h-10 w-auto object-contain">
                <div>
                    <h2 class="font-bold text-2xl text-mondi-900 leading-tight">
                        تعديل التكوين: {{ $formation->title }}
                    </h2>
                    <p class="text-xs text-gray-500 font-medium">Mondi Tangier Plant</p>
                </div>
            </div>
            <a href="{{ route('formations.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2.5 px-5 rounded-lg shadow-md transition">
                رجوع للقائمة
            </a>
        </div>
    </x-slot>

    <div class="py-10 bg-slate-50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-xl border border-gray-200 p-8" dir="rtl">
                
                @if ($errors->any())
                    <div class="bg-red-100 border-r-4 border-red-500 text-red-700 p-4 mb-6 rounded">
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('formations.update', $formation->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-5">
                        <label for="title" class="block text-sm font-bold text-mondi-900 mb-2">عنوان التكوين *</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $formation->title) }}" class="w-full rounded-lg border-gray-300 focus:border-mondi-600 focus:ring-mondi-600 shadow-sm text-sm" required>
                    </div>

                    <div class="mb-5">
                        <label for="description" class="block text-sm font-bold text-mondi-900 mb-2">وصف التكوين</label>
                        <textarea name="description" id="description" rows="4" class="w-full rounded-lg border-gray-300 focus:border-mondi-600 focus:ring-mondi-600 shadow-sm text-sm">{{ old('description', $formation->description) }}</textarea>
                    </div>

                    <div class="mb-6">
                        <label for="duration_hours" class="block text-sm font-bold text-mondi-900 mb-2">مدة التكوين (بالساعات) *</label>
                        <input type="number" name="duration_hours" id="duration_hours" value="{{ old('duration_hours', $formation->duration_hours) }}" min="1" class="w-full rounded-lg border-gray-300 focus:border-mondi-600 focus:ring-mondi-600 shadow-sm text-sm" required>
                    </div>

                    <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                        <a href="{{ route('formations.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2.5 px-6 rounded-lg transition text-sm">
                            إلغاء
                        </a>
                        <button type="submit" class="bg-mondi-600 hover:bg-mondi-700 text-white font-bold py-2.5 px-6 rounded-lg shadow transition text-sm">
                            حفظ التغيرات
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
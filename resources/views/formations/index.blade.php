<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center w-full px-2" dir="rtl">
            <div>
                <h2 class="font-bold text-2xl text-mondi-900 leading-tight">
                    إدارة التكوينات (HSE)
                </h2>
                <p class="text-xs text-gray-500 font-medium">Mondi Tangier Plant - لوحة تحكم الأدمن</p>
            </div>
            <div>
                <a href="{{ route('formations.create') }}" class="bg-mondi-900 text-white px-4 py-2 rounded-lg text-sm font-bold hover:bg-mondi-800 transition shadow">
                    + إضافة تكوين جديد
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-10 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- قسم الإحصائيات السريعة -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6" dir="rtl">
                <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-200">
                    <p class="text-xs text-gray-500 font-bold">إجمالي التكوينات</p>
                    <p class="text-2xl font-black text-mondi-900 mt-1">{{ $totalFormations }}</p>
                </div>
                <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-200">
                    <p class="text-xs text-gray-500 font-bold">إجمالي التسجيلات</p>
                    <p class="text-2xl font-black text-blue-900 mt-1">{{ $totalEnrollments }}</p>
                </div>
                <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-200">
                    <p class="text-xs text-gray-500 font-bold">التكوينات المكتملة</p>
                    <p class="text-2xl font-black text-emerald-700 mt-1">{{ $completedCount }}</p>
                </div>
                <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-200">
                    <p class="text-xs text-gray-500 font-bold">نسبة الإنجاز العامة</p>
                    <p class="text-2xl font-black text-amber-700 mt-1">{{ $completionRate }}%</p>
                </div>
            </div>

            <!-- جدول عرض التكوينات -->
            <div class="bg-white overflow-hidden shadow-md sm:rounded-xl border border-gray-200" dir="rtl">
                <div class="bg-mondi-900 text-white px-6 py-4 flex justify-between items-center">
                    <h3 class="font-bold text-lg">قائمة التكوينات المتاحة</h3>
                </div>

                <table class="min-w-full divide-y divide-gray-200 text-right">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-4 text-xs font-bold text-mondi-900 uppercase">عنوان التكوين</th>
                            <th class="px-6 py-4 text-xs font-bold text-mondi-900 uppercase">الوصف</th>
                            <th class="px-6 py-4 text-xs font-bold text-mondi-900 uppercase">المدة (ساعات)</th>
                            <th class="px-6 py-4 text-xs font-bold text-mondi-900 uppercase text-center">الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @forelse($formations as $formation)
                            <tr class="hover:bg-slate-50 transition">
                                <td class="px-6 py-4 font-bold text-gray-900">{{ $formation->title }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ $formation->description }}</td>
                                <td class="px-6 py-4 text-gray-800 font-semibold">{{ $formation->duration_hours }} ساعة</td>
                                <td class="px-6 py-4 text-center space-x-2 space-x-reverse">
                                    <a href="{{ route('formations.edit', $formation->id) }}" class="text-indigo-600 hover:text-indigo-900 font-bold text-xs bg-indigo-50 px-3 py-1 rounded">تعديل</a>
                                    
                                    <form action="{{ route('formations.destroy', $formation->id) }}" method="POST" class="inline-block" onsubmit="return confirm('هل أنت متأكد من حذف هذا التكوين؟');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 font-bold text-xs bg-red-50 px-3 py-1 rounded">حذف</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-8 text-center text-gray-500 font-medium">
                                    لا توجد أي تكوينات مضافة حالياً. انقر على زر **"+ إضافة تكوين جديد"** في الأعلى للبدء.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
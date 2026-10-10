<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center w-full px-2" dir="rtl">
            <div class="flex items-center gap-3">
                <div class="flex items-center justify-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Mondi Group" class="h-10 w-auto object-contain">
                </div>
                <div>
                    <h2 class="font-bold text-2xl text-mondi-900 leading-tight">
                        تكويناتي الخاصة
                    </h2>
                    <p class="text-xs text-gray-500 font-medium">Mondi Tangier Plant - سجل التكوينات الشخصي</p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-10 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-xl border border-gray-200" dir="rtl">
                <div class="bg-mondi-900 text-white px-6 py-4 flex justify-between items-center">
                    <h3 class="font-bold text-lg">قائمة التكوينات المسجل فيها</h3>
                    <span class="bg-mondi-700 text-xs px-3 py-1 rounded-full font-medium">إجمالي التكوينات: {{ $formations->count() }}</span>
                </div>

                <table class="min-w-full divide-y divide-gray-200 text-right">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-4 text-xs font-bold text-mondi-900 uppercase">عنوان التكوين</th>
                            <th class="px-6 py-4 text-xs font-bold text-mondi-900 uppercase">الوصف</th>
                            <th class="px-6 py-4 text-xs font-bold text-mondi-900 uppercase">المدة (ساعات)</th>
                            <th class="px-6 py-4 text-xs font-bold text-mondi-900 uppercase text-center">حالة الحضور</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @forelse($formations as $formation)
                            <tr class="hover:bg-slate-50 transition">
                                <td class="px-6 py-4 font-bold text-gray-900">{{ $formation->title }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ $formation->description }}</td>
                                <td class="px-6 py-4 text-gray-800 font-semibold">{{ $formation->duration_hours }} ساعة</td>
                                <td class="px-6 py-4 text-center">
                                    @if($formation->pivot->status === 'completed')
                                        <span class="bg-emerald-100 text-emerald-800 text-xs font-bold px-3 py-1 rounded-full">مكتمل</span>
                                    @else
                                        <span class="bg-amber-100 text-amber-800 text-xs font-bold px-3 py-1 rounded-full">قيد الانتظار</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-8 text-center text-gray-500 font-medium">
                                    لم تقم بالتسجيل في أي تكوين بعد.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
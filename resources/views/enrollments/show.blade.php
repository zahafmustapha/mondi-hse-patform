<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center w-full px-2" dir="rtl">
            <div class="flex items-center gap-3">
                <div class="flex items-center justify-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Mondi Group" class="h-10 w-auto object-contain">
                </div>
                <div>
                    <h2 class="font-bold text-2xl text-mondi-900 leading-tight">
                        متابعة حضور التكوين: {{ $formation->title }}
                    </h2>
                    <p class="text-xs text-gray-500 font-medium">Mondi Tangier Plant</p>
                </div>
            </div>
            <div class="flex items-center gap-2 print:hidden">
                <!-- زر تصدير Excel -->
                <a href="{{ route('formations.enrollments.exportCsv', $formation->id) }}" class="bg-emerald-700 hover:bg-emerald-800 text-white font-bold py-2 px-4 rounded-lg text-sm shadow transition flex items-center gap-1">
                    📊 <span>تصدير Excel (CSV)</span>
                </a>
                <!-- زر الطباعة -->
                <button onclick="window.print()" class="bg-gray-800 hover:bg-black text-white font-bold py-2 px-4 rounded-lg text-sm shadow transition flex items-center gap-1">
                    🖨️ <span>طباعة لائحة الحضور</span>
                </button>
                <!-- زر تعديل المسجلين -->
                <a href="{{ route('formations.enrollments.index', $formation->id) }}" class="bg-mondi-600 hover:bg-mondi-700 text-white font-bold py-2 px-4 rounded-lg text-sm shadow transition">
                    تعديل قائمة المسجلين
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-10 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-mondi-100 border-r-4 border-mondi-600 text-mondi-900 p-4 rounded-lg shadow-sm mb-6 print:hidden" dir="rtl">
                    <span class="font-semibold">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-md sm:rounded-xl border border-gray-200" dir="rtl">
                <div class="bg-mondi-900 text-white px-6 py-4 flex justify-between items-center">
                    <h3 class="font-bold text-lg">الموظفون المسجلون ووضعية الحضور</h3>
                    <span class="bg-mondi-700 text-xs px-3 py-1 rounded-full font-medium">إجمالي المسجلين: {{ $formation->users->count() }}</span>
                </div>

                <table class="min-w-full divide-y divide-gray-200 text-right">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-4 text-xs font-bold text-mondi-900 uppercase">اسم الموظف</th>
                            <th class="px-6 py-4 text-xs font-bold text-mondi-900 uppercase">البريد الإلكتروني</th>
                            <th class="px-6 py-4 text-xs font-bold text-mondi-900 uppercase text-center">حالة التكوين</th>
                            <th class="px-6 py-4 text-xs font-bold text-mondi-900 uppercase text-center">تاريخ الإتمام</th>
                            <th class="px-6 py-4 text-xs font-bold text-mondi-900 uppercase text-center print:hidden">الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @forelse($formation->users as $user)
                            <tr class="hover:bg-slate-50 transition">
                                <td class="px-6 py-4 font-bold text-gray-900">{{ $user->name }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ $user->email }}</td>
                                <td class="px-6 py-4 text-center">
                                    @if($user->pivot->status === 'completed')
                                        <span class="bg-emerald-100 text-emerald-800 text-xs font-bold px-3 py-1 rounded-full">مكتمل</span>
                                    @else
                                        <span class="bg-amber-100 text-amber-800 text-xs font-bold px-3 py-1 rounded-full">قيد الانتظار</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-center text-xs text-gray-500">
                                    {{ $user->pivot->completed_at ? \Carbon\Carbon::parse($user->pivot->completed_at)->format('Y-m-d H:i') : '-' }}
                                </td>
                                <td class="px-6 py-4 text-center print:hidden">
                                    <form action="{{ route('formations.enrollments.updateStatus', [$formation->id, $user->id]) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        @if($user->pivot->status === 'pending')
                                            <input type="hidden" name="status" value="completed">
                                            <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold px-3 py-1.5 rounded transition shadow-sm">
                                                تعليم كمكتمل
                                            </button>
                                        @else
                                            <input type="hidden" name="status" value="pending">
                                            <button type="submit" class="bg-gray-500 hover:bg-gray-600 text-white text-xs font-bold px-3 py-1.5 rounded transition shadow-sm">
                                                إعادة إلى قيد الانتظار
                                            </button>
                                        @endif
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-gray-500 font-medium">
                                    لا يوجد موظفون مسجلون في هذا التكوين بعد.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
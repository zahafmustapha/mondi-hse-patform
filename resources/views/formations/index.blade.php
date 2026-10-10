<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" dir="rtl">
            {{ __('إدارة التكوينات (HSE)') }}
        </h2>
    </x-slot>

    <div class="py-12" dir="rtl">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="mb-6 flex justify-between items-center">
                    <h3 class="text-lg font-medium text-gray-900">قائمة التكوينات المتاحة</h3>
                    
                    <!-- زر إضافة تكوين جديد يظهر للأدمن فقط -->
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('formations.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            + إضافة تكوين جديد
                        </a>
                    @endif
                </div>

                <!-- رسائل النجاح أو التنبيهات -->
                @if(session('success'))
                    <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('info'))
                    <div class="mb-4 p-4 text-sm text-blue-700 bg-blue-100 rounded-lg" role="alert">
                        {{ session('info') }}
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">العنوان</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">الوصف</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">المدة (ساعات)</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">الإجراءات والعمليات</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @isset($formations)
                                @forelse($formations as $formation)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $formation->title }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-500">{{ $formation->description }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $formation->duration_hours }} س</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium space-x-2 space-x-reverse">
                                            
                                            <!-- زر التسجيل أو إظهار حالة مسجل -->
                                            @if($formation->users->contains(auth()->id()))
                                                <span class="inline-block bg-gray-100 text-gray-500 px-3 py-1 rounded-md font-semibold cursor-not-allowed">
                                                    مسجل ✓
                                                </span>
                                            @else
                                                <form action="{{ route('formations.self-enroll', $formation->id) }}" method="POST" class="inline-block">
                                                    @csrf
                                                    <button type="submit" class="text-green-700 hover:text-green-900 bg-green-50 px-3 py-1 rounded-md font-bold transition">
                                                        تسجيل
                                                    </button>
                                                </form>
                                            @endif

                                            <!-- أزرار التحكم الخاصة بالأدمن -->
                                            @if(auth()->user()->role === 'admin')
                                                <a href="{{ route('formations.enrollments.index', $formation->id) }}" class="text-blue-600 hover:text-blue-900 bg-blue-50 px-3 py-1 rounded-md transition">
                                                    المشاركون
                                                </a>

                                                <a href="{{ route('formations.edit', $formation->id) }}" class="text-indigo-600 hover:text-indigo-900 bg-indigo-50 px-3 py-1 rounded-md transition">
                                                    تعديل
                                                </a>
                                                
                                                <form action="{{ route('formations.destroy', $formation->id) }}" method="POST" class="inline-block" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900 bg-red-50 px-3 py-1 rounded-md transition">
                                                        حذف
                                                    </button>
                                                </form>
                                            @endif

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">لا توجد أي تكوينات مضافة حالياً.</td>
                                    </tr>
                                @endforelse
                            @endisset
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
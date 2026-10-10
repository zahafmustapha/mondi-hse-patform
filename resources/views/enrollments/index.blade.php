<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3 w-full px-2" dir="rtl">
            <div class="flex items-center justify-center">
                <img src="{{ asset('images/logo.png') }}" alt="Mondi Group" class="h-10 w-auto object-contain">
            </div>
            <div>
                <h2 class="font-bold text-2xl text-mondi-900 leading-tight">
                    تسجيل الموظفين فـ تكوين: {{ $formation->title }}
                </h2>
                <p class="text-xs text-gray-500 font-medium">Mondi Tangier Plant</p>
            </div>
        </div>
    </x-slot>

    <div class="py-10 bg-slate-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded-xl shadow-md border border-gray-200" dir="rtl">
                <form action="{{ route('formations.enrollments.store', $formation->id) }}" method="POST">
                    @csrf
                    
                    <h3 class="font-bold text-lg text-mondi-900 mb-4">حدد الموظفين المعنيين بـ هذا التكوين:</h3>

                    <div class="space-y-3 mb-6 max-h-96 overflow-y-auto p-2 border border-gray-100 rounded-lg">
                        @forelse ($users as $user)
                            <label class="flex items-center space-x-3 space-x-reverse p-3 bg-gray-50 hover:bg-mondi-50 rounded-lg border border-gray-200 cursor-pointer transition">
                                <input type="checkbox" name="users[]" value="{{ $user->id }}" 
                                       {{ in_array($user->id, $enrolledUserIds) ? 'checked' : '' }}
                                       class="rounded text-mondi-600 focus:ring-mondi-600 h-5 w-5">
                                <div class="flex flex-col">
                                    <span class="font-bold text-gray-800">{{ $user->name }}</span>
                                    <span class="text-xs text-gray-500">{{ $user->email }}</span>
                                </div>
                            </label>
                        @empty
                            <p class="text-gray-500 text-sm">لا يوجد موظفين مسجلين حالياً فـ النظام.</p>
                        @endforelse
                    </div>

                    <div class="flex justify-start gap-3">
                        <button type="submit" class="bg-mondi-600 hover:bg-mondi-700 text-white font-bold py-2.5 px-6 rounded-lg shadow-md transition">
                            حفظ تسجيل الموظفين
                        </button>
                        <a href="{{ route('formations.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2.5 px-6 rounded-lg transition">
                            إلغاء
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
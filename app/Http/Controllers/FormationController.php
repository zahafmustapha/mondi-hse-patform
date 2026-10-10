<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
  public function index(Request $request)
  {
    $query = Formation::with('users');

    // 1. بحث بالاسم أو الوصف
    if ($request->filled('search')) {
      $search = $request->search;
      $query->where(function ($q) use ($search) {
        $q->where('title', 'like', "%{$search}%")
          ->orWhere('description', 'like', "%{$search}%");
      });
    }

    // 2. فلترة حسب حالة التكوينات
    if ($request->filled('status')) {
      $status = $request->status;
      $query->whereHas('users', function ($q) use ($status) {
        $q->where('enrollments.status', $status);
      });
    }


    $formations = $query->get();

    // الإحصائيات العامة
    $totalFormations = Formation::count();
    $totalEnrollments = DB::table('enrollments')->count();
    $completedCount = DB::table('enrollments')->where('status', 'completed')->count();
    $completionRate = $totalEnrollments > 0 ? round(($completedCount / $totalEnrollments) * 100) : 0;

    return view('formations.index', compact('formations', 'totalFormations', 'totalEnrollments', 'completedCount', 'completionRate'));
  }
  // واجهة التكوينات الخاصة بالموظف
  public function myTrainings()
  {
    /** @var \App\Models\User $user */
    $user = auth()->user();

    // جلب التكوينات المسجل فيها المستخدم الحالي
    $formations = $user->formations()->withPivot('status')->get();

    return view('employee.trainings', compact('formations'));
  }
  public function create()
  {
    return view('formations.create');
  }

  public function store(Request $request)
  {
    $validated = $request->validate([
      'title' => 'required|string|max:255',
      'description' => 'nullable|string',
      'duration_hours' => 'required|integer|min:1',
    ]);

    Formation::create($validated);

    return redirect()->route('formations.index')->with('success', 'تم إنشاء التكوين بنجاح!');
  }

  // 1. صفحة تعديل التكوين
  public function edit(Formation $formation)
  {
    return view('formations.edit', compact('formation'));
  }



  // 2. تحديث التكوين في قاعدة البيانات
  public function update(Request $request, Formation $formation)
  {
    $validated = $request->validate([
      'title' => 'required|string|max:255',
      'description' => 'nullable|string',
      'duration_hours' => 'required|integer|min:1',
    ]);

    $formation->update($validated);

    return redirect()->route('formations.index')->with('success', 'تم تحديث البيانات بنجاح!');
  }

  // 3. حذف التكوين
  public function destroy(Formation $formation)
  {
    $formation->delete();

    return redirect()->route('formations.index')->with('success', 'تم حذف التكوين بنجاح!');
  }
}

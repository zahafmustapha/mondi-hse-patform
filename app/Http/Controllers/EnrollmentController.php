<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EnrollmentController extends Controller
{
  public function index(Formation $formation)
  {
    $users = User::where('role', 'employee')->orWhereNull('role')->get();
    $enrolledUserIds = $formation->users->pluck('id')->toArray();

    return view('enrollments.index', compact('formation', 'users', 'enrolledUserIds'));
  }

  public function store(Request $request, Formation $formation)
  {
    $request->validate([
      'users' => 'array',
    ]);

    $formation->users()->sync($request->users ?? []);

    return redirect()->route('formations.index')->with('success', 'تم تحديث قائمة الموظفين المسجلين بنجاح!');
  }

  public function show(Formation $formation)
  {
    $formation->load('users');
    return view('enrollments.show', compact('formation'));
  }

  public function selfEnroll(Formation $formation)
  {
    // التأكد واش الموظف مسجل مسبقاً
    $exists = $formation->users()->where('user_id', auth()->id())->exists();

    if (!$exists) {
      $formation->users()->attach(auth()->id(), ['status' => '1']);
      return redirect()->back()->with('success', 'تم تسجيلك في هذا التكوين بنجاح!');
    }

    return redirect()->back()->with('info', 'أنت مسجل بالفعل في هذا التكوين.');
  }

  public function updateStatus(Request $request, Formation $formation, User $user)
  {
    $request->validate([
      'status' => 'required|in:pending,completed',
    ]);

    $formation->users()->updateExistingPivot($user->id, [
      'status' => $request->status,
      'completed_at' => $request->status === 'completed' ? now() : null,
    ]);

    return back()->with('success', 'تم تحديث حالة حضور الموظف بنجاح!');
  }

  // تصدير لائحة الحضور كملف Excel (CSV)
  public function exportCsv(Formation $formation)
  {
    $fileName = 'HSE_Attendance_Report_' . $formation->id . '.csv';
    $formation->load('users');

    $headers = [
      "Content-type"        => "text/csv; charset=UTF-8",
      "Content-Disposition" => "attachment; filename=$fileName",
      "Pragma"              => "no-cache",
      "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
      "Expires"             => "0"
    ];

    $callback = function () use ($formation) {
      $file = fopen('php://output', 'w');
      fprintf($file, chr(0xEF) . chr(0xBB) . chr(0xBF)); // دعم للغة العربية فـ Excel

      fputcsv($file, ['اسم الموظف', 'البريد الإلكتروني', 'حالة التكوين', 'تاريخ الإتمام']);

      foreach ($formation->users as $user) {
        fputcsv($file, [
          $user->name,
          $user->email,
          $user->pivot->status === 'completed' ? 'مكتمل' : 'قيد الانتظار',
          $user->pivot->completed_at ? $user->pivot->completed_at : '-'
        ]);
      }

      fclose($file);
    };

    return response()->stream($callback, 200, $headers);
  }
}

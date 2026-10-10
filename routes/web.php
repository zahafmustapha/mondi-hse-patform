<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
  return redirect()->route('formations.index');
});

Route::middleware(['auth'])->group(function () {

  Route::get('/dashboard', function () {
    return redirect()->route('formations.index');
  })->name('dashboard');

  // مسارات إدارة التكوينات كاملة
  Route::resource('formations', FormationController::class);


  Route::post('/formations/{formation}/self-enroll', [EnrollmentController::class, 'selfEnroll'])
    ->name('formations.self-enroll');

  Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['ar', 'fr', 'en'])) {
      session(['locale' => $locale]);
    }
    return redirect()->back();
  })->name('lang.switch');

  // صفحة الموظف الخاص
  Route::get('/my-trainings', [FormationController::class, 'myTrainings'])->name('my.trainings');
  // مسارات التسجيلات والتصدير
  Route::get('formations/{formation}/enrollments', [EnrollmentController::class, 'index'])->name('formations.enrollments.index');
  Route::post('formations/{formation}/enrollments', [EnrollmentController::class, 'store'])->name('formations.enrollments.store');
  Route::get('formations/{formation}/enrollments/show', [EnrollmentController::class, 'show'])->name('formations.enrollments.show');
  Route::patch('formations/{formation}/users/{user}/status', [EnrollmentController::class, 'updateStatus'])->name('formations.enrollments.updateStatus');
  Route::get('formations/{formation}/export-csv', [EnrollmentController::class, 'exportCsv'])->name('formations.enrollments.exportCsv');

  // الملف الشخصي
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

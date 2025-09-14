<?php

use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AdminManagementController;
use App\Http\Controllers\AdminForgotPasswordController;
use App\Http\Controllers\AdminPasswordController;




// Route::get('/lang/{locale}', function ($locale) {
//     if (in_array($locale, ['id', 'en'])) {
//         session(['locale' => $locale]);
//     }
//     return redirect()->back();
// })->name('lang.switch');


Route::get('/set-locale/{lang}', function ($lang) {
    session(['locale' => $lang]);
    return back();
})->name('set-locale');



Route::get('/', [SubmissionController::class, 'slide1'])->name('home');
Route::get('/form', [SubmissionController::class, 'create'])->name('form.create');
Route::post('/form', [SubmissionController::class, 'store'])->name('form.store');
Route::get('/thanks', [SubmissionController::class, 'thanks'])->name('thanks');

// Search
Route::get('/search', [SubmissionController::class, 'search'])->name('search');

// Admin
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// ini baru dashboard, harus lewat login dulu
Route::get('/admin', [AdminController::class, 'index'])
    ->middleware('auth:admin')
    ->name('admin.index');


Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/export/excel', [AdminController::class, 'exportExcel'])->name('admin.export.excel');
    Route::get('/admin/export/csv', [AdminController::class, 'exportCsv'])->name('admin.export.csv');
    Route::get('/admin/export/pdf', [AdminController::class, 'exportPdf'])->name('admin.export.pdf');
});


Route::get('/thanks', [SubmissionController::class, 'thanks'])->name('submit.thanks');
Route::get('/', [SubmissionController::class, 'slide1'])->name('slide1');

Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    // Tambahin ini buat detail submission
    Route::get('/submission/{id}', [SubmissionController::class, 'show'])->name('form.show');
});

// Hapus submission
Route::delete('/admin/submission/{id}', [AdminController::class, 'destroy'])
    ->name('admin.submission.destroy')
    ->middleware('auth:admin');

// Manajemen Admin
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/manage', [AdminManagementController::class, 'index'])->name('admin.manage');
    Route::get('/admin/create', [AdminManagementController::class, 'create'])->name('admin.create');
    Route::post('/admin/store', [AdminManagementController::class, 'store'])->name('admin.store');
    Route::delete('/admin/{admin}', [AdminManagementController::class, 'destroy'])->name('admin.destroy');
});

// // Forgot Password (admin)
// Route::prefix('admin')->group(function () {
//     Route::get('/forgot-password', [AdminForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
//     Route::post('/forgot-password', [AdminForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');
//     Route::get('/reset-password/{token}', [AdminForgotPasswordController::class, 'showResetForm'])->name('admin.password.reset');
//     Route::post('/reset-password', [AdminForgotPasswordController::class, 'reset'])->name('admin.password.update');
// });

// // Password Reset Routes (admin)

// Route::prefix('admin')->group(function () {
//     Route::get('password/reset', [AdminPasswordController::class, 'showResetForm'])->name('admin.password.reset');
//     Route::post('password/reset', [AdminPasswordController::class, 'reset'])->name('admin.password.update');
// });

// Bisa diakses tanpa login
Route::get('/admin/password/change', [AdminPasswordController::class, 'showChangeForm'])->name('admin.password.change');
Route::post('/admin/password/change', [AdminPasswordController::class, 'changePassword'])->name('admin.password.change.update');

Route::post('/admin/password/update', [AdminPasswordController::class, 'reset'])
    ->name('admin.password.update');

// Reset password by superadmin
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/{id}/reset-password', [AdminManagementController::class, 'resetForm'])
        ->name('admin.reset.form');
    Route::post('/admin/{id}/reset-password', [AdminManagementController::class, 'resetPassword'])
        ->name('admin.reset.password');
});

Route::middleware(['auth:admin', 'superadmin'])->group(function () {
    Route::get('/admin/manage', [AdminManagementController::class, 'index'])->name('admin.manage');
    Route::get('/admin/create', [AdminManagementController::class, 'create'])->name('admin.create');
    Route::post('/admin/store', [AdminManagementController::class, 'store'])->name('admin.store');
    Route::delete('/admin/{admin}', [AdminManagementController::class, 'destroy'])->name('admin.destroy');
});

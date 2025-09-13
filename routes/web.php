<?php

use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;


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
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');

    // Tambahin ini buat detail submission
    Route::get('/submission/{id}', [SubmissionController::class, 'show'])->name('form.show');
});

// Hapus submission
Route::delete('/admin/submission/{id}', [App\Http\Controllers\AdminController::class, 'destroy'])
    ->name('admin.submission.destroy')
    ->middleware('auth:admin');

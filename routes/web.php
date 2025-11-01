<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\CutiController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
        
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['auth', 'verified'])->name('dashboard');
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['role:HR,IT,Keuangan'])
    ->name('dashboard');


    Route::resource('/task', TaskController::class)->middleware(['role:HR,IT,Keuangan']); //fungsi resource =  membuat sekumpulan route secara otomatis untuk operasi-operasi CRUD 
    // handle route resource task
    Route::get('/task/selesai/{id}', [TaskController::class, 'selesai'])->name('task.selesai')->middleware(['role:HR']);
    Route::get('/task/pending/{id}', [TaskController::class, 'pending'])->name('task.pending')->middleware(['role:HR']);

    // sesuaikan dengan isi dari nama pada role
    Route::resource('/karyawan', KaryawanController::class)->middleware(['role:HR']);
    Route::get('/karyawan/active/{id}', [KaryawanController::class, 'active'])->name('karyawan.active')->middleware(['role:HR']);
    Route::get('/karyawan/nonActive/{id}', [KaryawanController::class, 'nonActive'])->name('karyawan.nonActive')->middleware(['role:HR']);

    // Route::resource('departemen', DepartemenController::class);
    // debugging  parameter manual supaya Laravel pakai nama itu
    Route::resource('departemen', DepartemenController::class)->parameters([
        'departemen' => 'departemen'
    ])->middleware(['role:HR']);
    Route::get('/departemen/aktif/{id}', [DepartemenController::class, 'aktif'])->name('departemen.aktif')->middleware(['role:HR']);
    Route::get('/departemen/nonaktif/{id}', [DepartemenController::class, 'nonaktif'])->name('departemen.nonaktif')->middleware(['role:HR']);

    Route::resource('/role', RoleController::class)->middleware(['role:HR']);

    Route::resource('kehadiran', KehadiranController::class)->parameters([
        'kehadiran' => 'kehadiran'
    ])->middleware(['role:HR,IT,Keuangan']); //kalau list jangan pakai spasi karena ngaruh ke string
    Route::post('/kehadiran/{id}/checkout', [KehadiranController::class, 'checkout'])->name('kehadiran.checkout')->middleware(['role:HR,IT,Keuangan']);
    Route::post('/kehadiran/checkout', [App\Http\Controllers\KehadiranController::class, 'checkout'])->name('kehadiran.checkout');



    Route::resource('payroll', PayrollController::class)->parameters([
        'payroll' => 'payroll'
    ])->middleware(['role:HR,IT,Keuangan']);

    Route::resource('cuti', CutiController::class)->parameters([
        'cuti' => 'cuti'
    ])->middleware(['role:HR,IT,Keuangan']);
    Route::get('/cuti/terima/{id}', [CutiController::class, 'terima'])->name('cuti.terima')->middleware(['role:HR']);
    Route::get('/cuti/tolak/{id}', [CutiController::class, 'tolak'])->name('cuti.tolak')->middleware(['role:HR']);

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
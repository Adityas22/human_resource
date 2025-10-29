<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\RoleController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::resource('/task', TaskController::class); //fungsi resource =  membuat sekumpulan route secara otomatis untuk operasi-operasi CRUD 
// handle route resource task
Route::get('/task/selesai/{id}', [TaskController::class, 'selesai'])->name('task.selesai');
Route::get('/task/pending/{id}', [TaskController::class, 'pending'])->name('task.pending');

Route::resource('/karyawan', KaryawanController::class);
Route::get('/karyawan/active/{id}', [KaryawanController::class, 'active'])->name('karyawan.active');
Route::get('/karyawan/nonActive/{id}', [KaryawanController::class, 'nonActive'])->name('karyawan.nonActive');

// Route::resource('departemen', DepartemenController::class);
// debugging  parameter manual supaya Laravel pakai nama itu
Route::resource('departemen', DepartemenController::class)->parameters([
    'departemen' => 'departemen'
]);
Route::get('/departemen/aktif/{id}', [DepartemenController::class, 'aktif'])->name('departemen.aktif');
Route::get('/departemen/nonaktif/{id}', [DepartemenController::class, 'nonaktif'])->name('departemen.nonaktif');

Route::resource('/role', RoleController::class);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
<?php

use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeptController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\PositionsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticating'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
Route::get('/reset-password', [ResetPasswordController::class, 'resetpassword'])->middleware('auth');
Route::post('/reset-password-save', [ResetPasswordController::class, 'resetpost'])->middleware('auth');

Route::get('/workers', [WorkerController::class, 'index'])->middleware('auth');
Route::get('/worker-add', [WorkerController::class, 'create'])->middleware('auth', 'must-admin');
Route::post('/worker-add-save', [WorkerController::class, 'store'])->middleware('auth', 'must-admin');
Route::get('/worker-edit-{id}', [WorkerController::class, 'edit'])->middleware('auth', 'must-admin');
Route::put('/worker-update/{id}', [WorkerController::class, 'update'])->middleware('auth', 'must-admin');
Route::get('/worker-destroy/{id}', [WorkerController::class, 'destroy'])->middleware('auth', 'must-admin');
Route::get('/worker-deleted', [WorkerController::class, 'deletedWorker'])->middleware('auth', 'must-admin');
Route::get('/worker/{id}/restore', [WorkerController::class, 'restore'])->middleware('auth', 'must-admin');

Route::get('/dept', [DeptController::class, 'index'])->middleware('auth');
Route::get('/dept-add', [DeptController::class, 'create'])->middleware('auth', 'must-admin');
Route::post('/dept-add-save', [DeptController::class, 'store'])->middleware('auth', 'must-admin');
Route::get('/dept-edit-{id}', [DeptController::class, 'edit'])->middleware('auth', 'must-admin');
Route::put('/dept-update/{id}', [DeptController::class, 'update'])->middleware('auth', 'must-admin');
Route::get('/dept-destroy/{id}', [DeptController::class, 'destroy'])->middleware('auth', 'must-admin');
Route::get('/dept-deleted', [DeptController::class, 'deletedDept'])->middleware('auth', 'must-admin');
Route::get('/dept/{id}/restore', [DeptController::class, 'restore'])->middleware('auth', 'must-admin');

Route::get('/positions-add', [PositionsController::class, 'create'])->middleware('auth', 'must-admin');
Route::post('/positions-add-save', [PositionsController::class, 'store'])->middleware('auth', 'must-admin');
Route::get('/positions-edit-{id}', [PositionsController::class, 'edit'])->middleware('auth', 'must-admin');
Route::put('/positions-update/{id}', [PositionsController::class, 'update'])->middleware('auth', 'must-admin');
Route::get('/positions-destroy/{id}', [PositionsController::class, 'destroy'])->middleware('auth', 'must-admin');
Route::get('/positions/{id}/restore', [PositionsController::class, 'restore'])->middleware('auth', 'must-admin');

Route::get('/jadwal', [JadwalController::class, 'index'])->middleware('auth');
Route::get('/jadwal-karyawan', [JadwalController::class, 'view_jadwal'])->middleware('auth');
Route::get('/jadwal-add', [JadwalController::class, 'create'])->middleware('auth', 'must-admin');
Route::post('/jadwal-add-save', [JadwalController::class, 'store'])->middleware('auth', 'must-admin');
Route::get('/jadwal-edit-{id}', [JadwalController::class, 'edit'])->middleware('auth', 'must-admin');
Route::put('/jadwal-update-{id}', [JadwalController::class, 'update'])->middleware('auth', 'must-admin');
Route::get('/jadwal-destroy-{id}', [JadwalController::class, 'destroy'])->middleware('auth', 'must-admin');

Route::get('/jadwal-karyawan-add', [JadwalController::class, 'create_jadwal_karyawan'])->middleware('auth', 'must-admin');
Route::post('/jadwal-karyawan-save', [JadwalController::class, 'store_jadwal_karyawan'])->name('worker.create')->middleware('auth', 'must-admin');
Route::get('/jadwal-karyawan-edit-{id}', [JadwalController::class, 'edit_jadwal_karyawan'])->middleware('auth', 'must-admin');
Route::put('/jadwal-karyawan-update-{id}', [JadwalController::class, 'update_jadwal_karyawan'])->middleware('auth', 'must-admin');
Route::get('/jadwal-karyawan-destroy-{id}', [JadwalController::class, 'destroy_jadwal_karyawan'])->middleware('auth', 'must-admin');

Route::get('/absensi', [AbsensiController::class, 'index'])->middleware('auth');
Route::get('/absensi-masuk', [AbsensiController::class, 'masuk'])->middleware('auth', 'must-admin');
Route::get('/absensi-keluar', [AbsensiController::class, 'keluar'])->middleware('auth', 'must-admin');
Route::post('/inputabsen', [AbsensiController::class, 'absen'])->name('inputabsen')->middleware('auth', 'must-admin');
Route::get('/absensi-karyawan-edit-{id}', [AbsensiController::class, 'edit'])->middleware('auth', 'must-admin');
Route::put('/absensi-karyawan-update-{id}', [AbsensiController::class, 'update'])->middleware('auth', 'must-admin');
Route::get('/absensi-karyawan-destroy-{id}', [AbsensiController::class, 'destroy'])->middleware('auth', 'must-admin');

Route::get('/report', [AbsensiController::class, 'index_report'])->middleware('auth');
Route::get('/report-absensi', [AbsensiController::class, 'report'])->middleware('auth');

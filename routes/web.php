<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DeptController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PositionsController;
use App\Http\Controllers\WorkerController;
use Illuminate\Support\Facades\Route;

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
});

Route::get('/workers', [WorkerController::class, 'index']);
Route::get('/worker-add', [WorkerController::class, 'create']);
Route::post('/worker-add-save', [WorkerController::class, 'store']);
Route::get('/worker-edit-{id}', [WorkerController::class, 'edit']);
Route::put('/worker-update/{id}', [WorkerController::class, 'update']);
Route::get('/worker-destroy/{id}', [WorkerController::class, 'destroy']);
Route::get('/worker-deleted', [WorkerController::class, 'deletedWorker']);
Route::get('/worker/{id}/restore', [WorkerController::class, 'restore']);

Route::get('/dept', [DeptController::class, 'index']);
Route::get('/dept-add', [DeptController::class, 'create']);
Route::post('/dept-add-save', [DeptController::class, 'store']);
Route::get('/dept-edit-{id}', [DeptController::class, 'edit']);
Route::put('/dept-update/{id}', [DeptController::class, 'update']);
Route::get('/dept-destroy/{id}', [DeptController::class, 'destroy']);
Route::get('/dept-deleted', [DeptController::class, 'deletedDept']);
Route::get('/dept/{id}/restore', [DeptController::class, 'restore']);

Route::get('/positions-add', [PositionsController::class, 'create']);
Route::post('/positions-add-save', [PositionsController::class, 'store']);
Route::get('/positions-edit-{id}', [PositionsController::class, 'edit']);
Route::put('/positions-update/{id}', [PositionsController::class, 'update']);
Route::get('/positions-destroy/{id}', [PositionsController::class, 'destroy']);
Route::get('/positions/{id}/restore', [PositionsController::class, 'restore']);

Route::get('/jadwal', [JadwalController::class, 'index']);
Route::get('/jadwal-karyawan', [JadwalController::class, 'view_jadwal']);
Route::get('/jadwal-add', [JadwalController::class, 'create']);
Route::post('/jadwal-add-save', [JadwalController::class, 'store']);
Route::get('/jadwal-edit-{id}', [JadwalController::class, 'edit']);
Route::put('/jadwal-update-{id}', [JadwalController::class, 'update']);
Route::get('/jadwal-destroy-{id}', [JadwalController::class, 'destroy']);

Route::get('/jadwal-karyawan-add', [JadwalController::class, 'create_jadwal_karyawan']);
Route::post('/jadwal-karyawan-save', [JadwalController::class, 'store_jadwal_karyawan'])->name('worker.create');
Route::get('/jadwal-karyawan-edit-{id}', [JadwalController::class, 'edit_jadwal_karyawan']);
Route::put('/jadwal-karyawan-update-{id}', [JadwalController::class, 'update_jadwal_karyawan']);
Route::get('/jadwal-karyawan-destroy-{id}', [JadwalController::class, 'destroy_jadwal_karyawan']);

Route::get('/absensi', [AbsensiController::class, 'index']);
Route::get('/absensi-masuk', [AbsensiController::class, 'masuk']);
Route::get('/absensi-keluar', [AbsensiController::class, 'keluar']);
Route::post('/inputabsen', [AbsensiController::class, 'absen'])->name('inputabsen');
Route::get('/absensi-karyawan-edit-{id}', [AbsensiController::class, 'edit']);
Route::put('/absensi-karyawan-update-{id}', [AbsensiController::class, 'update']);
Route::get('/absensi-karyawan-destroy-{id}', [AbsensiController::class, 'destroy']);

Route::get('/report', [AbsensiController::class, 'index_report']);
Route::get('/report-absensi', [AbsensiController::class, 'report']);

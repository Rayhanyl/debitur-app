<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Authentication\AuthenticationController;

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


Route::get('/', [AuthenticationController::class, 'showLogin'])->name('show.login.page');
Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('show.dashboard.page');
Route::get('/periode', [DashboardController::class, 'showPeriode'])->name('show.periode.page');
Route::get('/temuan', [DashboardController::class, 'showOtorisasiTemuan'])->name('show.temuan.page');
Route::get('/tanggapan', [DashboardController::class, 'showOtorisasiTanggapan'])->name('show.tanggapan.page');
Route::get('/audit', [DashboardController::class, 'showAuditTrail'])->name('show.audit.page');

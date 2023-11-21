<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Supervisor\SupervisorController;
use App\Http\Controllers\Operator\OperatorController;
use App\Http\Controllers\Authentication\AuthenticationController;
use App\Http\Controllers\Excel\ExcelController;

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
Route::post('/Authentication', [AuthenticationController::class, 'authentication'])->name('authentication');
Route::get('/Logout', [AuthenticationController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    // Export Excel
    Route::get('/export/supervisor/ksai/temuan', [ExcelController::class, 'exportFileKsaiSvpExcel'])->name('export.supervisor.ksai.temuan');
    Route::get('/export/operator/ksai/temuan', [ExcelController::class, 'exportFileKsaiOpExcel'])->name('export');
    Route::get('/export/operator/temuan', [ExcelController::class, 'exportFileExcel'])->name('export.operator.temuan');
    Route::post('/import/operator/temuan', [ExcelController::class, 'importFileExcel'])->name('import.operator.temuan');


    // Supervisor
    Route::get('/supervisor/temuan', [SupervisorController::class, 'showTemuan'])->name('show.supervisor.temuan.page');
    Route::get('/update/status/supervisor/{id}', [SupervisorController::class, 'updateStatusTemuan'])->name('update.status.temuan.supervisor');
    
    // Operator
    Route::get('/operator/temuan', [OperatorController::class, 'showTemuan'])->name('show.operator.temuan.page');
    Route::get('/edit/operator/temuan/{id}', [OperatorController::class, 'showEdit'])->name('show.edit.operator.temuan.page');
    Route::post('/update/operator/temuan/{id}', [OperatorController::class, 'updateTemuan'])->name('update.temuan.operator');
    Route::get('/update/status/{id}', [OperatorController::class, 'updateStatusTemuan'])->name('update.status.temuan');
    Route::get('/delete/{id}', [OperatorController::class, 'deleteTemuan'])->name('delete.temuan');
    Route::get('/download/pdf/temuan', [OperatorController::class, 'downloadPdfFile'])->name('pdf.operator.temuan');
    
    // Admin
    Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('show.dashboard.page');
    Route::get('/periode', [DashboardController::class, 'showPeriode'])->name('show.periode.page');
    Route::get('/temuan', [DashboardController::class, 'showOtorisasiTemuan'])->name('show.temuan.page');
    Route::get('/tanggapan', [DashboardController::class, 'showOtorisasiTanggapan'])->name('show.tanggapan.page');
    Route::get('/audit', [DashboardController::class, 'showAuditTrail'])->name('show.audit.page');
});

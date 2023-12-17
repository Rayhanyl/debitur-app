<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentication\AuthenticationController;
use App\Http\Controllers\Superadmin\SuperadminController;
use App\Http\Controllers\Supervisor\SupervisorController;
use App\Http\Controllers\Operator\OperatorController;
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

    Route::prefix('superadmin')->group(function (){
        Route::get('/dashboard', [SuperadminController::class, 'showDashboard'])
            ->name('superadmin.dashboard.page');
        Route::get('/temuan', [SuperadminController::class, 'showTemuan'])
            ->name('superadmin.temuan.page');
        Route::get('/tanggapan', [SuperadminController::class, 'showTanggapan'])
            ->name('superadmin.tanggapan.page');
        Route::get('/audit', [SuperadminController::class, 'showAudit'])
            ->name('superadmin.audit.page');
    });

    Route::prefix('supervisor')->group(function (){
        Route::get('/dashboard', [SupervisorController::class, 'showDashboard'])
            ->name('supervisor.dashboard.page');
        Route::get('/temuan', [SupervisorController::class, 'showTemuan'])
            ->name('supervisor.temuan.page');
        Route::get('/edit/temuan/{id}', [SupervisorController::class, 'showEditTemuan'])
            ->name('supervisor.edit.temuan.page');
        Route::post('/update/supervisor/temuan/{id}', [SupervisorController::class, 'updateTemuan'])
            ->name('update.temuan.supervisor');
        Route::get('/update/status/supervisor/{id}', [SupervisorController::class, 'updateStatusTemuan'])
            ->name('update.status.temuan.supervisor');
        Route::get('/delete/{id}', [SupervisorController::class, 'deleteTemuan'])
            ->name('delete.temuan.supervisor');
        Route::get('/tanggapan', [SupervisorController::class, 'showTanggapan'])
            ->name('supervisor.tanggapan.page');
        Route::get('/audit', [SupervisorController::class, 'showAudit'])
            ->name('supervisor.audit.page');
    });

    Route::prefix('operator')->group(function (){
        Route::get('/dashboard', [OperatorController::class, 'showDashboard'])
            ->name('operator.dashboard.page');
        Route::get('/temuan', [OperatorController::class, 'showTemuan'])
            ->name('operator.temuan.page');
        Route::get('/edit/temuan/{id}', [OperatorController::class, 'showEditTemuan'])
            ->name('operator.edit.temuan.page');
        Route::post('/update/operator/temuan/{id}', [OperatorController::class, 'updateTemuan'])
            ->name('update.temuan.operator');
        Route::get('/update/status/{id}', [OperatorController::class, 'updateStatusTemuan'])
            ->name('update.status.temuan');
        Route::get('/delete/{id}', [OperatorController::class, 'deleteTemuan'])
            ->name('delete.temuan');
        Route::get('/tanggapan', [OperatorController::class, 'showTanggapan'])
            ->name('operator.tanggapan.page');
        Route::get('/audit', [OperatorController::class, 'showAudit'])
            ->name('operator.audit.page');
    });

    Route::prefix('excel')->group(function (){
        Route::get('/export/supervisor/ksai/temuan', [ExcelController::class, 'exportFileKsaiSvpExcel'])
            ->name('export.supervisor.ksai.temuan');
        Route::get('/export/operator/ksai/temuan', [ExcelController::class, 'exportFileKsaiOpExcel'])
            ->name('export');
        Route::get('/export/operator/temuan', [ExcelController::class, 'exportFileExcel'])
            ->name('export.operator.temuan');
        Route::post('/import/operator/temuan', [ExcelController::class, 'importFileExcel'])
            ->name('import.operator.temuan');
    });
});
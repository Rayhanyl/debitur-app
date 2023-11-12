<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showDashboard(){
        return view('admin.dashboard');
    }

    public function showPeriode(){
        return view('admin.periode');
    }

    public function showOtorisasiTemuan(){
        return view('admin.temuan');
    }

    public function showOtorisasiTanggapan(){
        return view('admin.tanggapan');
    }

    public function showAuditTrail(){
        return view('admin.audit');
    }
}

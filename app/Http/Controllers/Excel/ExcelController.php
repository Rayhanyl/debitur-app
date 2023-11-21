<?php

namespace App\Http\Controllers\Excel;

use Illuminate\Http\Request;
use App\Exports\TemuansExport;
use App\Imports\TemuansImport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\TemuansKsaiSupervisorExport;

class ExcelController extends Controller
{   

    // Export By Division KSAI
    public function exportFileKsaiSvpExcel(){
        return Excel::download(new TemuansKsaiSupervisorExport , 'Temuans.xlsx');
    }

    public function exportFileKsaiOpExcel(){
        $user = Auth::user();
        $roleId = $user->role_id;
        return Excel::download(new TemuansKsaiSupervisorExport($roleId), 'Temuans.xlsx');
    }

    /**
     * Export Temuan data to Excel file.
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function exportFileExcel()
    {
        $user = Auth::user();
        $divisionId = $user->division_id;
        $roleId = $user->role_id;
        return Excel::download(new TemuansExport($divisionId, $roleId), 'Temuan_By_division.xlsx');
    }

    
    // Import By Division
    public function importFileExcel(){
        Excel::import(new TemuansImport,request()->file('file'));
        Alert::toast('Berhasil upload file ','success');
        return back();
    }
}

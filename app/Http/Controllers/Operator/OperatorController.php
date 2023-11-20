<?php

namespace App\Http\Controllers\Operator;

use App\Models\Temuan;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Exports\TemuansExport;
use App\Imports\TemuansImport;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class OperatorController extends Controller
{

    public function showTemuan(){
        $user = Auth::user();
        $divisionId = $user->division_id;
        $temuan = Temuan::with('user');
        if ($divisionId === 1) {
            $temuan->where('status', 3)
                   ->whereHas('user', function ($query) use ($divisionId) {
                       $query->where('role_id', 3);
                   });

        } else {
            $temuan->where('status', 1)
                   ->whereHas('user', function ($query) use ($divisionId) {
                       $query->where('division_id', $divisionId)
                       ->where('role_id', 3);
                   });
        }
        $temuan = $temuan->get();
        return view('operator.temuan',compact('temuan'));
    }

    public function updateStatusTemuan($id){
        try {
            $updated = Temuan::where('id', $id)->update(['status' => '3']);
    
            if ($updated) {
                Alert::success('Success', 'Status updated successfully');
            } else {
                Alert::warning('No Changes', 'Status remains the same');
            }
    
            return redirect()->back();
        } catch (\Exception $e) {
            Log::error('Error updating status: ' . $e->getMessage());
            Alert::error('Error', 'Failed to update status. Contact developer for assistance.');
            return redirect()->back();
        }
    }

    public function downloadPdfFile(){
        $data = [];
        $pdf = PDF::loadView('operator.pdf', $data ,['orientation' => 'portrait']);
        $pdf->setPaper('A4', 'portrait');
        return $pdf->download('Temuan.pdf');
    }
    
}

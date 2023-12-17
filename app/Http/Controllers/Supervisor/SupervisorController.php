<?php

namespace App\Http\Controllers\Supervisor;

use App\Models\Temuan;
use Illuminate\Http\Request;
use App\Exports\TemuansExport;
use App\Exports\TemuansKsaiExport;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PhpParser\Node\Expr\FuncCall;
use RealRashid\SweetAlert\Facades\Alert;

class SupervisorController extends Controller
{   

    public function showDashboard(){
        return view('supervisor.dashboard.index');
    }

    public function showTemuan(){
        try {
            $user = Auth::user();
            $divisionId = $user->division_id;
            $temuan = Temuan::with('user');
            if ($divisionId === 1) {
                $temuan->whereIn('status', [3, 4]);
            } else {
                $temuan->whereIn('status', [1, 2])
                       ->whereHas('user', function ($query) use ($divisionId) {
                           $query->where('division_id', $divisionId);
                       });
            }
            $temuan = $temuan->get();
            return view('supervisor.temuan.index',compact('temuan'));
        } catch (\Exception $e) {
            Log::error('Error in showTemuan function: ' . $e->getMessage());
            return view('error', ['message' => 'An error occurred. Please contact the administrator.']);
        }
    }

    public function showEditTemuan($id){
        $temuan = Temuan::find($id);
        return view('supervisor.temuan.edit', compact('temuan'));
    }

    public function updateTemuan(Request $request, $id){
        $user = Auth::user();
        $temuan = Temuan::find($id);
        try {
            $updated = Temuan::where('id', $id)->update([
                'id' => $id,
                'user_id' => $temuan->user_id,
                'no' => $temuan->no,
                'object_pemeriksaan' => $request->object_pemeriksaan,
                'jenis_audit' => $request->jenis_audit,
                'auditor' => $request->auditor,
                'risk' => $request->risk,
                'issue_summary' => $request->issue_summary,
                'issue_detail' => $request->issue_detail,
                'recomendation' => $request->recomendation,
                'corrective_action_plan' => $request->corrective_action_plan,
                'status' => $temuan->status,
                'due_date' => $request->due_date,
                'overtime' => $request->overtime,
            ]);
    
            if ($updated) {
                Alert::success('Success', 'Temuan updated successfully');
                if ($user->role_id == 2) {
                    return redirect()->route('supervisor.temuan.page');
                }
                return redirect()->route('supervisor.temuan.page');
            } else {
                Alert::warning('No Changes', 'Temuan remains the same');
            }
    
            return redirect()->back();
        } catch (\Exception $e) {
            Log::error('Error updating temuan: ' . $e->getMessage());
            Alert::error('Error', 'Failed to update temuan. Contact developer for assistance.');
            return redirect()->back();
        }
    }

    public function deleteTemuan($id){
        try {
            $deleted = Temuan::where('id', $id)->delete();
            if ($deleted) {
                Alert::success('Success', 'Deleted successfully');
                return redirect()->route('supervisor.temuan.page');
            } else {
                Alert::warning('No Changes', 'Delete remains the same');
            }
            return redirect()->back();
        } catch (\Exception $e) {
            Log::error('Error deleting temuan: ' . $e->getMessage());
            Alert::error('Error', 'Failed to delete temuan. Contact developer for assistance.');
            return redirect()->back();
        }
    }

    public function updateStatusTemuan($id){
        $user = Auth::user();
        $divisionId = $user->division_id;
        $roleId = $user->role_id;
        $status = '';
    
        if ($divisionId === 1 && $roleId === 2) {
            $status = '4';
        } else {
            $status = '2';
        }
    
        try {
            $updated = Temuan::where('id', $id)->update(['status' => $status]);
    
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

    public function showTanggapan(){
        return view('supervisor.tanggapan.index');
    }
    
    public function showAudit(){
        return view('supervisor.audittrail.index');
    }

}

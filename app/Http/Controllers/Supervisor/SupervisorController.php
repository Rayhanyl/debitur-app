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
use RealRashid\SweetAlert\Facades\Alert;

class SupervisorController extends Controller
{

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
            return view('supervisor.temuan', compact('temuan'));
        } catch (\Exception $e) {
            Log::error('Error in showTemuan function: ' . $e->getMessage());
            return view('error', ['message' => 'An error occurred. Please contact the administrator.']);
        }
    }

    public function updateStatusTemuan($id){
        $user = Auth::user();
        $divisionId = $user->division_id;
        $roleId = $user->role_id;
        // Initialize the $status variable
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

}

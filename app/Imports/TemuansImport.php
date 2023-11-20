<?php
  
namespace App\Imports;
  
use App\Models\Temuan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Hash;
use Illuminate\Support\Facades\Auth;

class TemuansImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user = Auth::user();
        
        // Extract the 'No' key from the $row array
        $no = $row['no'];
    
        // Create a new Temuan instance
        return new Temuan([
            'user_id'                => $user->id,
            'no'                     => $no,
            'object_pemeriksaan'     => $row['object_pemeriksaan'],
            'jenis_audit'            => $row['jenis_audit'],
            'auditor'                => $row['auditor'],
            'risk'                   => $row['risk'],
            'issue_summary'          => $row['issue_summary'],
            'issue_detail'           => $row['issue_detail'],
            'recomendation'          => $row['recomendation'],
            'corrective_action_plan' => $row['corrective_action_plan'],
            'status'                 => '1',
        ]);
    }
    
}
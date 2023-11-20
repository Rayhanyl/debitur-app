<?php

namespace App\Exports;

use App\Models\Temuan;
use Maatwebsite\Excel\Concerns\FromCollection;

class TemuansKsaiSupervisorExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Customize this query based on your specific requirements
        return Temuan::select("id", "object_pemeriksaan", "jenis_audit", "auditor", "risk", "issue_summary", "issue_detail", "recomendation", "corrective_action_plan")
        ->get();
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["No", "Object Pemeriksaan", "Jenis Audit", "Auditor", "Risk", "Issue Summary", "Issue Detail", "Recomendation", "Corrective action plan"];
    }
}

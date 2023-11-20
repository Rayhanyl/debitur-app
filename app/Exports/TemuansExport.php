<?php
  
namespace App\Exports;
  
use App\Models\Temuan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class TemuansExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    private $divisionId;
    private $roleId;

    public function __construct($divisionId, $roleId)
    {
        $this->divisionId = $divisionId;
        $this->roleId = $roleId;
    }

    public function collection()
    {
        // Customize this query based on your specific requirements
        return Temuan::select("id", "object_pemeriksaan", "jenis_audit", "auditor", "risk", "issue_summary", "issue_detail", "recomendation", "corrective_action_plan")
            ->whereHas('user', function ($query) {
                $query->where('division_id', $this->divisionId)
                    ->where('role_id', $this->roleId);
            })
            ->get();
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["no", "Object Pemeriksaan", "Jenis Audit", "Auditor", "Risk", "Issue Summary", "Issue Detail", "Recomendation", "Corrective action plan"];
    }
}
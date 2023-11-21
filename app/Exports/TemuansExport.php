<?php
  
namespace App\Exports;
  
use App\Models\Temuan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class TemuansExport implements FromCollection, WithHeadings
{
    /**
     * @var int
     */
    public $divisionId;

    /**
     * @var int
     */
    public $roleId;

    /**
     * Constructor
     *
     * @param int $divisionId
     * @param int $roleId
     */
    public function __construct($divisionId, $roleId)
    {
        $this->divisionId = $divisionId;
        $this->roleId = $roleId;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Temuan::select(
            "id",
            "object_pemeriksaan",
            "jenis_audit",
            "auditor",
            "risk",
            "issue_summary",
            "issue_detail",
            "recomendation",
            "corrective_action_plan"
        )
            ->whereHas('user', function ($query) {
                $query->where('division_id', $this->divisionId)
                    ->where('role_id', $this->roleId);
            })
            ->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            "no",
            "Object Pemeriksaan",
            "Jenis Audit",
            "Auditor",
            "Risk",
            "Issue Summary",
            "Issue Detail",
            "Recomendation",
            "Corrective action plan",
        ];
    }
}
<?php

namespace App\Imports;

use App\Models\Temuan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Auth;

class TemuansImport implements ToModel, WithHeadingRow
{
    protected $dueDate;

    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;
    }

    public function model(array $row)
    {
        $user = Auth::user();
        $no = $row['no'];
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
            'due_date'               => $this->dueDate,
            'overtime'               => $this->dueDate,
        ]);
    }
}

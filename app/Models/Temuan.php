<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temuan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'no',
        'object_pemeriksaan',
        'jenis_audit',
        'auditor',
        'risk',
        'issue_summary',
        'issue_detail',
        'recomendation',
        'corrective_action_plan',
        'status',
    ];      

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

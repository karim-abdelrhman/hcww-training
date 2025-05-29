<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CompanyCommitteeMember extends Model
{
    use HasFactory;

    protected $table = 'company_committee_members';
    protected $fillable = ['company_id', 'employee_id', 'created_by', 'updated_by'];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function companyCommittee() : BelongsTo
    {
        return $this->belongsTo(CompanyCommittee::class, 'company_id');
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}

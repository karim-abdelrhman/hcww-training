<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CompanyCommittee extends Model
{
    use HasFactory;

    protected $table = 'company_committees';
    protected $fillable = [
        'company_id',
        'created_by',
        'updated_by',
    ];


    public function company() : BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function members() : HasMany
    {
        return $this->hasMany(CompanyCommitteeMember::class, 'company_id');
    }
}

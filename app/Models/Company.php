<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Company extends Model
{
    use HasFactory;
    protected $table = 'lucompanies';
    protected $fillable = [
        'code' , 'name' , 'code2'  , 'comm' , 'created_by' , 'updated_by'
    ];

    public function committees() : HasMany
    {
        return $this->hasMany(CompanyCommittee::class);
    }

    public function committeeMembers() : HasManyThrough
    {
        return $this->hasManyThrough(
            Employee::class,
            CompanyCommitteeMember::class,
            'company_id', // Foreign key on company_committee_members
            'id',         // Foreign key on employees
            'id',         // Local key on companies
            'employee_id' // Local key on company_committee_members
        );
    }
}

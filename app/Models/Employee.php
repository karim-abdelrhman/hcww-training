<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    use HasFactory;
    protected $table = "employees";
    protected  $fillable=[
        'company_id',
        'country_code',
        'organization_id',
        'position_id',
        'career_path_id',
        'degree_id',
        'job_id',
        'grade_id',
        'faculty_id',
        'name',
        'code',
        'phone1',
        'phone2',
        'id_number',
        'birth_date',
        'email',
        'address',
        'image',
        'active',
        'religion',
        'insurance_number',
        'gender',
        'age',
        'cv',
        'job_description_card',
        'contract_type',
        'employment_date',
        'created_by',
        'updated_by',
    ];
    protected $casts = [
        'company_id' => 'integer',
        'organization_id' => 'integer',
        'position_id' => 'integer',
        'employee_type_id' => 'integer',
        'career_path_id' => 'integer',
        'degree_id' => 'integer',
        'job_id' => 'integer',
        'grade_id' => 'integer',
        'faculty_id' => 'integer',
        'active' => 'boolean',
        'birth_date' => 'date',
    ];

    public function employeeType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(employeeType::class);
    }
    public function careerPath(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(careerPath::class);
    }
    public function organization() : BelongsTo
    {
        return $this->belongsTo(organization::class);
    }
    public function position() : BelongsTo
    {
        return $this->belongsTo(position::class);
    }
    public function degree() : BelongsTo
    {
        return $this->belongsTo(degree::class);
    }
    public function job() : BelongsTo
    {
        return $this->belongsTo(job::class);
    }
    public function grade() : BelongsTo
    {
        return $this->belongsTo(grade::class);
    }
    public function faculty() : BelongsTo
    {
        return $this->belongsTo(faculty::class);
    }
    public function company() : BelongsTo
    {
        return $this->belongsTo(company::class);
    }
    public function companyCommitteeMember() : BelongsTo
    {
        return $this->belongsTo(companyCommitteeMember::class);
    }
    public function types() : BelongsToMany
    {
        return $this->belongsToMany(EmployeeType::class, 'employee_employee_type');
    }
    public function employmentStatus() : HasMany
    {
        return $this->hasMany(employmentStatus::class , 'EMPLOYER_ID' , 'ID');
    }
}

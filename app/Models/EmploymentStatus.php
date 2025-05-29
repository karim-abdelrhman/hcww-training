<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmploymentStatus extends Model
{
    use HasFactory;
    protected $table = 'employment_statuses';
    protected $fillable = ['employment_status' , 'employer_id'];

    public function employee() : BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}

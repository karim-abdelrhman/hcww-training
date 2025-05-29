<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EmployeeType extends Model
{
    use HasFactory;
    protected $table = 'employee_types';
    public function employees() : BelongsToMany
    {
        return $this->belongsToMany(Employee::class, 'employee_employee_type');
    }
}

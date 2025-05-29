<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProgramUnit extends Model
{
    use HasFactory;
    protected $fillable = ['name' , 'content' , 'program_id'];
    public function program() : BelongsTo
    {
        return $this->belongsTo(TrainingProgram::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TrainerAccreditationCertificate extends Model
{
    use HasFactory;
    protected $table = 'trainer_accreditation_certificates';
    protected $fillable = ['trainer_id', 'certificate'];
    public function trainer() : BelongsTo
    {
        return $this->belongsTo(Trainer::class);
    }
}

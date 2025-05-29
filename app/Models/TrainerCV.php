<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TrainerCV extends Model
{
    use HasFactory;

    protected $table = "trainer_cvs";
    protected $fillable = ['trainer_id', 'cv'];

    public function trainer(): BelongsTo
    {
        return $this->belongsTo(Trainer::class);
    }
}

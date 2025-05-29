<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TrainingHall extends Model
{
    use HasFactory;
    protected $fillable = ['training_center_id','hall_number' , 'capacity' , 'image'];

    public function trainingCenter() : BelongsTo
    {
        return $this->belongsTo(TrainingCenter::class);
    }
}

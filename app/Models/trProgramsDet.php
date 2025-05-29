<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trProgramsDet extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'code',
        'prog_id',
        'comm',
        'created_by',
        'updated_by',
    ];
//    public function Programs(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
//    {
//        return $this->belongsToMany(trPrograms::class)->withPivot(['quantity']);
//    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\trProgramsDet;

class trPrograms extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'code',
        'type',
        'comm',
        'created_by',
        'updated_by',
        ];

    public function detail(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\trProgramsDet','prog_id','id');
    }

}

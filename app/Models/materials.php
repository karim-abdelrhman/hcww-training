<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materials extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'code',
        'prog_id',
        'det_id',
        'comm',
        'created_by',
        'updated_by',
    ];
}

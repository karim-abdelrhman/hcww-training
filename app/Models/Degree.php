<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    use HasFactory;
    protected $table = 'ludegrees';
    protected $fillable = [
        'code',
        'name',
        'code2',
        'comm',
        'created_by',
        'updated_by',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;
    protected $table = 'lufaculties';
    protected $fillable = [
        'name',
        'code' ,
        'comm' ,
        'created_by',
        'updated_by',
    ];
}

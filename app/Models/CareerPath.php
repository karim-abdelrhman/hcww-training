<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerPath extends Model
{
    use HasFactory;
    protected $table = 'lucareerpaths';
    protected $fillable = [
        'code','name','comm','created_by','updated_by',
    ];
}

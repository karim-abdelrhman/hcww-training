<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hcCommitteeDoc extends Model
{
    use HasFactory;
    protected $fillable=[
        'id', 'code', 'comp_id', 'name', 'com_date',
        'created_by','updated_by'
    ];
}

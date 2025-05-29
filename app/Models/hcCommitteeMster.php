<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hcCommitteeMster extends Model
{
    use HasFactory;
    protected $fillable=[
        'id','code','name','file_name','comp_id','com_date','comm','created_by','updated_by',
    ];
}

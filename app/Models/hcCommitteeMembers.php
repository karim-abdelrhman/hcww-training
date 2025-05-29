<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hcCommitteeMembers extends Model
{
    use HasFactory;
    protected $fillable=[
        'id','mb_name','com_id','mb_comm','created_by','updated_by',
    ];
}

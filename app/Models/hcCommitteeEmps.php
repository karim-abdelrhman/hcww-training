<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hcCommitteeEmps extends Model
{
    use HasFactory;
    protected $fillable=[
        'id','emp_code','emp_name','com_id','emp_comm','created_by','updated_by',
    ];
}

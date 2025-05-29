<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

//use Illuminate\Database\Eloquent\Relations\BelongsTo;
//use App\Models\lucompanies;

class Organization extends Model
{

    use HasFactory;
    protected $table = 'luorgunits';
    protected $guarded = [];
//    protected $fillable = ['code','name','comm','comp_id', 'parent_id', 'created_by', 'updated_by',];
    public function company(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}

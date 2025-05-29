<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lucompanies extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',     'name',      'code2',      'comm',      'created_by',       'updated_by',
    ];


//    public function organization()
//    {
//        return $this->hasMany('App\Models\organization');
//    }

}

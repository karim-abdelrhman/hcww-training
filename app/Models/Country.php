<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $table = 'COUNTRIES';
    protected $fillable = [
        'country_code',
        'country_arname',
        'country_enname',
        'country_ennationality',
        'country_arnnationality'
    ];
}

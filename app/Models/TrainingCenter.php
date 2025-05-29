<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TrainingCenter extends Model
{
    use HasFactory;
    protected $table = 'training_centers';
    protected $fillable = ['name', 'image' ,'address', 'phone', 'code' , 'fax' , 'email' , 'location' , 'center_manager_name' , 'center_manager_phone' , 'general_manager_name' , 'general_manager_phone', 'hr_name' , 'hr_phone' , 'company_id'];

    public function company() : BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}

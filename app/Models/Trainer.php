<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Trainer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'id_number'
        , 'id_image'
        , 'qualification'
        , 'degree'
        , 'university'
        , 'position'
        , 'accreditation_type' // نوع الإعتماد
        , 'accreditation_category' // فئة الإعتماد
        , 'interview_evaluation' // تقييم المدرب
        , 'coach_accreditation' // محضر إجتماع المدرب
        , 'coach_accreditation_number' // رقم محضر الإجتماع
        , 'coach_accreditation_date' // تاريخ محضر الإجتماع
        , 'letter_of_attribution' // خطاب الإسناد
    ];

    public function CVs() : HasMany
    {
        return $this->hasMany(TrainerCV::class);
    }

    public function certificates() : HasMany
    {
        return $this->hasMany(TrainerAccreditationCertificate::class);
    }
}

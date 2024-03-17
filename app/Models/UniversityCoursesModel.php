<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversityCoursesModel extends Model
{
    use HasFactory;
    protected $table = 'university_courses';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',	
        'uni_id',	
        'course_id',	
        'ps_fee_with_hos',	
        'ps_fee_without_hos',	
        'anul_fee_with_hos',	
        'anul_fee_without_hos',	
        'status',	
        'created_at',	
        'updated_at',	
        'del_status',	
    ];
    public function certificates()
    {
        return $this->hasMany(Certificate::class, 'uni_code', 'uni_code');
    }

}

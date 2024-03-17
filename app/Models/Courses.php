<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'course_category',
        'course_trade',
        'course_name',
        'course_code',
        'course_type',
        'course_eligibility',
        'course_duration_year',
        'course_duration_sem',
        'course_duration_month',
        'course_description',
        'status',
        'del_status',
        'created_at',
        'updated_at',
    ];
}


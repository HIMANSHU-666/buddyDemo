<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course_Type extends Model
{
    use HasFactory;
    protected $table = 'course_type';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'type',
        'cat_id',
        'ctype_icon',
        'course_eligibility',
        'status',
        'del_status',
        'created_at',
        'updated_at',
    ];
}


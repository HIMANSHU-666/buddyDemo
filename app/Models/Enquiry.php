<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;
    protected $table = 'student_enquiry';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'full_name',
        'email',
        'code',
        'phone',
        'state',
        'city',
        'gender',
        'courses',
        'del_status',
        'status',
        'created_at',
        'updated_at'



    ];


}

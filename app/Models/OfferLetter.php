<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferLetter extends Model
{
    use HasFactory;
    protected $table = 'offer_letter';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'stu_id',
        'uni_id',
        'course_id',
        'offer_letter',
        'status',
        'del_status',
        'created_at',
        'updated_at',
    ];
}


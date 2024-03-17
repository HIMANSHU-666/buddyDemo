<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'student_contact';
    protected $primaryKey = 'id';
    protected $fillable = [

        'id',
        'name',
        'email',
        'subject',
        'message',
        'del_status',
        'status',
        'created_at',
        'updated_at'

    ];


}

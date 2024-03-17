<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;



class StudentModel extends Model

{

    use HasFactory;

    protected $table = 'student';

    protected $fillable = [

        'id',

        'photo',

        'name',

        'father_name',

        'mother_name',

        'email',

        'phone_no',

        'qualification',

        'nationality',

        'gender',

        'address',

        'created_at',

        'del_status',

        'status',

        

    ];



}



	


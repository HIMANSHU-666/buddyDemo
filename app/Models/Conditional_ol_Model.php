<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;



class Conditional_ol_Model extends Model

{

    use HasFactory;

    protected $table = 'conditional_ol';

    protected $fillable = [

        'id',
        'ref_no',

        'date',

        'stu_name',

        'stu_father_name',

        'country',

        'scholarship_percentage',

        'course_name',

        'duration_sem',

        'duration_year',

        'commencement_date',

        'completion_date',

        'hos_mess_fee',

        'annual_tution_fee',
        'registeration_fee',

        'annual_tution_fee_yearly',

        'tution_fee_scholarship',

        'created_at',

        'del_status',

        'status',

        

    ];

}



	
	


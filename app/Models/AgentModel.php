<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;



class AgentModel extends Model

{

    use HasFactory;

    protected $table = 'agents';

    protected $fillable = [

        'id',
        'ref_code',

        'first_name',

        'last_name',

        'business_certificate',

        'business_logo',

        'email',

        'password',

        'phone_no',

        'commission_percentage',

        'contact_method',

        'find_out',

        'reference',

        'recruiting_year',

        'source_country',

        'services',

        'created_at',

        'del_status',

        'status',

        

    ];

}



	


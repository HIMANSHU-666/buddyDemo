<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;



class ProfileModel extends Model

{

    use HasFactory;

    protected $table = 'admin_credentials';

    protected $fillable = [

        'id',

        'username',

        'firstname',

        'lastname',

        'email',

        'phone_number',

        'address',

        'password',

        'image',

        'profile_image',

        'created_at',

        'del_status',

        'status',

        

    ];

}




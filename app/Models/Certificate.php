<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;
    protected $table = 'certificate';
    protected $fillable = [
        'id',
        'uni_code',
        'certi_name',
        'certi_url',
        'created_at',
        'updated_at',
        
      
        
    ];
}

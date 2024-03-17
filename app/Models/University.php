<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;
    protected $table = 'universities';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'uni_code',
        'uni_logo',
        'uni_name',
        'uni_rank',
        'center_type',
        'uni_clg_type',
        'est_year',
        'uni_website',
        'uni_desc',
        'uni_email',
        'uni_phone',
        'source_country',
            'state',
            'distt',
            'city',
            'near_by',
        'status',
        'created_at',
        'updated_at'
    ];
    public function certificates()
    {
        return $this->hasMany(Certificate::class, 'uni_code', 'uni_code');
    }

}

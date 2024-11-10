<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BroSisModel extends Model
{
    use HasFactory;

    protected $table ="t_brother_sister";

    protected $fillable = [
        'bro_sis_name',
        'bro_sis_age',
        'bro_sis_address',
        'bro_sis_work',
        'bro_sis_company',
        'bro_sis_length_service',

    ];
}

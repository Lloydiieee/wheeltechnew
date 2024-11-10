<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformantModel extends Model
{
    use HasFactory;

    protected $table = "t_informants";

    protected $fillable = [
        'informants_name',
        'informants_phone_number',
        'informants_address',
        'informants_questions',
        'informants_response',
    ];
}

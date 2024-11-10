<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 't_payments';

    protected $fillable = [
        'user_id',
        'unit_id',
        'mode_of_payment',
        'proof_of_payment',
        'amount',
    ];
}

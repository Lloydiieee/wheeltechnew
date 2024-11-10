<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentLog extends Model
{
    use HasFactory;
    protected $table = 't_payment_logs';

    protected $fillable = [
        'unit_id',
        'date_payment',
        'mode_of_payment',
        'validated_by',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'product_id',
        'downpayment',
        'terms',
        'email',
        'status'
    ];
    
    use HasFactory;
}

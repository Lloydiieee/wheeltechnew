<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComakerIncomeModel extends Model
{
    use HasFactory;


    protected $table = "t_comaker_income";

    protected $fillable = [
      'co_income_employer_name',
      'co_income_address',
      'co_income_cellphone_number',
      'co_income_telephone_number',
      'co_income_position',
      'co_income_emp_status',
      'co_income_nature',
      'co_income_income',
      'co_income_length',
      'co_income_year',
      'co_income_month',
      'co_income_other_income',
    ];
}

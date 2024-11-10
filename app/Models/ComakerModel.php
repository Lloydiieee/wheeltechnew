<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComakerModel extends Model
{
    use HasFactory;


    protected $table = "t_comaker_bg";

    protected $fillable = [
      'comaker_first_name',
      'comaker_middle_name',
      'comaker_last_name',
      'comaker_age',
      'comaker_birthdate',
      'comaker_place_of_birth',
      'comaker_cellphone_number',
      'comaker_telephone_number',
      'comaker_house_number',
      'comaker_barangay',
      'comaker_town',
      'comaker_province',
      'comaker_zip_code',
      'comaker_length_service',
      'comaker_year',
      'comaker_month',
    ];
}

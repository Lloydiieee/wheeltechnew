<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyModel extends Model
{
    use HasFactory;


    protected $table = "t_family_bg";


    protected $fillable = [
        'user_id',
        'family_father_first_name',
        'family_father_middle_name',
        'family_father_last_name',
        'family_father_alias',
        'family_father_age',
        'family_father_birthdate',
        'family_mother_first_name',
        'family_mother_middle_name',
        'family_mother_last_name',
        'family_mother_alias',
        'family_mother_age',
        'family_mother_birthdate',
        'family_marriage_status',
        'family_father_work',
        'family_mother_work',
        'family_present_add_house_number',
        'family_present_add_barangay',
        'family_present_add_town',
        'family_present_add_province',
        'family_present_add_zip_code',
        'family_present_add_length_service',
        'family_present_add_year',
        'family_present_add_month',
        'family_provincial_add_house_number',
        'family_provincial_add_barangay',
        'family_provincial_add_town',
        'family_provincial_add_province',
        'family_provincial_add_zip_code',
        'family_provincial_add_length_service',
        'family_provincial_add_year',
        'family_provincial_add_month',
    ];
}

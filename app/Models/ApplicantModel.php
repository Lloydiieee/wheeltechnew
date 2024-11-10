<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantModel extends Model
{
    use HasFactory;

    protected $table = "t_applicants";

    protected $fillable = [
        'user_id',
        'applicant_first_name',
        'applicant_middle_name',
        'applicant_last_name',
        'applicant_alias',
        'applicant_birthdate',
        'applicant_birthplace',
        'applicant_civil_status',
        'applicant_gender',
        'applicant_phone_number',
        'applicant_telephone_number',
        'applicant_license',
        'applicant_present_add_region',
        'applicant_present_add_province',
        'applicant_present_add_municipal',
        'applicant_present_add_barangay',
        'applicant_present_add_house_number',
        'applicant_present_add_length_service',
        'applicant_present_add_zip_code',
        'applicant_previous_add_region',
        'applicant_previous_add_province',
        'applicant_previous_add_municipal',
        'applicant_previous_add_barangay',
        'applicant_previous_add_house_number',
        'applicant_previous_add_length_service',
        'applicant_previous_add_zip_code',
        'applicant_provincial_add_region',
        'applicant_provincial_add_province',
        'applicant_provincial_add_municipal',
        'applicant_provincial_add_barangay',
        'applicant_provincial_add_house_number',
        'applicant_provincial_add_length_service',
        'applicant_provincial_add_zip_code',
        'applicant_relative_name',
        'applicant_relative_address',
        'applicant_relative_relationship',
        'applicant_relative_phone_number',
    ];
}

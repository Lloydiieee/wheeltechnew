<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('t_applicants', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'applicant_first_name');
            $table->string(column: 'applicant_middle_name');
            $table->string(column: 'applicant_last_name');
            $table->string(column: 'applicant_alias');
            $table->string(column: 'applicant_birthdate');
            $table->string(column: 'applicant_birthplace');
            $table->string(column: 'applicant_civil_status');
            $table->string(column: 'applicant_gender');
            $table->string(column: 'applicant_phone_number');
            $table->string(column: 'applicant_telephone_number');
            $table->string(column: 'applicant_license');
            $table->string(column: 'applicant_present_add_region');
            $table->string(column: 'applicant_present_add_province');
            $table->string(column: 'applicant_present_add_municipal');
            $table->string(column: 'applicant_present_add_barangay');
            $table->string(column: 'applicant_present_add_house_number');
            $table->string(column: 'applicant_present_add_length_service');
            $table->string(column: 'applicant_present_add_zip_code');
            $table->string(column: 'applicant_previous_add_region');
            $table->string(column: 'applicant_previous_add_province');
            $table->string(column: 'applicant_previous_add_municipal');
            $table->string(column: 'applicant_previous_add_barangay');
            $table->string(column: 'applicant_previous_add_house_number');
            $table->string(column: 'applicant_previous_add_length_service');
            $table->string(column: 'applicant_previous_add_zip_code');
            $table->string(column: 'applicant_provincial_add_region');
            $table->string(column: 'applicant_provincial_add_province');
            $table->string(column: 'applicant_provincial_add_municipal');
            $table->string(column: 'applicant_provincial_add_barangay');
            $table->string(column: 'applicant_provincial_add_house_number');
            $table->string(column: 'applicant_provincial_add_length_service');
            $table->string(column: 'applicant_provincial_add_zip_code');
            $table->string(column: 'applicant_relative_name');
            $table->string(column: 'applicant_relative_address');
            $table->string(column: 'applicant_relative_relationship');
            $table->string(column: 'applicant_relative_phone_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_applicants');
    }
};

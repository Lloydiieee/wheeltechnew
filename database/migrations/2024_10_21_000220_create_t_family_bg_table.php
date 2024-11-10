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
        Schema::create('t_family_bg', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'family_father_first_name');
            $table->string(column: 'family_father_middle_name');
            $table->string(column: 'family_father_last_name');
            $table->string(column: 'family_father_alias');
            $table->string(column: 'family_father_age');
            $table->string(column: 'family_father_birthdate');
            $table->string(column: 'family_mother_first_name');
            $table->string(column: 'family_mother_middle_name');
            $table->string(column: 'family_mother_last_name');
            $table->string(column: 'family_mother_alias');
            $table->string(column: 'family_mother_age');
            $table->string(column: 'family_mother_birthdate');
            $table->string(column: 'family_marriage_status');
            $table->string(column: 'family_father_work');
            $table->string(column: 'family_mother_work');
            $table->string(column: 'family_present_add_house_number');
            $table->string(column: 'family_present_add_barangay');
            $table->string(column: 'family_present_add_town');
            $table->string(column: 'family_present_add_province');
            $table->string(column: 'family_present_add_zip_code');
            $table->string(column: 'family_present_add_length_service');
            $table->string(column: 'family_present_add_year');
            $table->string(column: 'family_present_add_month');
            $table->string(column: 'family_provincial_add_house_number');
            $table->string(column: 'family_provincial_add_barangay');
            $table->string(column: 'family_provincial_add_town');
            $table->string(column: 'family_provincial_add_province');
            $table->string(column: 'family_provincial_add_zip_code');
            $table->string(column: 'family_provincial_add_length_service');
            $table->string(column: 'family_provincial_add_year');
            $table->string(column: 'family_provincial_add_month');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_family_bg');
    }
};

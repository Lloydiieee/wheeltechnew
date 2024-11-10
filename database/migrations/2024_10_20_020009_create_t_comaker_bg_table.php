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
        Schema::create('t_comaker_bg', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'comaker_first_name');
            $table->string(column: 'comaker_middle_name');
            $table->string(column: 'comaker_last_name');
            $table->string(column: 'comaker_age');
            $table->string(column: 'comaker_birthdate');
            $table->string(column: 'comaker_place_of_birth');
            $table->string(column: 'comaker_cellphone_number');
            $table->string(column: 'comaker_telephone_number');
            $table->string(column: 'comaker_house_number');
            $table->string(column: 'comaker_barangay');
            $table->string(column: 'comaker_town');
            $table->string(column: 'comaker_province');
            $table->string(column: 'comaker_zip_code');
            $table->string(column: 'comaker_length_service');
            $table->string(column: 'comaker_year');
            $table->string(column: 'comaker_month');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_comaker_bg');
    }
};

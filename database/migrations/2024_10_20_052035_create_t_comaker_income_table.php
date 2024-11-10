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
        Schema::create('t_comaker_income', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'co_income_employer_name');
            $table->string(column: 'co_income_address');
            $table->string(column: 'co_income_cellphone_number');
            $table->string(column: 'co_income_telephone_number');
            $table->string(column: 'co_income_position');
            $table->string(column: 'co_income_emp_status');
            $table->string(column: 'co_income_nature');
            $table->string(column: 'co_income_income');
            $table->string(column: 'co_income_length');
            $table->string(column: 'co_income_year');
            $table->string(column: 'co_income_month');
            $table->string(column: 'co_income_other_income');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_comaker_income');
    }
};

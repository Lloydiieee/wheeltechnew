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
        Schema::create('t_brother_sister', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'bro_sis_name');
            $table->string(column: 'bro_sis_age');
            $table->string(column: 'bro_sis_address');
            $table->string(column: 'bro_sis_work');
            $table->string(column: 'bro_sis_company');
            $table->string(column: 'bro_sis_length_service');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_brother_sister');
    }
};

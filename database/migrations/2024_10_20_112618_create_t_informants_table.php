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
        Schema::create('t_informants', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'informants_name');
            $table->string(column: 'informants_phone_number');
            $table->string(column: 'informants_address');
            $table->string(column: 'informants_questions');
            $table->string(column: 'informants_response');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_informants');
    }
};

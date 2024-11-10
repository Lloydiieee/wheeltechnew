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
        Schema::create('t_payment_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unit_id');
            $table->date('date_payment');
            $table->string('mode_of_payment');
            $table->unsignedBigInteger('validated_by');
            $table->timestamps();

            // Add foreign keys if necessary
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
            $table->foreign('validated_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_payment_logs');
    }
};

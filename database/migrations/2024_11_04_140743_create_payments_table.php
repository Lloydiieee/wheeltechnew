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
        Schema::create('t_payments', function (Blueprint $table) {
            $table->id();
            $table->string('user_id'); // Mode of Payment
            $table->string('mode_of_payment'); // Mode of Payment
            $table->string('proof_of_payment'); // Proof of Payment (filename)
            $table->decimal('amount', 10, 2); // Amount
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_payments');
    }
};

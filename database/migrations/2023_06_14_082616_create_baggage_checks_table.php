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
        Schema::create('baggage_checks', function (Blueprint $table) {
            $table->id();
            $table->text('CheckResult');
            $table->foreignId('bookings_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('pessenger_ones_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baggage_checks');
    }
};

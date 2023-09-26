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
        Schema::create('security_checks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pessenger_ones_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('CheckResult');
            $table->text('comments');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('security_checks');
    }
};

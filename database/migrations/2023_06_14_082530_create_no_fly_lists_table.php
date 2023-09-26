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
        Schema::create('no_fly_lists', function (Blueprint $table) {
            $table->id();
            $table->date('ActiveFrom');
            $table->date('ActiveTo');
            $table->text('reason');
            $table->foreignId('pessenger_ones_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('no_fly_lists');
    }
};

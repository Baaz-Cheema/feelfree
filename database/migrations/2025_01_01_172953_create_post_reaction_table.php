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
        Schema::create('reactionables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reaction_id')->constrained('reactions')->cascadeOnDelete()->cascadeOnUpdate();
            $table->morphs('reactionable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reactionables');
    }
};

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
        Schema::create('program_units', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_id')->constrained('training_programs')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name');
            $table->string('content');// pdf file
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_units');
    }
};
